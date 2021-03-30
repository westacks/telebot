<?php

namespace WeStacks\TeleBot\Helpers;

use Exception;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\InputFile;

class TypeCaster
{
    /**
     * Casts each `$object` key to a given type in `$relations` array with a same key.
     *
     * @param array|object $object
     *
     * @return array
     */
    public static function castValues($object, array $relations)
    {
        if (!is_array($object) && !is_object($object)) {
            throw TeleBotObjectException::uncastableType('array', gettype($object));
        }

        $result = [];

        foreach ($object as $prop => $value) {
            if (isset($relations[$prop])) {
                $result[$prop] = static::cast($value, $relations[$prop]);
            }
        }

        return $result;
    }

    /**
     * Casts a `$value` to a given `$type`.
     *
     * @param mixed        $value
     * @param array|string $type
     *
     * @return mixed
     */
    public static function cast($value, $type)
    {
        if (is_array($type)) {
            return static::castArrayOfTypes($value, $type);
        }

        $types = explode('|', $type);

        if (count($types) > 1) {
            foreach ($types as $_type) {
                try {
                    return static::cast($value, $_type);
                }
                catch (Exception $e) {
                    // We need to check eash avaliable type, so just skip exception.
                }
            }

            TeleBotObjectException::uncastableType($type, gettype($value));
        }

        if (static::isCasted($value, $type)) {
            return $value;
        }

        return static::castDirect($value, $type);
    }

    /**
     * Cast all sub objects to arrays.
     *
     * @param array|object $object
     *
     * @return array
     */
    public static function stripArrays($object)
    {
        $array = [];

        foreach ($object as $key => $value) {
            if ((is_object($value) && is_subclass_of($value, TelegramObject::class)) || is_array($value)) {
                $value = static::stripArrays($value);
            }
            $array[$key] = $value;
        }

        return $array;
    }

    /**
     * Create a flat array for multipart Guzzle request from array of parameters.
     *
     * @param array $object
     *
     * @return array
     */
    public static function flatten($object)
    {
        $flat = [];
        $files = [];
        static::extractFiles($object, $files);

        foreach ($object as $key => $value) {
            $flat[] = [
                'name' => $key,
                'contents' => is_array($value) ? json_encode($value) : $value,
            ];
        }

        return array_merge($flat, $files);
    }

    private static function castArrayOfTypes($object, array $type)
    {
        if (!is_array($object)) {
            throw TeleBotObjectException::uncastableType(gettype($type), gettype($object));
        }

        foreach ($object as $subKey => $subValue) {
            $object[$subKey] = static::cast($subValue, $type[0]);
        }

        return $object;
    }

    private static function isCasted($object, string $type)
    {
        $value_type = gettype($object);

        return  $value_type == $type ||
                'object' == $value_type && class_exists($type) &&
                ($object instanceof $type || is_subclass_of($object, $type));
    }

    private static function castDirect($object, string $type)
    {
        $simple = ['int', 'integer', 'bool', 'boolean', 'float', 'double', 'string'];
        $value_type = gettype($object);

        if (in_array($value_type, $simple) && in_array($type, $simple)) {
            settype($object, $type);

            return $object;
        }

        if (class_exists($type)) {
            return $type::create($object);
        }

        throw TeleBotObjectException::uncastableType($type, $value_type);
    }

    /**
     * Extract files from `$object` array and replace them with `attach://<file_attach_name>` string.
     */
    private static function extractFiles(array &$object, array &$files)
    {
        foreach ($object as $key => $value) {
            if (is_object($value) && is_subclass_of($value, TelegramObject::class)) {
                $value = $value->toArray();
            }

            if (is_array($value)) {
                static::extractFiles($value, $files);
            }

            if ($value instanceof InputFile) {
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
