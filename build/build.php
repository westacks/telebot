<?php

class DocumentParser
{
    /**
     * @returns DocSection[]
     */
    public static function toSection(phpQueryObject $document): array
    {
        $returnsRegex = [
            '/((?:Array of )?\S+) (?:objects? )?is returned(?:, otherwise ((?:Array of )?\S+))?/',
            '/.*[Rr]eturns .*?((?:Array of )?[A-Z]\w+)(?:, otherwise ((?:Array of )?[A-Z]\w+))?/',
        ];

        $content = $document->find("#dev_page_content")->get(0);

        $validData = [];
        $sections = [];
        $splitBy = "";

        /** @var DOMElement[] $children */
        $children = pq($content)->children();

        $groupedByH3 = [];
        foreach ($children as $child) {
            if ($child->tagName === "h3") {
                $splitBy = $child->textContent;
            }

            $groupedByH3[$splitBy][] = $child;
        }

        foreach ($groupedByH3 as $split => $children) {
            $splitBy = "";
            $groupedByH4 = [];

            foreach ($children as $child) {
                if ($child->tagName === "h4") {
                    $splitBy = $child->textContent;
                }

                $groupedByH4[$splitBy][] = $child;
            }

            $groupedByH3[$split] = $groupedByH4;
        }

        foreach ($groupedByH3 as $h3 => $h3Content) {
            foreach ($h3Content as $h4 => $h4Content) {
                /** @var DOMElement[] $h4Content */
                $h4Desc = '';
                $docFields = null;
                $docParameters = null;
                $docReturns = [];

                foreach ($h4Content as $h4Child) {
                    switch ($h4Child->tagName) {
                        case 'p':
                            $h4Desc .= pq($h4Child)->html();
                            $text = $h4Child->textContent;

                            if (str_contains($text, 'Use this method')) {
                                $docParameters = [];
                            }

                            foreach ($returnsRegex as $regex) {
                                if (preg_match($regex, $text, $matches)) {
                                    $docReturns[] = TelegramType::from(self::fixTypeString($matches[1]));

                                    if (isset($matches[2])) {
                                        $docReturns[] = TelegramType::from(self::fixTypeString($matches[2]));
                                    }

                                    break;
                                }
                            }
                            break;
                        case 'table':
                            $tableHead = pq($h4Child)->children()->get(0)->textContent;
                            $tableData = pq($h4Child)->children()->get(1);

                            if (str_contains($tableHead, "Field")) {
                                $data = [];

                                pq($tableData)->children()->map(function ($row) use (&$data) {
                                    $columns = pq($row)->find('td');
                                    $fieldDesc = pq($columns->get(2))->html();
                                    $name = $columns->get(0)->textContent;
                                    $type = self::fixTypeString($columns->get(1)->textContent);
                                    $data[] = new DocField(
                                        $name,
                                        self::fixDescription($fieldDesc),
                                        TelegramType::from($type),
                                        !str_contains($fieldDesc, "Optional"),
                                    );
                                });

                                $docFields = $data;
                            } elseif (str_contains($tableHead, "Parameter")) {
                                $data = [];

                                pq($tableData)->children()->map(function ($row) use (&$data) {
                                    $columns = pq($row)->find('td');
                                    $fieldDesc = pq($columns->get(3))->html();
                                    $name = $columns->get(0)->textContent;
                                    $type = self::fixTypeString($columns->get(1)->textContent);
                                    $data[] = new DocParameter(
                                        $name,
                                        self::fixDescription($fieldDesc),
                                        TelegramType::from($type),
                                        $columns->get(2)->textContent === "Yes",
                                    );
                                });

                                $docParameters = $data;
                            }
                            break;
                        case 'blockquote':
                        case 'ul':
                            $h4Desc .= pq($h4Child)->html();
                            break;
                    }
                }

                $docType = $docFields ? new DocType($h4, self::fixDescription($h4Desc), $docFields) : null;
                $docMethod = $docParameters ? new DocMethod($h4, self::fixDescription($h4Desc), $docParameters, $docReturns) : null;

                if ($docType && $docMethod) {
                    throw new \Exception("hasTypes and hasMethods: $h4");
                }

                if ($docType || $docMethod) {
                    $validData[] = $docType ?: $docMethod;
                }
            }

            $sections[] = new DocSection(
                $h3,
                self::fixDescription(implode("\n", array_map(fn(DOMElement $i) => pq($i)->html(), array_slice($h3Content[""], 1)))),
                array_values(array_filter($validData, fn($data) => $data instanceof DocType)),
                array_values(array_filter($validData, fn($data) => $data instanceof DocMethod)),
            );

            $validData = [];
        }

        $sections = array_filter($sections, fn(DocSection $section) => !empty($section->docTypes) || !empty($section->docMethods));

        $unknownTypes = self::findUnknownTypes($sections);

        if (!empty($unknownTypes)) {
            throw new \Exception('Found unknownTypes - ' . json_encode($unknownTypes));
        }

        return array_values($sections);
    }

