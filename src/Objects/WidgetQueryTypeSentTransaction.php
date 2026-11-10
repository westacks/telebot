<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The query notifies the bot about a transaction sent from a TON wallet of the user who sent the query.
 * @property-read string $type Type of the query, always “sent_transaction”
 * @property-read WidgetQueryWallet $wallet The wallet from which the transaction was sent
 * @property-read string $msg_hash Value of msg_hash of the transaction
 *
 * @see https://core.telegram.org/bots/api#widgetquerytypesenttransaction
 */
class WidgetQueryTypeSentTransaction extends WidgetQueryType
{
    public function __construct(
        public readonly string $type,
        public readonly WidgetQueryWallet $wallet,
        public readonly string $msg_hash,
    ) {
    }
}
