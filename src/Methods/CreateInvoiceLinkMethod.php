<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\LabeledPrice;

/**
 * Use this method to create a link for an invoice. Returns the created invoice link as String on success.
 *
 * @property string          $title                         __Required: Yes__.	Product name, 1-32 characters
 * @property string          $description                   __Required: Yes__.	Product description, 1-255 characters
 * @property string          $payload                       __Required: Yes__.	Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
 * @property string          $provider_token                __Required: Yes__.	Payment provider token, obtained via BotFather
 * @property string          $currency                      __Required: Yes__.	Three-letter ISO 4217 currency code, see more on currencies
 * @property LabeledPrice[]  $prices                        __Required: Yes__.	Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
 * @property int         $max_tip_amount                __Required: Optional__.	The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
 * @property int         $suggested_tip_amounts	        __Required: Optional__.	A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * @property string          $provider_data                 __Required: Optional__.	JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
 * @property string          $photo_url                     __Required: Optional__.	URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
 * @property int         $photo_size                    __Required: Optional__.	Photo size in bytes
 * @property int         $photo_width                   __Required: Optional__.	Photo width
 * @property int         $photo_height                  __Required: Optional__.	Photo height
 * @property bool         $need_name                     __Required: Optional__.	Pass True, if you require the user's full name to complete the order
 * @property bool         $need_phone_number             __Required: Optional__.	Pass True, if you require the user's phone number to complete the order
 * @property bool         $need_email                    __Required: Optional__.	Pass True, if you require the user's email address to complete the order
 * @property bool         $need_shipping_address         __Required: Optional__.	Pass True, if you require the user's shipping address to complete the order
 * @property bool         $send_phone_number_to_provider __Required: Optional__.	Pass True, if the user's phone number should be sent to the provider
 * @property bool         $send_email_to_provider        __Required: Optional__.	Pass True, if the user's email address should be sent to the provider
 * @property bool         $is_flexible                   __Required: Optional__.	Pass True, if the final price depends on the shipping method
 */
class CreateInvoiceLinkMethod extends TelegramMethod
{
    protected string $method = 'createInvoiceLink';

    protected string $expect = 'string';

    protected array $parameters = [
        'title' => 'string',
        'description' => 'string',
        'payload' => 'string',
        'provider_token' => 'string',
        'currency' => 'string',
        'prices' => 'LabeledPrice[]',
        'max_tip_amount' => 'integer',
        'suggested_tip_amounts' => 'integer',
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

    public function mock($arguments)
    {
        return 'https://example.com/invoice';
    }
}