    private static function fixTypeString(string $type): string
    {
        $mapping = [
            "InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply" => "Keyboard",
            "Array of InputMediaAudio, InputMediaDocument, InputMediaPhoto and InputMediaVideo" => "Array of InputMedia",
            "InputFile or String" => "InputFileOrString",
            "Integer or String" => "IntegerOrString",
            "Messages" => "Array of Message",
            "sent" => "Array of Message",
            "messages" => "Array of MessageId",
            "list" => "Array of BotCommand",
            "Float number" => "Float",
            "results" => "Poll",
            "True" => "Boolean",
        ];

        return $mapping[$type] ?? $type;
    }

    private static function fixDescription(string $description): string
    {
        // Remove empty anchor tags
        $description = preg_replace('/<a\s+[^>]*>\s*<\/a>/i', '', $description);

        // Replace self-referencing links with a generic 'Link' text
        $description = preg_replace_callback(
            '/<a href="([^"]+)">([^<]+)<\/a>/i',
            function ($matches) {
                return ($matches[1] === $matches[2])
                    ? '<a href="' . $matches[1] . '">Link</a>'
                    : $matches[0];
            },
            $description,
        );

        $converter = new \League\HTMLToMarkdown\HtmlConverter([
            'strip_tags' => true,
            'strip_placeholder_links' => true,
            'italic_style' => '',
            'bold_style' => '__',
        ]);

        // Convert HTML to Markdown and adjust links
        $descriptionMarkdown = $converter->convert(trim($description));
        $descriptionMarkdown = str_replace(
            ['](/', '](#'],
            ['](https://core.telegram.org/', '](https://core.telegram.org/bots/api#'],
            $descriptionMarkdown,
        );

        // Clean up undesired characters and apply final adjustments
        return str_replace(
            ['https://core.telegram.org//telegram.org', '*', '`', '\\', "&lt;", "&gt;", " \n", "\n"],
            ['https://telegram.org', '', '', '', '<', '>', '', ' '],
            $descriptionMarkdown,
        );
    }

    /**
     * @param DocSection[] $sections
     * @returns DocSection[]
     */
    public static function findUnknownTypes(array $sections): array
    {
        $declaredTypeMap = [];
        $unknownTypeInDocFields = [];
        $unknownTypeInDocMethods = [];

        foreach ($sections as $section) {
            foreach ($section->docTypes as $type) {
                $declaredTypeMap[$type->name] = $type;
            }
        }

        foreach ($declaredTypeMap as $type) {
            foreach ($type->docFields as $field) {
                $typeName = $field->type->getTypeWithoutGenerics()->name;
                if (!array_key_exists($typeName, $declaredTypeMap) && TelegramType::from($typeName) instanceof TelegramType_Declared) {
                    $unknownTypeInDocFields[] = $typeName;
                }
            }
        }

        foreach ($sections as $section) {
            foreach ($section->docMethods as $method) {
                foreach ($method->docParameters as $parameter) {
                    $typeName = $parameter->type->getTypeWithoutGenerics()->name;
                    if (!array_key_exists($typeName, $declaredTypeMap) && TelegramType::from($typeName) instanceof TelegramType_Declared) {
                        $unknownTypeInDocMethods[] = $typeName;
                    }
                }
            }
        }

        return array_unique(array_merge($unknownTypeInDocFields, $unknownTypeInDocMethods));
    }
}



