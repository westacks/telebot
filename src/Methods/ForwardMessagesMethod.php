<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\MessageId;

/**
 * Use this method to forward messages of any kind. Service messages can't be forwarded. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string $chat_id              __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int    $message_thread_id    __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string $from_chat_id         __Required: Yes__. Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
 * @property bool   $disable_notification __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property bool   $protect_content      __Required: Optional__. Protects the contents of the forwarded message from forwarding and saving
 * @property int[]  $message_ids          __Required: Yes__. A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to forward. The identifiers must be specified in a strictly increasing order.
 */
class ForwardMessagesMethod extends TelegramMethod
{
    protected string $method = 'forwardMessages';

    protected string $expect = 'MessageId[]';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'from_chat_id' => 'string',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'message_ids' => 'integer[]',
    ];

    public function mock($arguments)
    {
        return array_map(fn ($id) => new MessageId(['message_id' => $id]), $arguments['message_ids']);
    }
}
