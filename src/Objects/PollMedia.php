<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * At most one of the optional fields can be present in any given object.
 * @property-read ?Animation $animation Optional. Media is an animation, information about the animation
 * @property-read ?Audio $audio Optional. Media is an audio file, information about the file; currently, can't be received in a poll option
 * @property-read ?Document $document Optional. Media is a general file, information about the file; currently, can't be received in a poll option
 * @property-read ?Link $link Optional. The HTTP link attached to the poll option
 * @property-read ?LivePhoto $live_photo Optional. Media is a live photo, information about the live photo
 * @property-read ?Location $location Optional. Media is a shared location, information about the location
 * @property-read ?PhotoSize[] $photo Optional. Media is a photo, available sizes of the photo
 * @property-read ?Sticker $sticker Optional. Media is a sticker, information about the sticker; currently, for poll options only
 * @property-read ?Venue $venue Optional. Media is a venue, information about the venue
 * @property-read ?Video $video Optional. Media is a video, information about the video
 *
 * @see https://core.telegram.org/bots/api#pollmedia
 */
class PollMedia extends TelegramObject
{
    public function __construct(
        public readonly ?Animation $animation,
        public readonly ?Audio $audio,
        public readonly ?Document $document,
        public readonly ?Link $link,
        public readonly ?LivePhoto $live_photo,
        public readonly ?Location $location,
        public readonly ?array $photo,
        public readonly ?Sticker $sticker,
        public readonly ?Venue $venue,
        public readonly ?Video $video,
    ) {
    }
}
