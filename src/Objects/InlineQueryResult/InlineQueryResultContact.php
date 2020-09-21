<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the contact.
 *
 * @property string               $type                  Type of the result, must be contact
 * @property string               $id                    Unique identifier for this result, 1-64 Bytes
 * @property string               $phone_number          Contact's phone number
 * @property string               $first_name            Contact's first name
 * @property string               $last_name             _Optional_. Contact's last name
 * @property string               $vcard                 _Optional_. Additional data about the contact in the form of a vCard, 0-2048 bytes
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the contact
 * @property string               $thumb_url             _Optional_. Url of the thumbnail for the result
 * @property int                  $thumb_width           _Optional_. Thumbnail width
 * @property int                  $thumb_height          _Optional_. Thumbnail height
 */
class InlineQueryResultContact extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'phone_number' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'vcard' => 'string',
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
            'thumb_url' => 'string',
            'thumb_width' => 'integer',
            'thumb_height' => 'integer',
        ];
    }
}
