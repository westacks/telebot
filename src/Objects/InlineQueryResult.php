<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object represents one result of an inline query. Telegram clients currently support results of the following 20 types:
 *
 * - [InlineQueryResultCachedAudio](https://core.telegram.org/bots/api#inlinequeryresultcachedaudio)
 * - [InlineQueryResultCachedDocument](https://core.telegram.org/bots/api#inlinequeryresultcacheddocument)
 * - [InlineQueryResultCachedGif](https://core.telegram.org/bots/api#inlinequeryresultcachedgif)
 * - [InlineQueryResultCachedMpeg4Gif](https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif)
 * - [InlineQueryResultCachedPhoto](https://core.telegram.org/bots/api#inlinequeryresultcachedphoto)
 * - [InlineQueryResultCachedSticker](https://core.telegram.org/bots/api#inlinequeryresultcachedsticker)
 * - [InlineQueryResultCachedVideo](https://core.telegram.org/bots/api#inlinequeryresultcachedvideo)
 * - [InlineQueryResultCachedVoice](https://core.telegram.org/bots/api#inlinequeryresultcachedvoice)
 * - [InlineQueryResultArticle](https://core.telegram.org/bots/api#inlinequeryresultarticle)
 * - [InlineQueryResultAudio](https://core.telegram.org/bots/api#inlinequeryresultaudio)
 * - [InlineQueryResultContact](https://core.telegram.org/bots/api#inlinequeryresultcontact)
 * - [InlineQueryResultGame](https://core.telegram.org/bots/api#inlinequeryresultgame)
 * - [InlineQueryResultDocument](https://core.telegram.org/bots/api#inlinequeryresultdocument)
 * - [InlineQueryResultGif](https://core.telegram.org/bots/api#inlinequeryresultgif)
 * - [InlineQueryResultLocation](https://core.telegram.org/bots/api#inlinequeryresultlocation)
 * - [InlineQueryResultMpeg4Gif](https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif)
 * - [InlineQueryResultPhoto](https://core.telegram.org/bots/api#inlinequeryresultphoto)
 * - [InlineQueryResultVenue](https://core.telegram.org/bots/api#inlinequeryresultvenue)
 * - [InlineQueryResultVideo](https://core.telegram.org/bots/api#inlinequeryresultvideo)
 * - [InlineQueryResultVoice](https://core.telegram.org/bots/api#inlinequeryresultvoice)
 *
 * __Note__: All URLs passed in inline query results will be available to end users and therefore must be assumed to be __public__.
 */
abstract class InlineQueryResult extends TelegramObject
{
    private static $types = [
        'default' => [
            'article' => InlineQueryResultArticle::class,
            'photo' => InlineQueryResultPhoto::class,
            'gif' => InlineQueryResultGif::class,
            'mpeg4_gif' => InlineQueryResultMpeg4Gif::class,
            'video' => InlineQueryResultVideo::class,
            'audio' => InlineQueryResultAudio::class,
            'voice' => InlineQueryResultVoice::class,
            'document' => InlineQueryResultDocument::class,
            'location' => InlineQueryResultLocation::class,
            'venue' => InlineQueryResultVenue::class,
            'contact' => InlineQueryResultContact::class,
            'game' => InlineQueryResultGame::class,
        ],
        'cached' => [
            'photo' => InlineQueryResultCachedPhoto::class,
            'gif' => InlineQueryResultCachedGif::class,
            'mpeg4_gif' => InlineQueryResultCachedMpeg4Gif::class,
            'sticker' => InlineQueryResultCachedSticker::class,
            'document' => InlineQueryResultCachedDocument::class,
            'video' => InlineQueryResultCachedVideo::class,
            'voice' => InlineQueryResultCachedVoice::class,
            'audio' => InlineQueryResultCachedAudio::class,
        ],
    ];

    public static function create($object)
    {
        $object = (array)$object;
        $key = static::isCached($object) ? 'cached' : 'default';
        $type = $object['type'] ?? null;
        $class = static::$types[$key][$type] ?? null;

        if ($class) {
            return new $class($object);
        }

        throw new TeleBotException('Cannot cast value of type ' . gettype($object) . ' to type ' . static::class);
    }

    private static function isCached($object)
    {
        foreach (array_keys($object) as $key) {
            if (str_contains($key, 'file_id')) {
                return true;
            }
        }

        return false;
    }
}
