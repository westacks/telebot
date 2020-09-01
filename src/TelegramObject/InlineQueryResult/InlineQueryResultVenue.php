<?php

namespace WeStacks\TeleBot\TelegramObject\InlineQueryResult;

use WeStacks\TeleBot\TelegramObject\InlineQueryResult;
use WeStacks\TeleBot\TelegramObject\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the venue.
 * @property String                       $type                      Type of the result, must be venue
 * @property String                       $id                        Unique identifier for this result, 1-64 Bytes
 * @property Float                        $latitude                  Latitude of the venue location in degrees
 * @property Float                        $longitude                 Longitude of the venue location in degrees
 * @property String                       $title                     Title of the venue
 * @property String                       $address                   Address of the venue
 * @property String                       $foursquare_id             _Optional_. Foursquare identifier of the venue if known
 * @property String                       $foursquare_type           _Optional_. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property InlineKeyboardMarkup         $reply_markup              _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent          $input_message_content     _Optional_. Content of the message to be sent instead of the venue
 * @property String                       $thumb_url                 _Optional_. Url of the thumbnail for the result
 * @property Integer                      $thumb_width               _Optional_. Thumbnail width
 * @property Integer                      $thumb_height              _Optional_. Thumbnail height
 * @package WeStacks\TeleBot\TelegramObject\InlineQueryResult
 */
class InlineQueryResultVenue extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'id'                    => 'string',
            'latitude'              => 'float',
            'longitude'             => 'float',
            'title'                 => 'string',
            'address'               => 'string',
            'foursquare_id'         => 'string',
            'foursquare_type'       => 'string',
            'reply_markup'          => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
            'thumb_url'             => 'string',
            'thumb_width'           => 'integer',
            'thumb_height'          => 'integer',
        ];
    }
}