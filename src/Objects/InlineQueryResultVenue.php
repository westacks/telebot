<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the venue.
 * @property-read string $type Type of the result, must be venue
 * @property-read string $id Unique identifier for this result, 1-64 Bytes
 * @property-read float $latitude Latitude of the venue location in degrees
 * @property-read float $longitude Longitude of the venue location in degrees
 * @property-read string $title Title of the venue
 * @property-read string $address Address of the venue
 * @property-read ?string $foursquare_id Optional. Foursquare identifier of the venue if known
 * @property-read ?string $foursquare_type Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property-read ?string $google_place_id Optional. Google Places identifier of the venue
 * @property-read ?string $google_place_type Optional. Google Places type of the venue. (See supported types.)
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the venue
 * @property-read ?string $thumbnail_url Optional. Url of the thumbnail for the result
 * @property-read ?int $thumbnail_width Optional. Thumbnail width
 * @property-read ?int $thumbnail_height Optional. Thumbnail height
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvenue
 */
class InlineQueryResultVenue extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly string $title,
        public readonly string $address,
        public readonly ?string $foursquare_id,
        public readonly ?string $foursquare_type,
        public readonly ?string $google_place_id,
        public readonly ?string $google_place_type,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
        public readonly ?string $thumbnail_url,
        public readonly ?int $thumbnail_width,
        public readonly ?int $thumbnail_height,
    ) {
    }
}
