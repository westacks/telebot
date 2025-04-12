<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Contains information about the location of a Telegram Business account.
 * @property-read string $address Address of the business
 * @property-read ?Location $location Optional. Location of the business
 *
 * @see https://core.telegram.org/bots/api#businesslocation
 */
class BusinessLocation extends TelegramObject
{
    public function __construct(
        public readonly string $address,
        public readonly ?Location $location,
    ) {
    }
}
