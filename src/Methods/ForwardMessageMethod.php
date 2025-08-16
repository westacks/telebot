<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\SuggestedPostParameters;

/**
 * Use this method to forward messages of any kind. Service messages and messages with protected content can't be forwarded. On success, the sent Message is returned.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read ?int $direct_messages_topic_id Identifier of the direct messages topic to which the message will be forwarded; required if the message is forwarded to a direct messages chat
 * @property-read int|string $from_chat_id Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
 * @property-read ?int $video_start_timestamp New start timestamp for the forwarded video in the message
 * @property-read ?bool $disable_notification Sends the message silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the forwarded message from forwarding and saving
 * @property-read ?SuggestedPostParameters $suggested_post_parameters A JSON-serialized object containing the parameters of the suggested post to send; for direct messages chats only
 * @property-read int $message_id Message identifier in the chat specified in from_chat_id
 *
 * @see https://core.telegram.org/bots/api#forwardmessage
 */
class ForwardMessageMethod extends TelegramMethod
{
    protected string $method = 'forwardMessage';
    protected array $expect = ['Message'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly ?int $direct_messages_topic_id,
        public readonly int|string $from_chat_id,
        public readonly ?int $video_start_timestamp,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?SuggestedPostParameters $suggested_post_parameters,
        public readonly int $message_id,
    ) {
    }
}
