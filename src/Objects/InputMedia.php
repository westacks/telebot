<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Objects\InputMedia\InputMediaAnimation;
use WeStacks\TeleBot\Objects\InputMedia\InputMediaAudio;
use WeStacks\TeleBot\Objects\InputMedia\InputMediaDocument;
use WeStacks\TeleBot\Objects\InputMedia\InputMediaPhoto;
use WeStacks\TeleBot\Objects\InputMedia\InputMediaVideo;

/**
 * This object represents the content of a media message to be sent. It should be one of: InputMediaAnimation, InputMediaDocument, InputMediaAudio, InputMediaPhoto, InputMediaVideo
 * 
 * @package WeStacks\TeleBot\Objects
 */
abstract class InputMedia extends TelegramObject
{
    /**
     * Create new object instance
     * 
     * @param mixed $object 
     * @return static 
     */
    public static function create($object)
    {
        $type = static::types()[$object->type ?? $object['type']];
        return new $type($object);
    }

    private static function types()
    {
        return [
            'photo'         => InputMediaPhoto::class,
            'video'         => InputMediaVideo::class,
            'animation'     => InputMediaAnimation::class,
            'audio'         => InputMediaAudio::class,
            'document'      => InputMediaDocument::class
        ];
    }
}