class DocSection
{
    /**
     * @param DocType[]   $docTypes
     * @param DocMethod[] $docMethods
     */
    public function __construct(public string $name, public string $description, public array $docTypes, public array $docMethods) {}
}

class DocType
{
    /**
     * @param DocField[] $docFields
     */
    public function __construct(public string $name, public string $description, public array $docFields) {}
}

class DocField
{
    public function __construct(public string $name, public string $description, public TelegramType $type, public bool $required) {}
}

class DocMethod
{
    /**
     * @param DocParameter[] $docParameters
     * @param TelegramType[] $returns
     */
    public function __construct(public string $name, public string $description, public array $docParameters, public array $returns) {}
}

class DocParameter
{
    public function __construct(public $name, public $description, public TelegramType $type, public $required) {}
}

class TelegramType_Declared extends TelegramType
{
    public function __construct(string $docName)
    {
        parent::__construct($docName);
    }
}

class TelegramType_ListType extends TelegramType
{
    public function __construct(protected TelegramType $elementType, int $bracketsCount)
    {
        parent::__construct($this->elementType->name . str_repeat('[]', $bracketsCount));
    }
}

class TelegramType_Integer extends TelegramType
{
    public function __construct()
    {
        parent::__construct('Integer');
    }
}

class TelegramType_StringType extends TelegramType
{
    public function __construct()
    {
        parent::__construct('String');
    }
}

class TelegramType_Boolean extends TelegramType
{
    public function __construct()
    {
        parent::__construct('Boolean');
    }
}

class TelegramType_Float extends TelegramType
{
    public function __construct()
    {
        parent::__construct('Float');
    }
}

class TelegramType_CallbackGame extends TelegramType
{
    public function __construct()
    {
        parent::__construct('CallbackGame');
    }
}

class TelegramType_InputFile extends TelegramType
{
    public function __construct()
    {
        parent::__construct('InputFile');
    }
}

class TelegramType_ParseMode extends TelegramType
{
    public function __construct()
    {
        parent::__construct('ParseMode');
    }
}

class TelegramType_VoiceChatStarted extends TelegramType
{
    public function __construct()
    {
        parent::__construct('VoiceChatStarted');
    }
}

class TelegramType_VideoChatStarted extends TelegramType
{
    public function __construct()
    {
        parent::__construct('VideoChatStarted');
    }
}

class TelegramType_ForumTopicClosed extends TelegramType
{
    public function __construct()
    {
        parent::__construct('ForumTopicClosed');
    }
}

class TelegramType_ForumTopicReopened extends TelegramType
{
    public function __construct()
    {
        parent::__construct('ForumTopicReopened');
    }
}

class TelegramType_GeneralForumTopicHidden extends TelegramType
{
    public function __construct()
    {
        parent::__construct('GeneralForumTopicHidden');
    }
}

class TelegramType_GeneralForumTopicUnhidden extends TelegramType
{
    public function __construct()
    {
        parent::__construct('GeneralForumTopicUnhidden');
    }
}

class TelegramType_GiveawayCreated extends TelegramType
{
    public function __construct()
    {
        parent::__construct('GiveawayCreated');
    }
}

abstract class TelegramType_Super extends TelegramType
{
    public function __construct(public string $name, public Closure $subclasses)
    {
        parent::__construct($name);
    }
}

class TelegramType_Super_InputMessageContent extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('InputMessageContent', fn($docName) => str_starts_with($docName, 'Input') && str_ends_with($docName, 'MessageContent'));
    }
}

class TelegramType_Super_InlineQueryResult extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('InlineQueryResult', fn($docName) => str_starts_with($docName, 'InlineQueryResult') && !str_contains($docName, 'Results'));
    }
}

