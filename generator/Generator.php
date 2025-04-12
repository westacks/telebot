<?php

namespace WeStacks\TeleBot\Generator;

use GuzzleHttp\Promise\PromiseInterface;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Foundation\TelegramObject;

class Generator
{
    public static function generate(): void
    {
        $data = json_decode(file_get_contents(__DIR__.'/../api.min.json'), true);

        foreach ($data['types'] as $name => $object) {
            static::createObject($name, $object, $data['types']);
        }

        $namespace = new PhpNamespace('WeStacks\\TeleBot\\Foundation');
        $namespace->addUse(TelegramMethod::class);
        $trait = $namespace->addTrait('HasTelegramMethods');
        $namespace->addUse(PromiseInterface::class);

        $method = $trait->addMethod('method')
            ->setReturnNullable()
            ->setReturnType('string')
            ->setPrivate()
            ->addComment('@return class-string<TelegramMethod>|null')
            ->setBody('if (class_exists($class = "WeStacks\\\\TeleBot\\\\Methods\\\\{$this->studly($method)}Method")) {'.PHP_EOL.'    return $class;'.PHP_EOL.'}'.PHP_EOL.'return null;');

        $method->addParameter('method')->setType('string');

        $method = $trait->addMethod('studly')
            ->setPrivate()
            ->setReturnType('string')
            ->setBody('$words = explode(" ", str_replace(["-", "_"], " ", $value));'.PHP_EOL.'$studlyWords = array_map(fn ($word) => ucfirst($word), $words);'.PHP_EOL.'return implode($studlyWords);');

        $method->addParameter('value')->setType('string');

        $trait->addComment('This trait contains documentation for all Telegram methods.'.PHP_EOL);

        foreach ($data['methods'] as $name => $method) {
            static::createMethod($name, $method);

            $returns = array_map(fn ($t) => static::phpType($t, true, fn ($t) => $namespace->addUse($t)), $method['returns']);
            array_unshift($returns, 'PromiseInterface');

            $trait->addComment('@method '.implode('|', $returns)." {$name}(...\$parameters) ".implode(PHP_EOL.PHP_EOL, $method['description']));

            $parameters = '';

            foreach ($method['parameters'] ?? [] as $parameter => $spec) {
                $types = array_map(fn ($t) => static::phpType($t, true), $spec['type']);
                $required = $spec['required'] ? 'Yes' : 'Optional';
                $parameters .= '- _'.implode('|', $types)."_ `\${$parameter}` __Required: {$required}__. {$spec['description']}\n";
            }

            $trait->addComment(PHP_EOL."{@see {$method['href']}}");

            if (! empty($parameters)) {
                $trait->addComment(PHP_EOL.'Parameters:'.PHP_EOL.$parameters.PHP_EOL);
            }
        }

        $trait->addComment('@see https://core.telegram.org/bots/api');

        file_put_contents(
            __DIR__.'/../src/Foundation/HasTelegramMethods.php',
            "<?php\n\n".(new PsrPrinter())->printNamespace($namespace)
        );
    }

