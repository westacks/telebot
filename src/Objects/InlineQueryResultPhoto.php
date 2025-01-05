<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the photo.
 *
 * @property string                                                                                                  $type                     Type of the result, must be photo
 * @property string                                                                                                  $id                       Unique identifier for this result, 1-64 bytes
 * @property string                                                                                                  $photo_url                A valid URL of the photo. Photo must be in __JPEG__ format. Photo size must not exceed 5MB
 * @property string                                                                                                  $thumbnail_url            URL of the thumbnail for the photo
 * @property int                                                                                                     $photo_width              Optional. Width of the photo
 * @property int                                                                                                     $photo_height             Optional. Height of the photo
 * @property string                                                                                                  $title                    Optional. Title for the result
 * @property string                                                                                                  $description              Optional. Short description of the result
 * @property string                                                                                                  $caption                  Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property string                                                                                                  $parse_mode               Optional. Mode for parsing entities in the photo caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[]                                                                                         $caption_entities         Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool                                                                                                    $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property InlineKeyboardMarkup                                                                                    $reply_markup             Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content    Optional. Content of the message to be sent instead of the photo
 */
class InlineQueryResultPhoto extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'photo_url' => 'string',
        'thumbnail_url' => 'string',
        'photo_width' => 'integer',
        'photo_height' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'show_caption_above_media' => 'boolean',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
    ];
}
