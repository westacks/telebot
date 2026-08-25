<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A block with a voice note, corresponding to the HTML tag <audio>.
 * @property-read string $type Type of the block, always “voice_note”
 * @property-read Voice $voice_note The voice note
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#richblockvoicenote
 */
class RichBlockVoiceNote extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly Voice $voice_note,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
