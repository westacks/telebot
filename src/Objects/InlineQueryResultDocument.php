<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file. Currently, only __.PDF__ and __.ZIP__ files can be sent using this method.
 *
 * @property string                                                                                                  $type                  Type of the result, must be document
 * @property string                                                                                                  $id                    Unique identifier for this result, 1-64 bytes
 * @property string                                                                                                  $title                 Title for the result
 * @property string                                                                                                  $caption               Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
 * @property string                                                                                                  $parse_mode            Optional. Mode for parsing entities in the document caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[]                                                                                         $caption_entities      Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property string                                                                                                  $document_url          A valid URL for the file
 * @property string                                                                                                  $mime_type             MIME type of the content of the file, either “application/pdf” or “application/zip”
 * @property string                                                                                                  $description           Optional. Short description of the result
 * @property InlineKeyboardMarkup                                                                                    $reply_markup          Optional. Inline keyboard attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content Optional. Content of the message to be sent instead of the file
 * @property string                                                                                                  $thumbnail_url         Optional. URL of the thumbnail (JPEG only) for the file
 * @property int                                                                                                     $thumbnail_width       Optional. Thumbnail width
 * @property int                                                                                                     $thumbnail_height      Optional. Thumbnail height
 */
class InlineQueryResultDocument extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'title' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'document_url' => 'string',
        'mime_type' => 'string',
        'description' => 'string',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
        'thumbnail_url' => 'string',
        'thumbnail_width' => 'integer',
        'thumbnail_height' => 'integer',
    ];
}
