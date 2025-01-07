<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\MessageId;

/**
 * Use this method to copy messages of any kind. If some of the specified messages can't be found or copied, they are skipped. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz [poll](https://core.telegram.org/bots/api#poll) can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method [forwardMessages](https://core.telegram.org/bots/api#forwardmessages), but the copied messages don't have a link to the original message. Album grouping is kept for copied messages. On success, an array of [MessageId](https://core.telegram.org/bots/api#messageid) of the sent messages is returned.
 *
 * @property string $chat_id              __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int    $message_thread_id    __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string $from_chat_id         __Required: Yes__. Unique identifier for the chat where the original messages were sent (or channel username in the format @channelusername)
 * @property int[]  $message_ids          __Required: Yes__. A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to copy. The identifiers must be specified in a strictly increasing order.
 * @property bool   $disable_notification __Required: Optional__. Sends the messages [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool   $protect_content      __Required: Optional__. Protects the contents of the sent messages from forwarding and saving
 * @property bool   $remove_caption       __Required: Optional__. Pass True to copy the messages without their captions
 */
class CopyMessagesMethod extends TelegramMethod
{
    protected string $method = 'copyMessages';

    protected string $expect = 'MessageId[]';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'from_chat_id' => 'string',
        'message_ids' => 'integer[]',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'remove_caption' => 'boolean',
    ];

    public function mock($arguments)
    {
        return array_map(fn ($id) => new MessageId(['message_id' => $id]), $arguments['message_ids']);
    }
}
