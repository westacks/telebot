<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send invoices. On success, the sent Message is returned.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read string $title Product name, 1-32 characters
 * @property-read string $description Product description, 1-255 characters
 * @property-read string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your internal processes.
 * @property-read ?string $provider_token Payment provider token, obtained via @BotFather. Pass an empty string for payments in Telegram Stars.
 * @property-read string $currency Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram Stars.
 * @property-read LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
 * @property-read ?int $max_tip_amount The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not supported for payments in Telegram Stars.
 * @property-read ?int[] $suggested_tip_amounts A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * @property-read ?string $start_parameter Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay button, allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty, forwarded copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the value used as the start parameter
 * @property-read ?string $provider_data JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
 * @property-read ?string $photo_url URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like it better when they see what they are paying for.
 * @property-read ?int $photo_size Photo size in bytes
 * @property-read ?int $photo_width Photo width
 * @property-read ?int $photo_height Photo height
 * @property-read ?bool $need_name Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram Stars.
 * @property-read ?bool $need_phone_number Pass True if you require the user's phone number to complete the order. Ignored for payments in Telegram Stars.
 * @property-read ?bool $need_email Pass True if you require the user's email address to complete the order. Ignored for payments in Telegram Stars.
 * @property-read ?bool $need_shipping_address Pass True if you require the user's shipping address to complete the order. Ignored for payments in Telegram Stars.
 * @property-read ?bool $send_phone_number_to_provider Pass True if the user's phone number should be sent to the provider. Ignored for payments in Telegram Stars.
 * @property-read ?bool $send_email_to_provider Pass True if the user's email address should be sent to the provider. Ignored for payments in Telegram Stars.
 * @property-read ?bool $is_flexible Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars.
 * @property-read ?bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the sent message from forwarding and saving
 * @property-read ?bool $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property-read ?string $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
 * @property-read ?ReplyParameters $reply_parameters Description of the message to reply to
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not empty, the first button must be a Pay button.
 *
 * @see https://core.telegram.org/bots/api#sendinvoice
 */
class SendInvoiceMethod extends TelegramMethod
{
    protected string $method = 'sendInvoice';
    protected array $expect = ['Message'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly string $title,
        public readonly string $description,
        public readonly string $payload,
        public readonly ?string $provider_token,
        public readonly string $currency,
        public readonly array $prices,
        public readonly ?int $max_tip_amount,
        public readonly ?array $suggested_tip_amounts,
        public readonly ?string $start_parameter,
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
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $allow_paid_broadcast,
        public readonly ?string $message_effect_id,
        public readonly ?ReplyParameters $reply_parameters,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
