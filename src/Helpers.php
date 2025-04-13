<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Exceptions\UnclosedQuotesException;
use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * @internal Synthesize Telegram objects and methods.
 * @template T
 * @param class-string<T> $target
 * @return T|null
 */
function synthesize(mixed $data, string $target): mixed
{
    // Null
    if (str_starts_with($target, '?')) {
        if ($data === null) {
            return null;
        }

        $target = substr($target, 1);
    }

    // Array value
    if (str_ends_with($target, '[]')) {
        if (! is_array($data)) {
            throw new \InvalidArgumentException('Input must be of type array, '.gettype($data).' given');
        }

        $target = substr($target, 0, -2);

        foreach ($data as $key => $value) {
            $data[$key] = synthesize($value, $target);
        }

        return $data;
    }

    // Scalar value
    if (in_array($target, ['true', 'false'])) {
        $target = 'bool';
    }

    if (in_array($target, ['int', 'integer', 'bool', 'boolean', 'float', 'double', 'string'])) {
        if (! settype($data, $target)) {
            throw new \InvalidArgumentException('Input must be of type '.$target.', '.gettype($data).' given');
        }

        return $data;
    }

    // Telegram object
    if (class_exists("WeStacks\\TeleBot\\Objects\\{$target}")) {
        $target = "WeStacks\\TeleBot\\Objects\\{$target}";
    }

    if ($target === InputFile::class) {
        return new $target($data);
    }

    if (! class_exists($target)) {
        throw new \InvalidArgumentException('Class '.$target.' does not exist');
    }

    // Abstracts
    if (in_array(Identifiable::class, class_implements($target))) {
        $target = $target::identify($data);
    }

    if ($data instanceof $target) {
        return $data;
    }

    $reflection = new \ReflectionClass($target);
    $params = [];

    if (! $reflection->getConstructor()) {
        return new $target(...$data);
    }

    foreach ($reflection->getConstructor()->getParameters() as $param) {
        $name = $param->getName();
        $type = $param->getType();

        $type = $type instanceof \ReflectionUnionType
            ? array_map(fn ($t) => $t->getName(), $type->getTypes())
            : $type->getName();

        if ($type === 'array' && preg_match_all("/\@property(.*) (.*) \\$".$name.'/', $reflection->getDocComment(), $matches, PREG_SET_ORDER)) {
            $type = $matches[0][2];
        }

        $params[$name] = $type;
    }

    $result = [];

    foreach ($params as $name => $type) {
        if (! is_array($type)) {
            $type = [$type];
        }

        foreach ($type as $t) {
            try {
                $result[$name] = isset($data[$name]) ? synthesize($data[$name], $t) : null;
                break;
            } catch (\InvalidArgumentException) {
                continue;
            }
        }
    }

    return new $target(...$result);
}

/**
 * @internal Prepare data for multipart upload.
 * @return Array<array{name: string, contents: string|resource, filename?: string}>
 */
function multipart(array $data, array &$files = []): array
{
    $result = [];

    $extract = function (InputFile &$file) use (&$files) {
        $key = 'file_'.count($files);
        $data = $file->toMultipart($key);

        if (isset($data['filename']) || is_resource($data['contents'])) {
            $files[] = $data;

            return "attach://{$key}";
        }

        return $data['contents'];
    };

    $walk = function (array &$data) use (&$extract, &$result, &$walk) {
        foreach ($data as $key => $value) {
            if (is_a($value, InputFile::class)) {
                $data[$key] = $extract($value);

                continue;
            }

            if ($value instanceof TelegramObject) {
                $data[$key] = $value->toArray();
            }

            if (is_array($value)) {
                $walk($data[$key]);
            }
        }
    };

    $walk($data);

    foreach ($data as $key => $value) {
        $result[$key] = [
            'name' => $key,
            'contents' => is_iterable($value) ? json_encode($value) : (string) $value,
        ];
    }

    return array_merge(array_values($result), $files);
}

/**
 * @internal Remove the specified key from the given array and return its value.
 */
function array_pull(array &$data, string $key, mixed $default = null): mixed
{
    if (! array_key_exists($key, $data)) {
        return $default;
    }

    $value = $data[$key];
    unset($data[$key]);

    return $value;
}

/**
 * @internal Splits the given command line string into an array of command arguments
 *
 * @return string[]
 * @throws UnclosedQuotesException
 */
function split(string $command): array
{
    // whitespace characters count as argument separators
    static $ws = array(
        ' ',
        "\r",
        "\n",
        "\t",
        "\v",
    );

    $i = 0;
    $args = array();

    while (true) {
        // command string ended
        if (!isset($command[$i])) {
            break;
        }

        $inQuote = null;
        $quotePosition = 0;
        $argument = '';
        $part = '';

        // read a single argument
        for (; isset($command[$i]); ++$i) {
            $c = $command[$i];

            if ($inQuote === "'") {
                // we're within a 'single quoted' string
                if ($c === '\\' && isset($command[$i + 1]) && ($command[$i + 1] === "'" || $command[$i + 1] === '\\')) {
                    // escaped single quote or backslash ends up as char in argument
                    $part .= $command[++$i];
                    continue;
                } elseif ($c === "'") {
                    // single quote ends
                    $inQuote = null;
                    $argument .= $part;
                    $part = '';
                    continue;
                }
            } else {
                // we're not within any quotes or within a "double quoted" string
                if ($c === '\\' && isset($command[$i + 1])) {
                    if ($command[$i + 1] === 'u') {
                        // this looks like a unicode escape sequence
                        // use JSON parser to interpret this
                        $c = json_decode('"' . substr($command, $i, 6) . '"');
                        if ($c !== null) {
                            // on success => use interpreted and skip sequence
                            $argument .= stripcslashes($part) . $c;
                            $part = '';
                            $i += 5;
                            continue;
                        }
                    }

                    // escaped characters will be interpreted when part is complete
                    $part .= $command[$i] . $command[$i + 1];
                    ++$i;
                    continue;
                } elseif ($inQuote === '"' && $c === '"') {
                    // double quote ends
                    $inQuote = null;

                    // previous double quoted part should be interpreted
                    $argument .= stripcslashes($part);
                    $part = '';
                    continue;
                } elseif ($inQuote === null && ($c === '"' || $c === "'")) {
                    // start of quotes found
                    $inQuote = $c;
                    $quotePosition = $i;

                    // previous unquoted part should be interpreted
                    $argument .= stripcslashes($part);
                    $part = '';
                    continue;
                } elseif ($inQuote === null && in_array($c, $ws)) {
                    // whitespace character terminates unquoted argument
                    break;
                }
            }

            $part .= $c;
        }

        // end of argument reached. Still in quotes is a parse error.
        if ($inQuote !== null) {
            throw new UnclosedQuotesException($inQuote, $quotePosition);
        }

        // add remaining part to current argument
        if ($part !== '') {
            $argument .= stripcslashes($part);
        }

        $args [] = $argument;
    }

    return $args;
}

/**
 * @internal
 */
function get_public_object_vars(object $object): array
{
    return get_object_vars($object);
}
