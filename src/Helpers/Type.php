<?php

namespace WeStacks\TeleBot\Helpers;

use Throwable;
use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Objects\InputFile;

class Type
{
    public static function cast($value, $type)
    {
        if (is_array($type)) {
            return self::castMany($value, $type);
        }

        $types = explode('|', $type);

        if (count($types) > 1) {
            foreach ($types as $_type) {
                try {
                    return static::cast($value, $_type);
                } catch (Throwable) {
                    // We need to check each avaliable type, so just skip exception.
                }
            }

            throw new TeleBotException('Cannot cast value of type '.gettype($value).' to type '.$type);
        }

        if ($type !== $_type = preg_replace('/\[\]$/', '', $type)) {
            return static::castMany($value, $_type);
        }

        if (static::isCasted($value, $type)) {
            return $value;
        }

        return static::castDirect($value, $type);
    }

    public static function strip($object)
    {
        if (! is_iterable($object)) {
            return $object;
        }

        $array = [];

        foreach ($object as $key => $value) {
            $array[$key] = static::strip($value);
        }

        return $array;
    }

    private static function isCasted($object, string $type)
    {
        $value_type = gettype($object);

        return $value_type == $type ||
                $value_type == 'object' && class_exists($type) &&
                ($object instanceof $type || is_subclass_of($object, $type));
    }

    private static function castMany(iterable $values, $types)
    {
        $data = [];

        foreach ($values as $key => $value) {
            $type = is_array($types) ? ($types[$key] ?? null) : $types;
            if ($type) {
                $data[$key] = self::cast($value, $type);
            }
        }

        return $data;
    }

    private static function castDirect($value, string $type)
    {
        $simple = ['int', 'integer', 'bool', 'boolean', 'float', 'double', 'string'];
        $value_type = gettype($value);

        if (in_array($value_type, $simple) && in_array($type, $simple)) {
            settype($value, $type);

            return $value;
        }

        if (class_exists($class = "WeStacks\\TeleBot\\Objects\\$type")) {
            return $class::create($value);
        }

        throw new TeleBotException('Cannot cast value of type '.$value_type.' to type '.$type);
    }

    public static function flatten($object, array $parameters)
    {
        $object = static::cast($object, $parameters);
        $flat = [];
        $files = [];
        static::extractFiles($object, $files);

        foreach ($object as $key => $value) {
            $flat[] = [
                'name' => $key,
                'contents' => is_iterable($value) ?
                    json_encode(static::strip($value)) : $value,
            ];
        }

        return array_merge($flat, $files);
    }

    private static function extractFiles(&$object, array &$files)
    {
        foreach ($object as $key => $value) {
            if (is_a($value, TelegramObject::class)) {
                $value = $value->toArray();
            }

            if (is_array($value)) {
                static::extractFiles($value, $files);
            }

            if (is_a($value, InputFile::class)) {
                static::extractFile($value, $files);
            }

            $object[$key] = $value;
        }
    }

    private static function extractFile(InputFile &$file, array &$files)
    {
        $fileKey = 'file_'.count($files);
        $extract = $file->toMultipart($fileKey);
        if (isset($extract['filename']) || is_resource($extract['contents'])) {
            $files[] = $extract;
            $file = "attach://{$fileKey}";
        } else {
            $file = $extract['contents'];
        }
    }
}
