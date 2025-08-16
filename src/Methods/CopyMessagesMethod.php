<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to copy messages of any kind. If some of the specified messages can't be found or copied, they are skipped. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessages, but the copied messages don't have a link to the original message. Album grouping is kept for copied messages. On success, an array of MessageId of the sent messages is returned.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property-read ?int $direct_messages_topic_id Identifier of the direct messages topic to which the messages will be sent; required if the messages are sent to a direct messages chat
 * @property-read int|string $from_chat_id Unique identifier for the chat where the original messages were sent (or channel username in the format @channelusername)
 * @property-read int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to copy. The identifiers must be specified in a strictly increasing order.
 * @property-read ?bool $disable_notification Sends the messages silently. Users will receive a notification with no sound.
 * @property-read ?bool $protect_content Protects the contents of the sent messages from forwarding and saving
 * @property-read ?bool $remove_caption Pass True to copy the messages without their captions
 *
 * @see https://core.telegram.org/bots/api#copymessages
 */
class CopyMessagesMethod extends TelegramMethod
{
    protected string $method = 'copyMessages';
    protected array $expect = ['MessageId[]'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly ?int $direct_messages_topic_id,
        public readonly int|string $from_chat_id,
        public readonly array $message_ids,
        public readonly ?bool $disable_notification,
        public readonly ?bool $protect_content,
        public readonly ?bool $remove_caption,
    ) {
    }
}
