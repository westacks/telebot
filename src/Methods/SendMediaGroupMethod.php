<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputMedia;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of Message objects that were sent is returned.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read ?int $direct_messages_topic_id Identifier of the direct messages topic to which the messages will be sent; required if the messages are sent to a direct messages chat
 * @property-read InputMedia[] $media A JSON-serialized array describing messages to be sent, must include 2-10 items
 * @property-read ?bool $disable_notification Sends messages silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the sent messages from forwarding and saving
 * @property-read ?bool $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property-read ?string $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
 * @property-read ?ReplyParameters $reply_parameters Description of the message to reply to
 *
 * @see https://core.telegram.org/bots/api#sendmediagroup
 */
class SendMediaGroupMethod extends TelegramMethod
{
    protected string $method = 'sendMediaGroup';
    protected array $expect = ['Message[]'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly ?int $direct_messages_topic_id,
        public readonly array $media,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $allow_paid_broadcast,
        public readonly ?string $message_effect_id,
        public readonly ?ReplyParameters $reply_parameters,
    ) {
    }
}
