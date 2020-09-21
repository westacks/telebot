<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a photo stored on the Telegram servers. By default, this photo will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the photo.
 *
 * @property string               $type                  Type of the result, must be photo
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $photo_file_id         A valid file identifier of the photo
 * @property string               $title                 _Optional_. Title for the result
 * @property string               $description           _Optional_. Short description of the result
 * @property string               $caption               _Optional_. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property string               $parse_mode            _Optional_. Mode for parsing entities in the photo caption. See formatting options for more details.
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the photo
 */
class InlineQueryResultCachedPhoto extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'photo_file_id' => 'string',
            'title' => 'string',
            'description' => 'string',
            'caption' => 'string',
            'parse_mode' => 'string',
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
