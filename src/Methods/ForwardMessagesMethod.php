<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to forward multiple messages of any kind. If some of the specified messages can't be found or forwarded, they are skipped. Service messages and messages with protected content can't be forwarded. Album grouping is kept for forwarded messages. On success, an array of MessageId of the sent messages is returned.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read ?int $direct_messages_topic_id Identifier of the direct messages topic to which the messages will be forwarded; required if the messages are forwarded to a direct messages chat
 * @property-read int|string $from_chat_id Unique identifier for the chat where the original messages were sent (or channel username in the format @channelusername)
 * @property-read int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to forward. The identifiers must be specified in a strictly increasing order.
 * @property-read ?bool $disable_notification Sends the messages silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the forwarded messages from forwarding and saving
 *
 * @see https://core.telegram.org/bots/api#forwardmessages
 */
class ForwardMessagesMethod extends TelegramMethod
{
    protected string $method = 'forwardMessages';
    protected array $expect = ['MessageId[]'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly ?int $direct_messages_topic_id,
        public readonly int|string $from_chat_id,
        public readonly array $message_ids,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
    ) {
    }
}
