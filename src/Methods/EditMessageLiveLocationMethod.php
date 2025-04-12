<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;

/**
 * Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
 * @property-read null|int|string $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_id Required if inline_message_id is not specified. Identifier of the message to edit
 * @property-read ?string $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property-read float $latitude Latitude of new location
 * @property-read float $longitude Longitude of new location
 * @property-read ?int $live_period New period in seconds during which the location can be updated, starting from the message send date. If 0x7FFFFFFF is specified, then the location can be updated forever. Otherwise, the new value must not exceed the current live_period by more than a day, and the live location expiration date must remain within the next 90 days. If not specified, then live_period remains unchanged
 * @property-read ?float $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
 * @property-read ?int $heading Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property-read ?int $proximity_alert_radius The maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for a new inline keyboard.
 *
 * @see https://core.telegram.org/bots/api#editmessagelivelocation
 */
class EditMessageLiveLocationMethod extends TelegramMethod
{
    protected string $method = 'editMessageLiveLocation';
    protected array $expect = ['Message', 'true'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly null|int|string $chat_id,
        public readonly ?int $message_id,
        public readonly ?string $inline_message_id,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly ?int $live_period,
        public readonly ?float $horizontal_accuracy,
        public readonly ?int $heading,
        public readonly ?int $proximity_alert_radius,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
