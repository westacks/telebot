<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file. Currently, only .PDF and .ZIP files can be sent using this method.
 *
 * @property string               $type                  Type of the result, must be document
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $title                 Title for the result
 * @property string               $caption               _Optional_. Caption of the document to be sent, 0-1024 characters after entities parsing
 * @property string               $parse_mode            _Optional_. Mode for parsing entities in the document caption. See formatting options for more details.
 * @property Array<MessageEntity> $caption_entities      _Optional_. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property string               $document_url          A valid URL for the file
 * @property string               $mime_type             Mime type of the content of the file, either “application/pdf” or “application/zip”
 * @property string               $description           _Optional_. Short description of the result
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the file
 * @property string               $thumb_url             _Optional_. URL of the thumbnail (jpeg only) for the file
 * @property int                  $thumb_width           _Optional_. Thumbnail width
 * @property int                  $thumb_height          _Optional_. Thumbnail height
 */
class InlineQueryResultDocument extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'title' => 'string',
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class],
            'document_url' => 'string',
            'mime_type' => 'string',
            'description' => 'string',
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
            'thumb_url' => 'string',
            'thumb_width' => 'string',
            'thumb_height' => 'string',
        ];
    }
}
