<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send information about a venue. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string          $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * @property string          $chat_id                __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int             $message_thread_id      __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property float           $latitude               __Required: Yes__. Latitude of the venue
 * @property float           $longitude              __Required: Yes__. Longitude of the venue
 * @property string          $title                  __Required: Yes__. Name of the venue
 * @property string          $address                __Required: Yes__. Address of the venue
 * @property string          $foursquare_id          __Required: Optional__. Foursquare identifier of the venue
 * @property string          $foursquare_type        __Required: Optional__. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property string          $google_place_id        __Required: Optional__. Google Places identifier of the venue
 * @property string          $google_place_type      __Required: Optional__. Google Places type of the venue. (See [supported types](https://developers.google.com/places/web-service/supported_types).)
 * @property bool            $disable_notification   __Required: Optional__. Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool            $protect_content        __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property bool            $allow_paid_broadcast   __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring [broadcasting limits](https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once) for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property string          $message_effect_id      __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * @property ReplyParameters $reply_parameters       __Required: Optional__. Description of the message to reply to
 * @property Keyboard        $reply_markup           __Required: Optional__. Additional interface options. A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards), [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove a reply keyboard or to force a reply from the user
 */
class SendVenueMethod extends TelegramMethod
{
    protected string $method = 'sendVenue';

    protected string $expect = 'Message';

    protected array $parameters = [
        'business_connection_id' => 'string',
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
        'allow_paid_broadcast' => 'boolean',
        'message_effect_id' => 'string',
        'reply_parameters' => 'ReplyParameters',
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
