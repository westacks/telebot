<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a transaction with a user.
 * @property-read string $type Type of the transaction partner, always “user”
 * @property-read string $transaction_type Type of the transaction, currently one of “invoice_payment” for payments via invoices, “paid_media_payment” for payments for paid media, “gift_purchase” for gifts sent by the bot, “premium_purchase” for Telegram Premium subscriptions gifted by the bot, “business_account_transfer” for direct transfers from managed business accounts
 * @property-read User $user Information about the user
 * @property-read ?AffiliateInfo $affiliate Optional. Information about the affiliate that received a commission via this transaction. Can be available only for “invoice_payment” and “paid_media_payment” transactions.
 * @property-read ?string $invoice_payload Optional. Bot-specified invoice payload. Can be available only for “invoice_payment” transactions.
 * @property-read ?int $subscription_period Optional. The duration of the paid subscription. Can be available only for “invoice_payment” transactions.
 * @property-read ?PaidMedia[] $paid_media Optional. Information about the paid media bought by the user; for “paid_media_payment” transactions only
 * @property-read ?string $paid_media_payload Optional. Bot-specified paid media payload. Can be available only for “paid_media_payment” transactions.
 * @property-read ?Gift $gift Optional. The gift sent to the user by the bot; for “gift_purchase” transactions only
 * @property-read ?int $premium_subscription_duration Optional. Number of months the gifted Telegram Premium subscription will be active for; for “premium_purchase” transactions only
 *
 * @see https://core.telegram.org/bots/api#transactionpartneruser
 */
class TransactionPartnerUser extends TransactionPartner
{
    public function __construct(
        public readonly string $type,
        public readonly string $transaction_type,
        public readonly User $user,
        public readonly ?AffiliateInfo $affiliate,
        public readonly ?string $invoice_payload,
        public readonly ?int $subscription_period,
        public readonly ?array $paid_media,
        public readonly ?string $paid_media_payload,
        public readonly ?Gift $gift,
        public readonly ?int $premium_subscription_duration,
    ) {
    }
}
