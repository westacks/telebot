<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about a transfer with a TON wallet.
 * @property-read string $transaction_id Unique identifier of the transaction; may be empty if the transfer hasn't been sent yet
 * @property-read string $peer_address Address of the transfer peer in the TON blockchain
 * @property-read string $amount The amount of transferred cryptocurrency, in the smallest units of the cryptocurrency, as a decimal number; negative for outgoing transfers
 * @property-read ?string $comment Optional. Comment added to the transfer; omitted if the comment is encrypted
 *
 * @see https://core.telegram.org/bots/api#tonwallettransfer
 */
class TonWalletTransfer extends TelegramObject
{
    public function __construct(
        public readonly string $transaction_id,
        public readonly string $peer_address,
        public readonly string $amount,
        public readonly ?string $comment,
    ) {
    }
}
