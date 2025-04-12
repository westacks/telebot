<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\AcceptedGiftTypes;

/**
 * Changes the privacy settings pertaining to incoming gifts in a managed business account. Requires the can_change_gift_settings business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read bool $show_gift_button Pass True, if a button for sending a gift to the user or by the business account must always be shown in the input field
 * @property-read AcceptedGiftTypes $accepted_gift_types Types of gifts accepted by the business account
 *
 * @see https://core.telegram.org/bots/api#setbusinessaccountgiftsettings
 */
class SetBusinessAccountGiftSettingsMethod extends TelegramMethod
{
    protected string $method = 'setBusinessAccountGiftSettings';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly bool $show_gift_button,
        public readonly AcceptedGiftTypes $accepted_gift_types,
    ) {
    }
}
