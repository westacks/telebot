<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes a TON wallet of the user, which is used in a query from a widget.
 * @property-read string $address Address of the wallet
 * @property-read string $amount Balance of the wallet, in the smallest units of the cryptocurrency, as a decimal number
 * @property-read ?string $public_key Optional. Hex-encoded public key of the wallet; omitted if unknown
 * @property-read ?string $state_init Optional. Base64-encoded serialized StateInit of the wallet contract; omitted if and only if public_key is omitted
 *
 * @see https://core.telegram.org/bots/api#widgetquerywallet
 */
class WidgetQueryWallet extends TelegramObject
{
    public function __construct(
        public readonly string $address,
        public readonly string $amount,
        public readonly ?string $public_key,
        public readonly ?string $state_init,
    ) {
    }
}
