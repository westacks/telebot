<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the content of an invoice message to be sent as the result of an inline query.
 * @property-read string $title Product name, 1-32 characters
 * @property-read string $description Product description, 1-255 characters
 * @property-read string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your internal processes.
 * @property-read ?string $provider_token Optional. Payment provider token, obtained via @BotFather. Pass an empty string for payments in Telegram Stars.
 * @property-read string $currency Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram Stars.
 * @property-read LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
 * @property-read ?int $max_tip_amount Optional. The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not supported for payments in Telegram Stars.
 * @property-read ?int[] $suggested_tip_amounts Optional. A JSON-serialized array of suggested amounts of tip in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * @property-read ?string $provider_data Optional. A JSON-serialized object for data about the invoice, which will be shared with the payment provider. A detailed description of the required fields should be provided by the payment provider.
 * @property-read ?string $photo_url Optional. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
 * @property-read ?int $photo_size Optional. Photo size in bytes
 * @property-read ?int $photo_width Optional. Photo width
 * @property-read ?int $photo_height Optional. Photo height
 * @property-read ?bool $need_name Optional. Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram Stars.
 * @property-read ?bool $need_phone_number Optional. Pass True if you require the user's phone number to complete the order. Ignored for payments in Telegram Stars.
 * @property-read ?bool $need_email Optional. Pass True if you require the user's email address to complete the order. Ignored for payments in Telegram Stars.
 * @property-read ?bool $need_shipping_address Optional. Pass True if you require the user's shipping address to complete the order. Ignored for payments in Telegram Stars.
 * @property-read ?bool $send_phone_number_to_provider Optional. Pass True if the user's phone number should be sent to the provider. Ignored for payments in Telegram Stars.
 * @property-read ?bool $send_email_to_provider Optional. Pass True if the user's email address should be sent to the provider. Ignored for payments in Telegram Stars.
 * @property-read ?bool $is_flexible Optional. Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars.
 *
 * @see https://core.telegram.org/bots/api#inputinvoicemessagecontent
 */
class InputInvoiceMessageContent extends InputMessageContent
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $payload,
        public readonly ?string $provider_token,
        public readonly string $currency,
        public readonly array $prices,
        public readonly ?int $max_tip_amount,
        public readonly ?array $suggested_tip_amounts,
        public readonly ?string $provider_data,
        public readonly ?string $photo_url,
        public readonly ?int $photo_size,
        public readonly ?int $photo_width,
        public readonly ?int $photo_height,
        public readonly ?bool $need_name,
        public readonly ?bool $need_phone_number,
        public readonly ?bool $need_email,
        public readonly ?bool $need_shipping_address,
        public readonly ?bool $send_phone_number_to_provider,
        public readonly ?bool $send_email_to_provider,
        public readonly ?bool $is_flexible,
    ) {
    }
}
