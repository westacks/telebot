<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Allows the bot to cancel or re-enable extension of a subscription paid in Telegram Stars. Returns True on success.
 *
 * @property-read int $user_id Identifier of the user whose subscription will be edited
 * @property-read string $telegram_payment_charge_id Telegram payment identifier for the subscription
 * @property-read bool $is_canceled Pass True to cancel extension of the user subscription; the subscription must be active up to the end of the current subscription period. Pass False to allow the user to re-enable a subscription that was previously canceled by the bot.
 *
 * @see https://core.telegram.org/bots/api#edituserstarsubscription
 */
class EditUserStarSubscriptionMethod extends TelegramMethod
{
    protected string $method = 'editUserStarSubscription';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly string $telegram_payment_charge_id,
        public readonly bool $is_canceled,
    ) {
    }
}
