<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\TelegramObject;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultArticle;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultPhoto;

/**
 * This object represents one result of an inline query. Telegram clients currently support results of the following 20 types: InlineQueryResultCachedAudio, InlineQueryResultCachedDocument, InlineQueryResultCachedGif, InlineQueryResultCachedMpeg4Gif, InlineQueryResultCachedPhoto, InlineQueryResultCachedSticker, InlineQueryResultCachedVideo, InlineQueryResultCachedVoice, InlineQueryResultArticle, InlineQueryResultAudio, InlineQueryResultContact, InlineQueryResultGame, InlineQueryResultDocument, InlineQueryResultGif, InlineQueryResultLocation, InlineQueryResultMpeg4Gif, InlineQueryResultPhoto, InlineQueryResultVenue, InlineQueryResultVideo, InlineQueryResultVoice
 * @package WeStacks\TeleBot\TelegramObject
 */

abstract class InlineQueryResult extends TelegramObject
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
            'article'       => InlineQueryResultArticle::class,
            'photo'         => InlineQueryResultPhoto::class,
            // TODO: https://core.telegram.org/bots/api#inlinequeryresultgif
        ];
    }
}
