<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes a sticker on a TON wallet card.
 * @property-read AreaPosition $position Position of the sticker on the card
 * @property-read TonNft $nft The NFT shown as the sticker
 *
 * @see https://core.telegram.org/bots/api#tonwalletcardsticker
 */
class TonWalletCardSticker extends TelegramObject
{
    public function __construct(
        public readonly AreaPosition $position,
        public readonly TonNft $nft,
    ) {
    }
}
