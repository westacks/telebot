<?php

namespace WeStacks\TeleBot\Objects\Passport;

use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\Passport\PassportElementError\PassportElementErrorDataField;

abstract class PassportElementError extends TelegramObject
{
        /**
     * Create new object instance
     * 
     * @param mixed $object 
     * @return static 
     */
    public static function create($object)
    {
        $types = static::types();
        $type = $object->source ?? $object['source'] ?? '__undefined';
        
        $type = $types[$type] ?? null;

        if ($type) return new $type($object);

        throw TeleBotObjectException::uncastableType(static::class, gettype($object));
    }

    private static function types()
    {
        return [
            'data' => PassportElementErrorDataField::class,
            // TODO: https://core.telegram.org/bots/api#passportelementerrorfrontside and rest
        ];
    }
}