class TelegramType_Super_PassportElementError extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('PassportElementError', fn($docName) => str_starts_with($docName, 'PassportElementError'));
    }
}

class TelegramType_Super_InputMedia extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('InputMedia', fn($docName) => str_starts_with($docName, 'InputMedia'));
    }
}

class TelegramType_Super_ChatMember extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('ChatMember', fn($docName) => str_starts_with($docName, 'ChatMember'));
    }
}

class TelegramType_Super_BotCommandScope extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('BotCommandScope', fn($docName) => str_starts_with($docName, 'BotCommandScope'));
    }
}

class TelegramType_Super_BackgroundType extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('BackgroundType', fn($docName) => str_starts_with($docName, 'BackgroundType'));
    }
}

class TelegramType_Super_BackgroundFill extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('BackgroundFill', fn($docName) => str_starts_with($docName, 'BackgroundFill'));
    }
}

class TelegramType_Super_ReactionType extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('ReactionType', fn($docName) => str_starts_with($docName, 'ReactionType'));
    }
}

class TelegramType_Super_MessageOrigin extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('MessageOrigin', fn($docName) => str_starts_with($docName, 'MessageOrigin'));
    }
}

class TelegramType_Super_ChatBoostSource extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('ChatBoostSource', fn($docName) => str_starts_with($docName, 'ChatBoostSource'));
    }
}

class TelegramType_Super_MenuButton extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('MenuButton', fn($docName) => str_starts_with($docName, 'MenuButton'));
    }
}

class TelegramType_Super_RevenueWithdrawalState extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('RevenueWithdrawalState', fn($docName) => str_starts_with($docName, 'RevenueWithdrawalState'));
    }
}

class TelegramType_Super_TransactionPartner extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('TransactionPartner', fn($docName) => str_starts_with($docName, 'TransactionPartner'));
    }
}

class TelegramType_Super_PaidMedia extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('PaidMedia', fn($docName) => str_starts_with($docName, 'PaidMedia'));
    }
}

class TelegramType_Super_InputPaidMedia extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('InputPaidMedia', fn($docName) => str_starts_with($docName, 'InputPaidMedia'));
    }
}

class TelegramType_Super_KeyboardOption extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('Keyboard', fn($docName) => in_array($docName, ['InlineKeyboardMarkup', 'ReplyKeyboardMarkup', 'ReplyKeyboardRemove', 'ForceReply']));
    }
}

class TelegramType_Super_MaybeInaccessibleMessage extends TelegramType_Super
{
    public function __construct()
    {
        parent::__construct('MaybeInaccessibleMessage', fn($docName) => in_array($docName, ['Message', 'InaccessibleMessage']));
    }
}

abstract class TelegramType
{
    public ?string $docBlocKType = null;
    public ?string $attributeType = null;

    public function __construct(public string $name)
    {
        $this->docBlocKType = match ($this->name) {
            'Integer' => 'int',
            'Integer[]' => 'int[]',
            'Float' => 'float',
            'Float[]' => 'float[]',
            'Boolean', 'True' => 'bool',
            'Boolean[]', 'True[]' => 'bool[]',
            'String', 'IntegerOrString' => 'string',
            'String[]', 'IntegerOrString[]' => 'string[]',
            'InputFileOrString' => 'InputFile',
            'InputFileOrString[]' => 'InputFile[]',
            default => $this->name,
        };

        $this->attributeType = match ($this->name) {
            'Integer' => 'integer',
            'Integer[]' => 'integer[]',
            'Float' => 'double',
            'Float[]' => 'double[]',
            'Boolean', 'True' => 'boolean',
            'Boolean[]', 'True[]' => 'boolean[]',
            'String', 'IntegerOrString' => 'string',
            'String[]', 'IntegerOrString[]' => 'string[]',
            'InputFileOrString' => 'InputFile',
            'InputFileOrString[]' => 'InputFile[]',
            default => $this->name,
        };
    }

