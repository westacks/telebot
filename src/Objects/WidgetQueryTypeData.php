<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The query contains data for the bot.
 * @property-read string $type Type of the query, always “data”
 * @property-read ?TonWalletCard $wallet_card Optional. TON wallet card of the user who sent the query, if it was sent to the bot along with the query
 *
 * @see https://core.telegram.org/bots/api#widgetquerytypedata
 */
class WidgetQueryTypeData extends WidgetQueryType
{
    public function __construct(
        public readonly string $type,
        public readonly ?TonWalletCard $wallet_card,
    ) {
    }
}
