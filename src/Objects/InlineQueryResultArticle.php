<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to an article or web page.
 *
 * @property string                                                                                                  $type                  Type of the result, must be article
 * @property string                                                                                                  $id                    Unique identifier for this result, 1-64 Bytes
 * @property string                                                                                                  $title                 Title of the result
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content Content of the message to be sent
 * @property InlineKeyboardMarkup                                                                                    $reply_markup          Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property string                                                                                                  $url                   Optional. URL of the result
 * @property string                                                                                                  $description           Optional. Short description of the result
 * @property string                                                                                                  $thumbnail_url         Optional. Url of the thumbnail for the result
 * @property int                                                                                                     $thumbnail_width       Optional. Thumbnail width
 * @property int                                                                                                     $thumbnail_height      Optional. Thumbnail height
 */
class InlineQueryResultArticle extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'title' => 'string',
        'input_message_content' => 'InputMessageContent',
        'reply_markup' => 'InlineKeyboardMarkup',
        'url' => 'string',
        'description' => 'string',
        'thumbnail_url' => 'string',
        'thumbnail_width' => 'integer',
        'thumbnail_height' => 'integer',
    ];
}
