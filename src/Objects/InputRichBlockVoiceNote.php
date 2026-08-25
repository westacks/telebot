<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A block with a voice note, corresponding to the HTML tag <audio>.
 * @property-read string $type Type of the block, always “voice_note”
 * @property-read InputMediaVoiceNote $voice_note The voice note. Caption is ignored.
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockvoicenote
 */
class InputRichBlockVoiceNote extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaVoiceNote $voice_note,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
