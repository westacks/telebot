<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an NFT in the TON blockchain.
 * @property-read string $address Address of the NFT
 * @property-read ?string $collection_address Optional. Address of the collection to which the NFT belongs; omitted if unknown
 * @property-read string $index Index of the NFT among all NFTs from the collection as a decimal number
 * @property-read string $name Name of the NFT
 * @property-read string $description Description of the NFT
 * @property-read ?TonNftAttribute[] $attributes Optional. Attributes of the NFT
 * @property-read ?UniqueGift $gift Optional. The unique gift corresponding to the NFT
 *
 * @see https://core.telegram.org/bots/api#tonnft
 */
class TonNft extends TelegramObject
{
    public function __construct(
        public readonly string $address,
        public readonly ?string $collection_address,
        public readonly string $index,
        public readonly string $name,
        public readonly string $description,
        public readonly ?array $attributes,
        public readonly ?UniqueGift $gift,
    ) {
    }
}
