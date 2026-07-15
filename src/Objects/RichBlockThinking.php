<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a “Thinking…” placeholder, corresponding to the custom HTML tag <tg-thinking>. The block may be used only in sendRichMessageDraft, therefore it can't be received in messages. See https://t.me/addemoji/AIActions for examples of custom emoji that are recommended for usage in the block.
 * @property-read string $type Type of the block, always “thinking”
 * @property-read RichText $text Text of the block. See https://t.me/addemoji/AIActions for examples of custom emoji that are recommended for usage in the block.
 *
 * @see https://core.telegram.org/bots/api#richblockthinking
 */
class RichBlockThinking extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
