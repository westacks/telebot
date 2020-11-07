<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 *
 * @property string               $type                   Type of the result, must be location
 * @property string               $id                     Unique identifier for this result, 1-64 Bytes
 * @property float                $latitude               Location latitude in degrees
 * @property float                $longitude              Location longitude in degrees
 * @property string               $title                  Location title
 * @property float                $horizontal_accuracy    _Optional_. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property integer              $live_period            _Optional_. Time relative to the message sending date, during which the location can be updated, in seconds. For active live locations only.
 * @property integer              $heading                _Optional_. The direction in which user is moving, in degrees; 1-360. For active live locations only.
 * @property integer              $proximity_alert_radius _Optional_. Maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 * @property InlineKeyboardMarkup $reply_markup           _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content  _Optional_. Content of the message to be sent instead of the location
 * @property string               $thumb_url              _Optional_. Url of the thumbnail for the result
 * @property int                  $thumb_width            _Optional_. Thumbnail width
 * @property int                  $thumb_height           _Optional_. Thumbnail height
 */
class InlineQueryResultLocation extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'latitude' => 'float',
            'longitude' => 'float',
            'title' => 'string',
            'horizontal_accuracy' => 'float',
            'live_period' => 'integer',
            'heading' => 'integer',
            'proximity_alert_radius' => 'integer',
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
            'thumb_url' => 'string',
            'thumb_width' => 'integer',
            'thumb_height' => 'integer',
        ];
    }
}
