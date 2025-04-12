<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 * @property-read string $type Type of the result, must be location
 * @property-read string $id Unique identifier for this result, 1-64 Bytes
 * @property-read float $latitude Location latitude in degrees
 * @property-read float $longitude Location longitude in degrees
 * @property-read string $title Location title
 * @property-read ?float $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property-read ?int $live_period Optional. Period in seconds during which the location can be updated, should be between 60 and 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
 * @property-read ?int $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property-read ?int $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the location
 * @property-read ?string $thumbnail_url Optional. Url of the thumbnail for the result
 * @property-read ?int $thumbnail_width Optional. Thumbnail width
 * @property-read ?int $thumbnail_height Optional. Thumbnail height
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultlocation
 */
class InlineQueryResultLocation extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly string $title,
        public readonly ?float $horizontal_accuracy,
        public readonly ?int $live_period,
        public readonly ?int $heading,
        public readonly ?int $proximity_alert_radius,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
        public readonly ?string $thumbnail_url,
        public readonly ?int $thumbnail_width,
        public readonly ?int $thumbnail_height,
    ) {
    }
}
