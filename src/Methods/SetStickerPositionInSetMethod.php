<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
 *
 * @property-read string $sticker File identifier of the sticker
 * @property-read int $position New sticker position in the set, zero-based
 *
 * @see https://core.telegram.org/bots/api#setstickerpositioninset
 */
class SetStickerPositionInSetMethod extends TelegramMethod
{
    protected string $method = 'setStickerPositionInSet';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $sticker,
        public readonly int $position,
    ) {
    }
}
