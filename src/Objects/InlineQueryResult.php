<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents one result of an inline query. Telegram clients currently support results of the following 20 types:
 * Note: All URLs passed in inline query results will be available to end users and therefore must be assumed to be public.
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
 * @see https://core.telegram.org/bots/api#inlinequeryresult
 */
abstract class InlineQueryResult extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'audio' => InlineQueryResultCachedAudio::class,
            'document' => InlineQueryResultCachedDocument::class,
            'gif' => InlineQueryResultCachedGif::class,
            'mpeg4_gif' => InlineQueryResultCachedMpeg4Gif::class,
            'photo' => InlineQueryResultCachedPhoto::class,
            'sticker' => InlineQueryResultCachedSticker::class,
            'video' => InlineQueryResultCachedVideo::class,
            'voice' => InlineQueryResultCachedVoice::class,
            'article' => InlineQueryResultArticle::class,
            'audio' => InlineQueryResultAudio::class,
            'contact' => InlineQueryResultContact::class,
            'game' => InlineQueryResultGame::class,
            'document' => InlineQueryResultDocument::class,
            'gif' => InlineQueryResultGif::class,
            'location' => InlineQueryResultLocation::class,
            'mpeg4_gif' => InlineQueryResultMpeg4Gif::class,
            'photo' => InlineQueryResultPhoto::class,
            'venue' => InlineQueryResultVenue::class,
            'video' => InlineQueryResultVideo::class,
            'voice' => InlineQueryResultVoice::class,
            default => throw new \InvalidArgumentException("Unknown InlineQueryResult: ".$parameters['type']),
        };
    }
}
