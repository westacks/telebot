<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 *
 * @property string                                                                                                  $type                   Type of the result, must be location
 * @property string                                                                                                  $id                     Unique identifier for this result, 1-64 Bytes
 * @property float                                                                                                   $latitude               Location latitude in degrees
 * @property float                                                                                                   $longitude              Location longitude in degrees
 * @property string                                                                                                  $title                  Location title
 * @property float                                                                                                   $horizontal_accuracy    Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property int                                                                                                     $live_period            Optional. Period in seconds during which the location can be updated, should be between 60 and 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
 * @property int                                                                                                     $heading                Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property int                                                                                                     $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * @property InlineKeyboardMarkup                                                                                    $reply_markup           Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content  Optional. Content of the message to be sent instead of the location
 * @property string                                                                                                  $thumbnail_url          Optional. Url of the thumbnail for the result
 * @property int                                                                                                     $thumbnail_width        Optional. Thumbnail width
 * @property int                                                                                                     $thumbnail_height       Optional. Thumbnail height
 */
class InlineQueryResultLocation extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'latitude' => 'double',
        'longitude' => 'double',
        'title' => 'string',
        'horizontal_accuracy' => 'double',
        'live_period' => 'integer',
        'heading' => 'integer',
        'proximity_alert_radius' => 'integer',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
        'thumbnail_url' => 'string',
        'thumbnail_width' => 'integer',
        'thumbnail_height' => 'integer',
    ];
}
