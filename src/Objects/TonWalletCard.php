<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes a TON wallet card, which is shown on the profile page of a user to everyone.
 * @property-read string $address Address of the wallet
 * @property-read string $amount Balance of the wallet, in the smallest units of the cryptocurrency, as a decimal number
 * @property-read TonWalletCardSticker[] $stickers Stickers placed on the card
 * @property-read ?string $background_nft_address Optional. Address of the NFT of one of the stickers, whose colors must be used for the card background; omitted if the default background must be used
 *
 * @see https://core.telegram.org/bots/api#tonwalletcard
 */
class TonWalletCard extends TelegramObject
{
    public function __construct(
        public readonly string $address,
        public readonly string $amount,
        public readonly array $stickers,
        public readonly ?string $background_nft_address,
    ) {
    }
}
