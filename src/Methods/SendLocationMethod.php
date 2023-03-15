<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Message;

/**
 * Use this method to send point on the map. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string   $chat_id                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int      $message_thread_id           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property float    $latitude                    __Required: Yes__. Latitude of the location
 * @property float    $longitude                   __Required: Yes__. Longitude of the location
 * @property float    $horizontal_accuracy         __Required: Optional__. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property int      $live_period                 __Required: Optional__. Period in seconds for which the location will be updated (see Live Locations, should be between 60 and 86400.
 * @property int      $heading                     __Required: Optional__. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property int      $proximity_alert_radius      __Required: Optional__. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * @property bool     $disable_notification        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property bool     $protect_content             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property int      $reply_to_message_id         __Required: Optional__. If the message is a reply, ID of the original message
 * @property bool     $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property Keyboard $reply_markup                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendLocationMethod extends TelegramMethod
{
    protected string $method = 'sendLocation';

    protected string $expect = 'Message';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'latitude' => 'double',
        'longitude' => 'double',
        'horizontal_accuracy' => 'double',
        'live_period' => 'integer',
        'heading' => 'integer',
        'proximity_alert_radius' => 'integer',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'reply_to_message_id' => 'integer',
        'allow_sending_without_reply' => 'boolean',
        'reply_markup' => 'Keyboard',
    ];

    public function mock($arguments)
    {
        return new Message([
            'message_id' => mt_rand(1, 100),
            'from' => [
                'id' => mt_rand(1, 100),
                'is_bot' => false,
                'first_name' => 'First Name',
            ],
            'chat' => [
                'id' => $arguments['chat_id'],
                'type' => 'private',
            ],
            'date' => time(),
            'location' => [
                'latitude' => $arguments['latitude'],
                'longitude' => $arguments['longitude'],
            ],
        ]);
    }
}
