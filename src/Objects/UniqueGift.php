<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes a unique gift that was upgraded from a regular gift.
 * @property-read string $base_name Human-readable name of the regular gift from which this unique gift was upgraded
 * @property-read string $name Unique name of the gift. This name can be used in https://t.me/nft/... links and story areas
 * @property-read int $number Unique number of the upgraded gift among gifts upgraded from the same regular gift
 * @property-read UniqueGiftModel $model Model of the gift
 * @property-read UniqueGiftSymbol $symbol Symbol of the gift
 * @property-read UniqueGiftBackdrop $backdrop Backdrop of the gift
 *
 * @see https://core.telegram.org/bots/api#uniquegift
 */
class UniqueGift extends TelegramObject
{
    public function __construct(
        public readonly string $base_name,
        public readonly string $name,
        public readonly int $number,
        public readonly UniqueGiftModel $model,
        public readonly UniqueGiftSymbol $symbol,
        public readonly UniqueGiftBackdrop $backdrop,
    ) {
    }
}
