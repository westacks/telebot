<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\TelegramObject;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultArticle;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultAudio;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultCachedPhoto;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultContact;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultDocument;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultGame;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultGif;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultLocation;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultMpeg4Gif;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultPhoto;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultVenue;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultVideo;
use WeStacks\TeleBot\TelegramObject\InlineQueryResult\InlineQueryResultVoice;

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
        $type = static::types()[static::isCached($object) ? 'cached' : 'default'][$object->type ?? $object['type']];
        return new $type($object);
    }

    private static function types()
    {
        return [
            'default' => [
                'article'       => InlineQueryResultArticle::class,
                'photo'         => InlineQueryResultPhoto::class,
                'gif'           => InlineQueryResultGif::class,
                'mpeg4_gif'     => InlineQueryResultMpeg4Gif::class,
                'video'         => InlineQueryResultVideo::class,
                'audio'         => InlineQueryResultAudio::class,
                'voice'         => InlineQueryResultVoice::class,
                'document'      => InlineQueryResultDocument::class,
                'location'      => InlineQueryResultLocation::class,
                'venue'         => InlineQueryResultVenue::class,
                'contact'       => InlineQueryResultContact::class,
                'game'          => InlineQueryResultGame::class
            ],
            'cached' => [
                // TODO: cached query results https://core.telegram.org/bots/api#inlinequeryresultcachedgif
                'photo'         => InlineQueryResultCachedPhoto::class
            ]
        ];
    }

    private static function isCached($object)
    {
        if(is_object($object)) $object = (array) $object;
        $res = array_keys(array_filter($object, function($var) {
            return strpos($var, 'file_id') !== false;
        }));

        return count($res) > 0;
    }
}
