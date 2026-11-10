<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get information about a unique gift by its name. Returns a UniqueGift object on success.
 *
 * @property-read string $name Unique name of the gift
 *
 * @see https://core.telegram.org/bots/api#getuniquegift
 */
class GetUniqueGiftMethod extends TelegramMethod
{
    protected string $method = 'getUniqueGift';
    protected array $expect = ['UniqueGift'];

    public function __construct(
        public readonly string $name,
    ) {
    }
}
