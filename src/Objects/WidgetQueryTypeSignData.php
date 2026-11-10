<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The query contains data signed by a TON wallet of the user who sent the query. The data is signed for the domain bot<bot_id>, where <bot_id> is the identifier of the bot.
 * @property-read string $type Type of the query, always “sign_data”
 * @property-read WidgetQueryWallet $wallet The wallet that signed the data
 * @property-read string $sign_data JSON-serialized signed data
 *
 * @see https://core.telegram.org/bots/api#widgetquerytypesigndata
 */
class WidgetQueryTypeSignData extends WidgetQueryType
{
    public function __construct(
        public readonly string $type,
        public readonly WidgetQueryWallet $wallet,
        public readonly string $sign_data,
    ) {
    }
}
