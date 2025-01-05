<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the contact.
 *
 * @property string                                                                                                  $type                  Type of the result, must be contact
 * @property string                                                                                                  $id                    Unique identifier for this result, 1-64 Bytes
 * @property string                                                                                                  $phone_number          Contact's phone number
 * @property string                                                                                                  $first_name            Contact's first name
 * @property string                                                                                                  $last_name             Optional. Contact's last name
 * @property string                                                                                                  $vcard                 Optional. Additional data about the contact in the form of a [vCard](https://en.wikipedia.org/wiki/VCard), 0-2048 bytes
 * @property InlineKeyboardMarkup                                                                                    $reply_markup          Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content Optional. Content of the message to be sent instead of the contact
 * @property string                                                                                                  $thumbnail_url         Optional. Url of the thumbnail for the result
 * @property int                                                                                                     $thumbnail_width       Optional. Thumbnail width
 * @property int                                                                                                     $thumbnail_height      Optional. Thumbnail height
 */
class InlineQueryResultContact extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'phone_number' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'vcard' => 'string',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
        'thumbnail_url' => 'string',
        'thumbnail_width' => 'integer',
        'thumbnail_height' => 'integer',
    ];
}