    protected static function createObject(string $name, array $data, array &$_types)
    {
        $namespace = new PhpNamespace('WeStacks\\TeleBot\\Objects');
        $extends = isset($data['extends']) ? "WeStacks\\TeleBot\\Objects\\{$data['extends']}" : TelegramObject::class;
        $namespace->addUse($extends);

        $class = $namespace->addClass($name)
            ->setExtends($extends)
            ->setAbstract(isset($data['subtypes']));

        foreach ($data['description'] ?? [] as $description) {
            $class->addComment($description);
        }

        if (isset($data['subtypes'])) {
            foreach ($data['subtypes'] as $subtype) {
                $class->addComment("- [{$subtype}]({$_types[$subtype]['href']})");
            }

            if ($mapper = static::createTypeMapper($name, $data, $_types)) {
                $namespace->addUse(Identifiable::class);
                $class->addImplement(Identifiable::class);

                $method = $class->addMethod('identify')
                    ->setPublic()
                    ->setStatic()
                    ->setBody($mapper)
                    ->setReturnType('string')
                    ->addParameter('parameters')
                    ->setType('array');
            }
        }

        if (isset($data['fields'])) {
            $method = $class->addMethod('__construct')
                ->setPublic();

            foreach ($data['fields'] ?? [] as $field => $spec) {
                $types = array_map(fn ($t) => static::phpType($t), $spec['type']);
                $docTypes = array_map(fn ($t) => static::phpType($t, true), $spec['type']);

                if (str_starts_with($spec['description'], 'Optional')) {
                    count($types) > 1 ? array_unshift($types, 'null') : ($types[0] = "?{$types[0]}");
                    count($docTypes) > 1 ? array_unshift($docTypes, 'null') : ($docTypes[0] = "?{$docTypes[0]}");
                }

                $class->addComment('@property-read '.implode('|', $docTypes).' $'.$field.' '.($spec['description'] ?? ''));

                $parameter = $method->addPromotedParameter($field)
                    ->setReadOnly()
                    ->setPublic()
                    ->setType(implode('|', $types));
            }
        }

        if (isset($data['href'])) {
            $class->addComment(PHP_EOL.'@see '.$data['href']);
        }

        $additional = static::loadExistingHelpers(
            "WeStacks\\TeleBot\\Objects\\$name",
            ! isset($data['fields']),
            array_keys($data['fields'] ?? []),
        );

        if (isset($additional['properties'])) {
            foreach ($additional['properties'] as $property) {
                $prop = $class->addProperty($property['name']);

                if (array_key_exists('value', $property)) {
                    $prop->setValue($property['value']);
                }

                if ($property['public']) {
                    $prop->setPublic();
                } elseif ($property['protected']) {
                    $prop->setProtected();
                } elseif ($property['private']) {
                    $prop->setPrivate();
                }

                if ($property['static']) {
                    $prop->setStatic();
                }

                $prop->setType($property['type']);

                if ($property['description']) {
                    $prop->addComment($property['description']);
                }

                if ($property['nullable']) {
                    $prop->setNullable();
                }
            }
        }

        if (isset($additional['methods'])) {
            foreach ($additional['methods'] as $method) {
                $mthd = $class->addMethod($method['name'])
                    ->setBody($method['body'])
                    ->setReturnType($method['returns']);

                if ($method['public']) {
                    $mthd->setPublic();
                } elseif ($method['protected']) {
                    $mthd->setProtected();
                } elseif ($method['private']) {
                    $mthd->setPrivate();
                }

                if ($method['static']) {
                    $mthd->setStatic();
                }

                if ($method['description']) {
                    $mthd->addComment($method['description']);
                }

                foreach ($method['parameters'] as $parameter) {
                    $param = $mthd->addParameter($parameter['name'])
                        ->setType($parameter['type'])
                        ->setNullable($parameter['nullable'] ?? false);

                    if (array_key_exists('default', $parameter)) {
                        $param->setDefaultValue($parameter['default']);
                    }
                }
            }
        }

        file_put_contents(
            __DIR__."/../src/Objects/{$name}.php",
            "<?php\n\n".(new PsrPrinter())->printNamespace($namespace)
        );
    }

    protected static function createMethod(string $name, array $data)
    {
        $namespace = new PhpNamespace('WeStacks\\TeleBot\\Methods');
        $namespace->addUse(TelegramMethod::class);

        $class = $namespace->addClass($className = ucfirst($name).'Method');
        $class->setExtends($data['extends'] ?? TelegramMethod::class);

        $class->addProperty('method', $name)
            ->setType('string')
            ->setProtected();

        $data['returns'] = array_map(fn ($t) => static::phpType($t, true), $data['returns']);

        $class->addProperty('expect', $data['returns'])
            ->setType('array')
            ->setProtected();

        foreach ($data['description'] ?? [] as $description) {
            $class->addComment($description.PHP_EOL);
        }

        $method = $class->addMethod('__construct')
            ->setPublic();

        foreach ($data['parameters'] ?? [] as $parameter => $spec) {
            $types = array_map(fn ($t) => static::phpType($t), $spec['type']);
            $docTypes = array_map(fn ($t) => static::phpType($t, true), $spec['type']);

            foreach ($types as $type) {
                if (ctype_upper($type[0])) {
                    $namespace->addUse($type);
                }
            }

            if (isset($spec['required']) && ! $spec['required']) {
                count($types) > 1 ? array_unshift($types, 'null') : ($types[0] = "?{$types[0]}");
                count($docTypes) > 1 ? array_unshift($docTypes, 'null') : ($docTypes[0] = "?{$docTypes[0]}");
            }

            $class->addComment('@property-read '.implode('|', $docTypes).' $'.$parameter.' '.($spec['description'] ?? ''));

            $method->addPromotedParameter($parameter)
                ->setReadOnly()
                ->setPublic()
                ->setType(implode('|', $types));
        }

        if (isset($data['href'])) {
            $class->addComment(PHP_EOL.'@see '.$data['href']);
        }

        file_put_contents(
            __DIR__."/../src/Methods/{$className}.php",
            "<?php\n\n".(new PsrPrinter())->printNamespace($namespace)
        );
    }

    protected static function phpType(string $type, bool $doc = false, ?callable $callback = null): string
    {
        if (preg_match("/^Array\<(.*)\>$/", $type, $matches)) {
            return $doc ? static::phpType($matches[1], $doc, $callback).'[]' : 'array';
        }

        if ($doc && $callback && !in_array($type, ['True', 'False', 'String', 'Float', 'Integer', 'Boolean', 'Int'])) {
            $callback("WeStacks\\TeleBot\\Objects\\{$type}");
        }

        return match ($type) {
            'True', 'False', 'String', 'Float' => lcfirst($type),
            'Integer', 'Int' => 'int',
            'Boolean' => 'bool',
            default => $doc ? $type : "WeStacks\\TeleBot\\Objects\\{$type}",
        };
    }