    public static function from(string $type): TelegramType
    {
        switch ($type) {
            case 'Int':
            case 'Integer':
                return new TelegramType_Integer();
            case 'String':
                return new TelegramType_StringType();
            case 'Boolean':
                return new TelegramType_Boolean();
            case 'Float':
                return new TelegramType_Float();
            case 'CallbackGame':
                return new TelegramType_CallbackGame();
            case 'InputMedia':
                return new TelegramType_Super_InputMedia();
            case 'InputFile':
                return new TelegramType_InputFile();
            case 'ParseMode':
                return new TelegramType_ParseMode();
            case 'VoiceChatStarted':
                return new TelegramType_VoiceChatStarted();
            case 'VideoChatStarted':
                return new TelegramType_VideoChatStarted();
            case 'ForumTopicClosed':
                return new TelegramType_ForumTopicClosed();
            case 'ForumTopicReopened':
                return new TelegramType_ForumTopicReopened();
            case 'GeneralForumTopicHidden':
                return new TelegramType_GeneralForumTopicHidden();
            case 'GeneralForumTopicUnhidden':
                return new TelegramType_GeneralForumTopicUnhidden();
            case 'GiveawayCreated':
                return new TelegramType_GiveawayCreated();
            case 'InputMessageContent':
                return new TelegramType_Super_InputMessageContent();
            case 'InlineQueryResult':
                return new TelegramType_Super_InlineQueryResult();
            case 'ReactionType':
                return new TelegramType_Super_ReactionType();
            case 'MessageOrigin':
                return new TelegramType_Super_MessageOrigin();
            case 'ChatBoostSource':
                return new TelegramType_Super_ChatBoostSource();
            case 'PassportElementError':
                return new TelegramType_Super_PassportElementError();
            case 'ChatMember':
                return new TelegramType_Super_ChatMember();
            case 'MenuButton':
                return new TelegramType_Super_MenuButton();
            case 'BackgroundFill':
                return new TelegramType_Super_BackgroundFill();
            case 'BackgroundType':
                return new TelegramType_Super_BackgroundType();
            case 'RevenueWithdrawalState':
                return new TelegramType_Super_RevenueWithdrawalState();
            case 'TransactionPartner':
                return new TelegramType_Super_TransactionPartner();
            case 'PaidMedia':
                return new TelegramType_Super_PaidMedia();
            case 'InputPaidMedia':
                return new TelegramType_Super_InputPaidMedia();
            case 'BotCommandScope':
                return new TelegramType_Super_BotCommandScope();
            case 'Keyboard':
            case 'KeyboardOption':
                return new TelegramType_Super_KeyboardOption();
            case 'MaybeInaccessibleMessage':
                return new TelegramType_Super_MaybeInaccessibleMessage();
            case 'InputFileOrString':
                return new TelegramType_WithAlternative_InputFileOrString();
            case 'IntegerOrString':
                return new TelegramType_WithAlternative_IntegerOrString();
            default:
                if (str_starts_with($type, 'Array of ')) {
                    $type = str_replace('Array of ', '', $type, $bracketsCount);
                    return new TelegramType_ListType(self::from($type), $bracketsCount);
                }
                return new TelegramType_Declared($type);
        }
    }

    public function getTypeWithoutGenerics()
    {
        if ($this instanceof TelegramType_ListType) {
            return $this->elementType->getTypeWithoutGenerics();
        }
        return $this;
    }
}

abstract class TelegramType_WithAlternative extends TelegramType
{
    public function __construct(
        public string $name,
        public array $validTypes,
    ) {
        parent::__construct($name);
    }
}

class TelegramType_WithAlternative_InputFileOrString extends TelegramType_WithAlternative
{
    public function __construct()
    {
        parent::__construct('InputFileOrString', [new TelegramType_InputFile(), new TelegramType_StringType()]);
    }
}

class TelegramType_WithAlternative_IntegerOrString extends TelegramType_WithAlternative
{
    public function __construct()
    {
        parent::__construct('IntegerOrString', [new TelegramType_Integer(), new TelegramType_StringType()]);
    }
}

