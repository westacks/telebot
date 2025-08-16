<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\ForceReply;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardRemove;
use WeStacks\TeleBot\Objects\ReplyParameters;
use WeStacks\TeleBot\Objects\SuggestedPostParameters;

/**
 * Use this method to send information about a venue. On success, the sent Message is returned.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read ?int $direct_messages_topic_id Identifier of the direct messages topic to which the message will be sent; required if the message is sent to a direct messages chat
 * @property-read float $latitude Latitude of the venue
 * @property-read float $longitude Longitude of the venue
 * @property-read string $title Name of the venue
 * @property-read string $address Address of the venue
 * @property-read ?string $foursquare_id Foursquare identifier of the venue
 * @property-read ?string $foursquare_type Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property-read ?string $google_place_id Google Places identifier of the venue
 * @property-read ?string $google_place_type Google Places type of the venue. (See supported types.)
 * @property-read ?bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the sent message from forwarding and saving
 * @property-read ?bool $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property-read ?string $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
 * @property-read ?SuggestedPostParameters $suggested_post_parameters A JSON-serialized object containing the parameters of the suggested post to send; for direct messages chats only. If the message is sent as a reply to another suggested post, then that suggested post is automatically declined.
 * @property-read ?ReplyParameters $reply_parameters Description of the message to reply to
 * @property-read null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 * @see https://core.telegram.org/bots/api#sendvenue
 */
class SendVenueMethod extends TelegramMethod
{
    protected string $method = 'sendVenue';
    protected array $expect = ['Message'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly ?int $direct_messages_topic_id,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly string $title,
        public readonly string $address,
        public readonly ?string $foursquare_id,
        public readonly ?string $foursquare_type,
        public readonly ?string $google_place_id,
        public readonly ?string $google_place_type,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $allow_paid_broadcast,
        public readonly ?string $message_effect_id,
        public readonly ?SuggestedPostParameters $suggested_post_parameters,
        public readonly ?ReplyParameters $reply_parameters,
        public readonly null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup,
    ) {
    }
}
