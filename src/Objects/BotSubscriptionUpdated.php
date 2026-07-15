<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about changes to a user payment subscription toward the current bot.
 * @property-read User $user User who subscribed for payments toward the bot
 * @property-read string $invoice_payload Bot-specified invoice payload
 * @property-read string $state The new state of the subscription. Currently, it can be one of “canceled” if the user canceled the subscription, “active” if the user re-enabled a previously canceled subscription, or “failed” if payment for the subscription failed.
 *
 * @see https://core.telegram.org/bots/api#botsubscriptionupdated
 */
class BotSubscriptionUpdated extends TelegramObject
{
    public function __construct(
        public readonly User $user,
        public readonly string $invoice_payload,
        public readonly string $state,
    ) {
    }
}