class ClassGenerator
{
    /**
     * @param DocSection[] $sections
     */
    public static function handle(array $sections)
    {
        foreach ($sections as $section) {
            self::handleMethodClasses($section);
            self::handleObjectClasses($section);
        }

        self::handleTrait();
    }

    private static function handleMethodClasses(DocSection $section)
    {
        foreach ($section->docMethods as $method) {
            $methodName = ucfirst($method->name) . 'Method';
            $class = "WeStacks\TeleBot\Methods\\$methodName";

            if (!class_exists($class)) {
                throw new \Exception("Cannot find class $class");
            }

            $parameters = "protected array \$parameters = [\n";
            $docBlock = "/**\n";
            $docBlock .= " * $method->description\n";
            $docBlock .= " *\n";

            foreach ($method->docParameters as $parameter) {
                $required = $parameter->required ? 'Yes' : 'Optional';
                $parameters .= "        '$parameter->name' => '{$parameter->type->attributeType}',\n";
                $docBlock .= " * @property {$parameter->type->docBlocKType} $" . $parameter->name . " __Required: {$required}__. $parameter->description \n";
            }

            $parameters .= "    ];";
            $docBlock .= " */";

            $filePath = __DIR__ . "/../src/Methods/$methodName.php";
            $fileContent = file_get_contents($filePath);

            $reflector = new ReflectionClass($class);
            $currentDocBlock = $reflector->getDocComment();
            preg_match('/class\s+' . preg_quote($methodName, '/') . '\s.*?(?:\s*?\n\s*?\{)/s', $fileContent, $matches);
            $classDefinition = $matches[0];

            $methodProp = "protected string \$method = '$method->name';";
            $expects = "protected string \$expect = '" . implode('|', array_map(fn($type) => $type->attributeType, $method->returns)) . "';";

            if ($currentDocBlock) {
                $fileContent = str_replace($currentDocBlock, $docBlock, $fileContent);
            } else {
                $fileContent = str_replace($classDefinition, "$docBlock\n$classDefinition", $fileContent);
            }

            if (preg_match('/protected array \$parameters = \[.*?\];/s', $fileContent, $matches)) {
                $fileContent = str_replace($matches[0], $parameters, $fileContent);
            } else {
                $fileContent = str_replace($classDefinition, "$classDefinition\n    $parameters\n", $fileContent);
            }

            if (preg_match('/protected string \$expect = .*?;/s', $fileContent, $matches)) {
                $fileContent = str_replace($matches[0], $expects, $fileContent);
            } else {
                $fileContent = str_replace($classDefinition, "$classDefinition\n    $expects\n", $fileContent);
            }

            if (preg_match('/protected string \$method = .*?;/s', $fileContent, $matches)) {
                $fileContent = str_replace($matches[0], $methodProp, $fileContent);
            } else {
                $fileContent = str_replace($classDefinition, "$classDefinition\n    $methodProp\n", $fileContent);
            }

            file_put_contents($filePath, $fileContent);
        }
    }

