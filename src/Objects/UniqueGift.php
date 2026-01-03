<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes a unique gift that was upgraded from a regular gift.
 * @property-read string $gift_id Identifier of the regular gift from which the gift was upgraded
 * @property-read string $base_name Human-readable name of the regular gift from which this unique gift was upgraded
 * @property-read string $name Unique name of the gift. This name can be used in https://t.me/nft/... links and story areas
 * @property-read int $number Unique number of the upgraded gift among gifts upgraded from the same regular gift
 * @property-read UniqueGiftModel $model Model of the gift
 * @property-read UniqueGiftSymbol $symbol Symbol of the gift
 * @property-read UniqueGiftBackdrop $backdrop Backdrop of the gift
 * @property-read ?true $is_premium Optional. True, if the original regular gift was exclusively purchaseable by Telegram Premium subscribers
 * @property-read ?true $is_from_blockchain Optional. True, if the gift is assigned from the TON blockchain and can't be resold or transferred in Telegram
 * @property-read ?UniqueGiftColors $colors Optional. The color scheme that can be used by the gift's owner for the chat's name, replies to messages and link previews; for business account gifts and gifts that are currently on sale only
 * @property-read ?Chat $publisher_chat Optional. Information about the chat that published the gift
 *
 * @see https://core.telegram.org/bots/api#uniquegift
 */
class UniqueGift extends TelegramObject
{
    public function __construct(
        public readonly string $gift_id,
        public readonly string $base_name,
        public readonly string $name,
        public readonly int $number,
        public readonly UniqueGiftModel $model,
        public readonly UniqueGiftSymbol $symbol,
        public readonly UniqueGiftBackdrop $backdrop,
        public readonly ?true $is_premium,
        public readonly ?true $is_from_blockchain,
        public readonly ?UniqueGiftColors $colors,
        public readonly ?Chat $publisher_chat,
    ) {
    }
}
