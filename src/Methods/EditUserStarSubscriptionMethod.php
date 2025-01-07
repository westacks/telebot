<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Allows the bot to cancel or re-enable extension of a subscription paid in Telegram Stars. Returns True on success.
 *
 * @property int    $user_id                    __Required: Yes__. Identifier of the user whose subscription will be edited
 * @property string $telegram_payment_charge_id __Required: Yes__. Telegram payment identifier for the subscription
 * @property bool   $is_canceled                __Required: Yes__. Pass True to cancel extension of the user subscription; the subscription must be active up to the end of the current subscription period. Pass False to allow the user to re-enable a subscription that was previously canceled by the bot.
 */
class EditUserStarSubscriptionMethod extends TelegramMethod
{
    protected string $method = 'editUserStarSubscription';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id' => 'integer',
        'telegram_payment_charge_id' => 'string',
        'is_canceled' => 'boolean',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
