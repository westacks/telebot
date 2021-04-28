<?php

namespace WeStacks\TeleBot\Objects\InputMessageContent;

use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Payments\LabeledPrice;

/**
 * Represents the content of an invoice message to be sent as the result of an inline query.
 *
 * @property String	                $title                              Product name, 1-32 characters
 * @property String	                $description                        Product description, 1-255 characters
 * @property String	                $payload	                        Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
 * @property String	                $provider_token	                    Payment provider token, obtained via Botfather
 * @property String	                $currency	                        Three-letter ISO 4217 currency code, see more on currencies
 * @property Array<LabeledPrice>	$prices	                            Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
 * @property Integer	            $max_tip_amount	                    _Optional_. The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
 * @property Array<Integer>         $suggested_tip_amounts	            _Optional_. A JSON-serialized array of suggested amounts of tip in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * @property String	                $provider_data	                    _Optional_. A JSON-serialized object for data about the invoice, which will be shared with the payment provider. A detailed description of the required fields should be provided by the payment provider.
 * @property String	                $photo_url	                        _Optional_. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like it better when they see what they are paying for.
 * @property Integer                $photo_size	                        _Optional_. Photo size
 * @property Integer                $photo_width	                    _Optional_. Photo width
 * @property Integer                $photo_height	                    _Optional_. Photo height
 * @property Boolean                $need_name	                        _Optional_. Pass True, if you require the user's full name to complete the order
 * @property Boolean                $need_phone_number	                _Optional_. Pass True, if you require the user's phone number to complete the order
 * @property Boolean                $need_email	                        _Optional_. Pass True, if you require the user's email address to complete the order
 * @property Boolean                $need_shipping_address	            _Optional_. Pass True, if you require the user's shipping address to complete the order
 * @property Boolean                $send_phone_number_to_provider	    _Optional_. Pass True, if user's phone number should be sent to provider
 * @property Boolean                $send_email_to_provider	            _Optional_. Pass True, if user's email address should be sent to provider
 * @property Boolean                $is_flexible	                    _Optional_. Pass True, if the final price depends on the shipping method
 */
class InputInvoiceMessageContent extends InputMessageContent
{
    protected function relations()
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'payload' => 'string',
            'provider_token' => 'string',
            'currency' => 'string',
            'prices' => array(LabeledPrice::class),
            'max_tip_amount' => 'integer',
            'suggested_tip_amounts' => array('integer'),
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
}