    private static function handleObjectClasses(DocSection $section)
    {
        foreach ($section->docTypes as $type) {
            $class = "WeStacks\TeleBot\Objects\\$type->name";

            if (!class_exists($class)) {
                throw new \Exception("Cannot find class $class");
            }

            $attributes = "protected \$attributes = [\n";
            $docBlock = "/**\n";
            $docBlock .= " * $type->description\n";
            $docBlock .= " *\n";

            foreach ($type->docFields as $field) {
                $attributes .= "        '$field->name' => '{$field->type->attributeType}',\n";
                $docBlockType = $field->type->docBlocKType;

                if ($docBlockType === $field->type->name) {
                    $typeClass = "WeStacks\TeleBot\Objects\\" . $field->type->name;
                    if (class_exists($typeClass)) {
                        $extendings = \Spatie\StructureDiscoverer\Discover::in(__DIR__ . '/../src/Objects')->extending($typeClass)->get();

                        if ($extendings !== []) {
                            sort($extendings);
                            $docBlockType = implode('|', array_map(fn(string $class) => substr($class, strrpos($class, '\\') + 1), $extendings));
                        }
                    }
                }

                $docBlock .= " * @property $docBlockType $" . $field->name . " $field->description \n";
            }

            $attributes .= "    ];";
            $docBlock .= " */";

            $filePath = __DIR__ . "/../src/Objects/$type->name.php";
            $fileContent = file_get_contents($filePath);

            $reflector = new ReflectionClass($class);
            $currentDocBlock = $reflector->getDocComment();
            preg_match('/class\s+' . preg_quote($type->name, '/') . '\s.*?(?:\s*?\n\s*?\{)/s', $fileContent, $matches);
            $classDefinition = $matches[0];

            if ($currentDocBlock) {
                $fileContent = str_replace($currentDocBlock, $docBlock, $fileContent);
            } else {
                $fileContent = str_replace($classDefinition, "$docBlock\n$classDefinition", $fileContent);
            }

            if (preg_match('/protected \$attributes = \[.*?\];/s', $fileContent, $matches)) {
                $fileContent = str_replace($matches[0], $attributes, $fileContent);
            } else {
                $fileContent = str_replace($classDefinition, "$classDefinition\n    $attributes\n", $fileContent);
            }

            file_put_contents($filePath, $fileContent);
        }
    }

    private static function handleTrait()
    {
        $methods = \Spatie\StructureDiscoverer\Discover::in(__DIR__ . '/../src/Methods')->extending(\WeStacks\TeleBot\Contracts\TelegramMethod::class)->get();
        sort($methods);
        $docBlockFactory = \phpDocumentor\Reflection\DocBlockFactory::createInstance();

        $allMethodsDocBlock = "/**\n";
        $allMethodsDocBlock .= " * This trait contains documentation for all Telegram methods.\n";

        foreach ($methods as $class) {
            $reflectionClass = new ReflectionClass($class);
            $docComment = $reflectionClass->getDocComment();
            $docBlock = $docBlockFactory->create($docComment);

            $description = $docBlock->getSummary();
            $parameterDescriptions = $docBlock->getTagsByName('property');

            $parameters = $reflectionClass->getProperty('parameters')->getDefaultValue();
            $docBlockParameters = empty($parameters) ? '' : "array \$parameters = []";

            $allMethodsDocBlock .= " *\n * @method {$reflectionClass->getProperty('expect')->getDefaultValue()}|PromiseInterface {$reflectionClass->getProperty('method')->getDefaultValue()}($docBlockParameters) $description\n";

            if (!empty($parameterDescriptions)) {
                $allMethodsDocBlock .= " * Parameters:\n";
                foreach ($parameterDescriptions as $parameterDescription) {
                    /** @var \phpDocumentor\Reflection\DocBlock\Tags\Property $parameterDescription */
                    $allMethodsDocBlock .= " * - _" . ltrim($parameterDescription->getType(), '\\') . "_ `$" . $parameterDescription->getVariableName() . "` {$parameterDescription->getDescription()} \n";
                }
            }
        }

        $allMethodsDocBlock .= " *\n * @see https://core.telegram.org/bots/api\n";
        $allMethodsDocBlock .= " */";

        $allMethodsTrait = \WeStacks\TeleBot\Traits\HasTelegramMethods::class;
        $reflector = new ReflectionClass($allMethodsTrait);
        $currentDocBlock = $reflector->getDocComment();
        $filePath = __DIR__ . "/../src/Traits/HasTelegramMethods.php";
        $fileContent = file_get_contents($filePath);
        $fileContent = str_replace($currentDocBlock, $allMethodsDocBlock, $fileContent);
        file_put_contents($filePath, $fileContent);
    }
}

require_once __DIR__ . '/../vendor/autoload.php';

$doc = \phpQuery::newDocument(file_get_contents('https://core.telegram.org/bots/api'));
$docs = DocumentParser::toSection($doc);
ClassGenerator::handle($docs);
