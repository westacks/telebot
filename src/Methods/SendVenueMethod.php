<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Message;

/**
 * Use this method to send information about a venue. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string   $chat_id                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int      $message_thread_id           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property float    $latitude                    __Required: Yes__. Latitude of the venue
 * @property float    $longitude                   __Required: Yes__. Longitude of the venue
 * @property string   $title                       __Required: Yes__. Name of the venue
 * @property string   $address                     __Required: Yes__. Address of the venue
 * @property string   $foursquare_id               __Required: Optional__. Foursquare identifier of the venue
 * @property string   $foursquare_type             __Required: Optional__. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property string   $google_place_id             __Required: Optional__. Google Places identifier of the venue
 * @property string   $google_place_type           __Required: Optional__. Google Places type of the venue. (See supported types.)
 * @property bool     $disable_notification        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property bool     $protect_content             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property int      $reply_to_message_id         __Required: Optional__. If the message is a reply, ID of the original message
 * @property bool     $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property Keyboard $reply_markup                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendVenueMethod extends TelegramMethod
{
    protected string $method = 'sendVenue';

    protected string $expect = 'Message';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'latitude' => 'double',
        'longitude' => 'double',
        'title' => 'string',
        'address' => 'string',
        'foursquare_id' => 'string',
        'foursquare_type' => 'string',
        'google_place_id' => 'string',
        'google_place_type' => 'string',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'reply_to_message_id' => 'integer',
        'allow_sending_without_reply' => 'boolean',
        'reply_markup' => 'Keyboard',
    ];

    public function mock($arguments)
    {
        return new Message([
            'message_id' => rand(1, 100),
            'date' => time(),
            'chat' => [
                'id' => $arguments['chat_id'],
                'type' => 'private',
            ],
            'venue' => [
                'location' => [
                    'latitude' => $arguments['latitude'],
                    'longitude' => $arguments['longitude'],
                ],
                'title' => $arguments['title'],
                'address' => $arguments['address'],
                'foursquare_id' => $arguments['foursquare_id'],
                'foursquare_type' => $arguments['foursquare_type'],
                'google_place_id' => $arguments['google_place_id'],
                'google_place_type' => $arguments['google_place_type'],
            ],
        ]);
    }
}
