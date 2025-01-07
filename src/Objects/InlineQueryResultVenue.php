<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the venue.
 *
 * @property string                                                                                                  $type                  Type of the result, must be venue
 * @property string                                                                                                  $id                    Unique identifier for this result, 1-64 Bytes
 * @property float                                                                                                   $latitude              Latitude of the venue location in degrees
 * @property float                                                                                                   $longitude             Longitude of the venue location in degrees
 * @property string                                                                                                  $title                 Title of the venue
 * @property string                                                                                                  $address               Address of the venue
 * @property string                                                                                                  $foursquare_id         Optional. Foursquare identifier of the venue if known
 * @property string                                                                                                  $foursquare_type       Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property string                                                                                                  $google_place_id       Optional. Google Places identifier of the venue
 * @property string                                                                                                  $google_place_type     Optional. Google Places type of the venue. (See [supported types](https://developers.google.com/places/web-service/supported_types).)
 * @property InlineKeyboardMarkup                                                                                    $reply_markup          Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content Optional. Content of the message to be sent instead of the venue
 * @property string                                                                                                  $thumbnail_url         Optional. Url of the thumbnail for the result
 * @property int                                                                                                     $thumbnail_width       Optional. Thumbnail width
 * @property int                                                                                                     $thumbnail_height      Optional. Thumbnail height
 */
class InlineQueryResultVenue extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'latitude' => 'double',
        'longitude' => 'double',
        'title' => 'string',
        'address' => 'string',
        'foursquare_id' => 'string',
        'foursquare_type' => 'string',
        'google_place_id' => 'string',
        'google_place_type' => 'string',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
        'thumbnail_url' => 'string',
        'thumbnail_width' => 'integer',
        'thumbnail_height' => 'integer',
    ];
}
