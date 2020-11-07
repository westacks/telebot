<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the photo.
 *
 * @property string               $type                  Type of the result, must be photo
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $photo_url             A valid URL of the photo. Photo must be in jpeg format. Photo size must not exceed 5MB
 * @property string               $thumb_url             URL of the thumbnail for the photo
 * @property int                  $photo_width           _Optional_. Width of the photo
 * @property int                  $photo_height          _Optional_. Height of the photo
 * @property string               $title                 _Optional_. Title for the result
 * @property string               $description           _Optional_. Short description of the result
 * @property string               $caption               _Optional_. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property string               $parse_mode            _Optional_. Mode for parsing entities in the photo caption. See formatting options for more details.
 * @property Array<MessageEntity> $caption_entities      _Optional_. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the photo
 */
class InlineQueryResultPhoto extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'photo_url' => 'string',
            'thumb_url' => 'string',
            'photo_width' => 'integer',
            'photo_height' => 'integer',
            'title' => 'string',
            'description' => 'string',
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class],
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
