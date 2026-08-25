<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a media element embedded in an outgoing rich message.
 * @property-read string $id Unique identifier of the media used in a tg://photo?id=, tg://video?id=, tg://document?id=, or tg://audio?id= link. 1-64 characters, only A-Z, a-z, 0-9, _ and - are allowed.
 * @property-read InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media The media to be sent. Everything except the media itself and its properties is ignored.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagemedia
 */
class InputRichMessageMedia extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media,
    ) {
    }
}
