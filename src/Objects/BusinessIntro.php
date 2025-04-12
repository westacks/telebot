<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Contains information about the start page settings of a Telegram Business account.
 * @property-read ?string $title Optional. Title text of the business intro
 * @property-read ?string $message Optional. Message text of the business intro
 * @property-read ?Sticker $sticker Optional. Sticker of the business intro
 *
 * @see https://core.telegram.org/bots/api#businessintro
 */
class BusinessIntro extends TelegramObject
{
    public function __construct(
        public readonly ?string $title,
        public readonly ?string $message,
        public readonly ?Sticker $sticker,
    ) {
    }
}
