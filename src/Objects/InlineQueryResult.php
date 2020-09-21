<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultArticle;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultAudio;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultCachedAudio;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultCachedDocument;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultCachedGif;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultCachedMpeg4Gif;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultCachedPhoto;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultCachedSticker;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultCachedVideo;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultCachedVoice;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultContact;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultDocument;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultGame;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultGif;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultLocation;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultMpeg4Gif;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultPhoto;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultVenue;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultVideo;
use WeStacks\TeleBot\Objects\InlineQueryResult\InlineQueryResultVoice;

/**
 * This object represents one result of an inline query. Telegram clients currently support results of the following 20 types: InlineQueryResultCachedAudio, InlineQueryResultCachedDocument, InlineQueryResultCachedGif, InlineQueryResultCachedMpeg4Gif, InlineQueryResultCachedPhoto, InlineQueryResultCachedSticker, InlineQueryResultCachedVideo, InlineQueryResultCachedVoice, InlineQueryResultArticle, InlineQueryResultAudio, InlineQueryResultContact, InlineQueryResultGame, InlineQueryResultDocument, InlineQueryResultGif, InlineQueryResultLocation, InlineQueryResultMpeg4Gif, InlineQueryResultPhoto, InlineQueryResultVenue, InlineQueryResultVideo, InlineQueryResultVoice.
 */
abstract class InlineQueryResult extends TelegramObject
{
    /**
     * Create new object instance.
     *
     * @param mixed $object
     *
     * @return static
     */
    public static function create($object)
    {
        $types = static::types();
        $key = static::isCached($object) ? 'cached' : 'default';
        $type = $object->type ?? $object['type'] ?? '__undefined';

        $type = $types[$key][$type] ?? null;

        if ($type) {
            return new $type($object);
        }

        throw TeleBotObjectException::uncastableType(static::class, gettype($object));
    }

    private static function types()
    {
        return [
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
    }

    private static function isCached($object)
    {
        if (!is_array($object) && !is_object($object)) {
            return false;
        }

        if (is_object($object)) {
            $object = (array) $object;
        }

        foreach (array_keys($object) as $key) {
            if (false !== strpos($key, 'file_id')) {
                return true;
            }
        }

        return false;
    }
}
