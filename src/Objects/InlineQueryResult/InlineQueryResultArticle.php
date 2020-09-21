<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an article or web page.
 *
 * @property string               $type                  Type of the result, must be article
 * @property string               $id                    Unique identifier for this result, 1-64 Bytes
 * @property string               $title                 Title of the result
 * @property InputMessageContent  $input_message_content Content of the message to be sent
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property string               $url                   _Optional_. URL of the result
 * @property bool                 $hide_url              _Optional_. Pass True, if you don't want the URL to be shown in the message
 * @property string               $description           _Optional_. Short description of the result
 * @property string               $thumb_url             _Optional_. Url of the thumbnail for the result
 * @property int                  $thumb_width           _Optional_. Thumbnail width
 * @property int                  $thumb_height          _Optional_. Thumbnail height
 */
class InlineQueryResultArticle extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'title' => 'string',
            'input_message_content' => InputMessageContent::class,
            'reply_markup' => InlineKeyboardMarkup::class,
            'url' => 'string',
            'hide_url' => 'boolean',
            'description' => 'string',
            'thumb_url' => 'string',
            'thumb_width' => 'integer',
            'thumb_height' => 'integer',
        ];
    }
}
