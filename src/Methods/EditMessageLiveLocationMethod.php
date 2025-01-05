<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Message;

/**
 * Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to [stopMessageLiveLocation](https://core.telegram.org/bots/api#stopmessagelivelocation). On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * @property string               $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * @property string               $chat_id                __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int                  $message_id             __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * @property string               $inline_message_id      __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property float                $latitude               __Required: Yes__. Latitude of new location
 * @property float                $longitude              __Required: Yes__. Longitude of new location
 * @property int                  $live_period            __Required: Optional__. New period in seconds during which the location can be updated, starting from the message send date. If 0x7FFFFFFF is specified, then the location can be updated forever. Otherwise, the new value must not exceed the current live_period by more than a day, and the live location expiration date must remain within the next 90 days. If not specified, then live_period remains unchanged
 * @property float                $horizontal_accuracy    __Required: Optional__. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property int                  $heading                __Required: Optional__. Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property int                  $proximity_alert_radius __Required: Optional__. The maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * @property InlineKeyboardMarkup $reply_markup           __Required: Optional__. A JSON-serialized object for a new [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards).
 */
class EditMessageLiveLocationMethod extends TelegramMethod
{
    protected string $method = 'editMessageLiveLocation';

    protected string $expect = 'Message|boolean';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_id' => 'integer',
        'inline_message_id' => 'string',
        'latitude' => 'double',
        'longitude' => 'double',
        'live_period' => 'integer',
        'horizontal_accuracy' => 'double',
        'heading' => 'integer',
        'proximity_alert_radius' => 'integer',
        'reply_markup' => 'InlineKeyboardMarkup',
    ];

    public function mock($arguments)
    {
        if (isset($arguments['inline_message_id'])) {
            return true;
        }

        return new Message([
            'chat' => [
                'id' => $arguments['chat_id'],
            ],
            'message_id' => $arguments['message_id'],
            'text' => 'Test',
            'location' => [
                'latitude' => $arguments['latitude'],
                'longitude' => $arguments['longitude'],
                'horizontal_accuracy' => $arguments['horizontal_accuracy'] ?? null,
                'live_period' => time(),
                'heading' => $arguments['heading'] ?? null,
                'proximity_alert_radius' => $arguments['proximity_alert_radius'] ?? null,
            ],
            'reply_markup' => $arguments['reply_markup'] ?? [],
        ]);
    }
}