    protected static function createTypeMapper(string $name, array $type, array $types)
    {
        $field = match ($name) {
            'ChatMember' => 'status',
            'ChatBoostSource' => 'source',
            default => 'type',
        };

        switch ($name) {
            case 'MaybeInaccessibleMessage':
                return <<<'php'
                return match($parameters['date'] == 0) {
                    true => InaccessibleMessage::class,
                    false => Message::class,
                };
                php;
            case 'InputMessageContent':
                return <<<php
                return match (true) {
                    isset(\$parameters['message_text']) => InputTextMessageContent::class,
                    isset(\$parameters['latitude']) && !isset(\$parameters['title']) => InputLocationMessageContent::class,
                    isset(\$parameters['latitude']) && isset(\$parameters['title']) => InputVenueMessageContent::class,
                    isset(\$parameters['phone_number']) => InputContactMessageContent::class,
                    isset(\$parameters['prices']) => InputInvoiceMessageContent::class,
                    default => throw new \InvalidArgumentException("Unknown $name"),
                };
                php;
            default:
                $values = [];

                foreach ($type['subtypes'] as $subtype) {
                    $temp = explode(' ', $types[$subtype]['fields'][$field]['description']);
                    $temp = $temp[count($temp) - 1];

                    $values[$subtype] = preg_replace('/[^A-Za-z0-9\_]/', '', $temp);
                }

                $code = '';
                foreach ($values as $key => $value) {
                    $code .= PHP_EOL."    '$value' => $key::class,";
                }

                return <<<php
                return match (\$parameters['$field']) {{$code}
                    default => throw new \InvalidArgumentException("Unknown $name: ".\$parameters['$field']),
                };
                php;
        }
    }

    protected static function loadExistingHelpers(string $class, bool $withConstruct = false, array $ignoreProps = []): array
    {
        if (! class_exists($class)) {
            return [];
        }

        $result = [];
        $reflection = new \ReflectionClass($class);

        foreach ($reflection->getMethods() as $method) {
            if (! $withConstruct && $method->isConstructor()
                || $method->getDeclaringClass()->getName() !== $class
                || $method->getName() === 'identify'
            ) {
                continue;
            }

            $data = [
                'name' => $method->getName(),
                'public' => $method->isPublic(),
                'protected' => $method->isProtected(),
                'private' => $method->isPrivate(),
                'parameters' => array_map(function ($parameter) {
                    $type = $parameter->getType();

                    if ($type instanceof \ReflectionUnionType) {
                        $type = implode('|', array_map(fn ($t) => $t->getName(), $type->getTypes()));

                        if ($parameter->allowsNull()) {
                            $type = '|'.$type;
                        }
                    } else {
                        $type = $type->allowsNull() ? '?'.$type->getName() : $type->getName();
                    }

                    $res = [
                        'name' => $parameter->getName(),
                        'type' => $type,
                        'nullable' => $parameter->allowsNull(),
                    ];

                    if ($parameter->isDefaultValueAvailable()) {
                        $res['default'] = $parameter->getDefaultValue();
                    }

                    return $res;
                }, $method->getParameters()),
                'returns' => null,
                'static' => $method->isStatic(),
                'description' => static::cleanDocComment($method->getDocComment()),
                'body' => static::getMethodBody($method),
            ];

            if ($returns = $method->getReturnType()) {
                if ($returns instanceof \ReflectionUnionType) {
                    $data['returns'] = implode('|', array_map(fn ($t) => $t->getName(), $returns->getTypes()));
                } else {
                    $data['returns'] = $returns->allowsNull() ? '?'.$returns->getName() : $returns->getName();
                }
            }

            $result['methods'][] = $data;
        }

        foreach ($reflection->getProperties() as $property) {
            if (in_array($property->getName(), $ignoreProps) || $property->getDeclaringClass()->getName() !== $class) {
                continue;
            }

            $prop = [
                'name' => $property->getName(),
                'type' => $property->getType()?->getName(),
                'public' => $property->isPublic(),
                'protected' => $property->isProtected(),
                'private' => $property->isPrivate(),
                'nullable' => $property->getType()?->allowsNull(),
                'static' => $property->isStatic(),
                'description' => static::cleanDocComment($property->getDocComment()),
            ];

            if ($property->hasDefaultValue()) {
                $prop['value'] = $property->getDefaultValue();
            }

            $result['properties'][] = $prop;
        }

        return $result;
    }

    protected static function getMethodBody(\ReflectionMethod $method): string
    {
        $length = $method->getEndLine() - ($start = $method->getStartLine());
        $source = file($method->getFileName());

        $strings = array_slice($source, $start + 1, $length - 2);

        $identSize = strlen($strings[0]) - strlen(ltrim($strings[0]));

        $strings = array_map(function ($string) use ($identSize) {
            return preg_replace('/^'.str_repeat(' ', $identSize).'/', '', $string);
        }, $strings);

        return trim(implode('', $strings));
    }

    protected static function cleanDocComment(string $doc): string
    {
        // Remove the opening /** and closing */
        $doc = preg_replace('#^/\*\*(.*)\*/#s', '$1', $doc);

        // Remove leading * on each line
        $doc = preg_replace('#^\s*\*\s?#m', '', $doc);

        // Trim whitespace from start and end
        return trim($doc);
    }
}
