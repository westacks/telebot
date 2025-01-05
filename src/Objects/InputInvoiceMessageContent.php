<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of an invoice message to be sent as the result of an inline query.
 *
 * @property string         $title                         Product name, 1-32 characters
 * @property string         $description                   Product description, 1-255 characters
 * @property string         $payload                       Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your internal processes.
 * @property string         $provider_token                Optional. Payment provider token, obtained via [@BotFather](https://t.me/botfather). Pass an empty string for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property string         $currency                      Three-letter ISO 4217 currency code, see [more on currencies](https://core.telegram.org/bots/payments#supported-currencies). Pass “XTR” for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property LabeledPrice[] $prices                        Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property int            $max_tip_amount                Optional. The maximum accepted amount for tips in the smallest units of the currency (integer, __not__ float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not supported for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property int[]          $suggested_tip_amounts         Optional. A JSON-serialized array of suggested amounts of tip in the smallest units of the currency (integer, __not__ float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * @property string         $provider_data                 Optional. A JSON-serialized object for data about the invoice, which will be shared with the payment provider. A detailed description of the required fields should be provided by the payment provider.
 * @property string         $photo_url                     Optional. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
 * @property int            $photo_size                    Optional. Photo size in bytes
 * @property int            $photo_width                   Optional. Photo width
 * @property int            $photo_height                  Optional. Photo height
 * @property bool           $need_name                     Optional. Pass True if you require the user's full name to complete the order. Ignored for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property bool           $need_phone_number             Optional. Pass True if you require the user's phone number to complete the order. Ignored for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property bool           $need_email                    Optional. Pass True if you require the user's email address to complete the order. Ignored for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property bool           $need_shipping_address         Optional. Pass True if you require the user's shipping address to complete the order. Ignored for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property bool           $send_phone_number_to_provider Optional. Pass True if the user's phone number should be sent to the provider. Ignored for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property bool           $send_email_to_provider        Optional. Pass True if the user's email address should be sent to the provider. Ignored for payments in [Telegram Stars](https://t.me/BotNews/90).
 * @property bool           $is_flexible                   Optional. Pass True if the final price depends on the shipping method. Ignored for payments in [Telegram Stars](https://t.me/BotNews/90).
 */
class InputInvoiceMessageContent extends TelegramObject
{
    protected $attributes = [
        'title' => 'string',
        'description' => 'string',
        'payload' => 'string',
        'provider_token' => 'string',
        'currency' => 'string',
        'prices' => 'LabeledPrice[]',
        'max_tip_amount' => 'integer',
        'suggested_tip_amounts' => 'integer[]',
        'provider_data' => 'string',
        'photo_url' => 'string',
        'photo_size' => 'integer',
        'photo_width' => 'integer',
        'photo_height' => 'integer',
        'need_name' => 'boolean',
        'need_phone_number' => 'boolean',
        'need_email' => 'boolean',
        'need_shipping_address' => 'boolean',
        'send_phone_number_to_provider' => 'boolean',
        'send_email_to_provider' => 'boolean',
        'is_flexible' => 'boolean',
    ];
}
