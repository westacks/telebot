<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the venue.
 *
 * @property string               $type                  Type of the result, must be venue
 * @property string               $id                    Unique identifier for this result, 1-64 Bytes
 * @property float                $latitude              Latitude of the venue location in degrees
 * @property float                $longitude             Longitude of the venue location in degrees
 * @property string               $title                 Title of the venue
 * @property string               $address               Address of the venue
 * @property string               $foursquare_id         _Optional_. Foursquare identifier of the venue if known
 * @property string               $foursquare_type       _Optional_. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property string               $google_place_id       _Optional_. Google Places identifier of the venue
 * @property string               $google_place_type     _Optional_. Google Places type of the venue
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the venue
 * @property string               $thumb_url             _Optional_. Url of the thumbnail for the result
 * @property int                  $thumb_width           _Optional_. Thumbnail width
 * @property int                  $thumb_height          _Optional_. Thumbnail height
 */
class InlineQueryResultVenue extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'latitude' => 'float',
            'longitude' => 'float',
            'title' => 'string',
            'address' => 'string',
            'foursquare_id' => 'string',
            'foursquare_type' => 'string',
            'google_place_id' => 'string',
            'google_place_type' => 'string',
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
            'thumb_url' => 'string',
            'thumb_width' => 'integer',
            'thumb_height' => 'integer',
        ];
    }
}
