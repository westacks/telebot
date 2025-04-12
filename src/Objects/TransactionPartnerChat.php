<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a transaction with a chat.
 * @property-read string $type Type of the transaction partner, always “chat”
 * @property-read Chat $chat Information about the chat
 * @property-read ?Gift $gift Optional. The gift sent to the chat by the bot
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerchat
 */
class TransactionPartnerChat extends TransactionPartner
{
    public function __construct(
        public readonly string $type,
        public readonly Chat $chat,
        public readonly ?Gift $gift,
    ) {
    }
}
