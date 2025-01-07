<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\MessageId;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to copy messages of any kind. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz [poll](https://core.telegram.org/bots/api#poll) can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method [forwardMessage](https://core.telegram.org/bots/api#forwardmessage), but the copied message doesn't have a link to the original message. Returns the [MessageId](https://core.telegram.org/bots/api#messageid) of the sent message on success.
 *
 * @property string          $chat_id                  __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int             $message_thread_id        __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string          $from_chat_id             __Required: Yes__. Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
 * @property int             $message_id               __Required: Yes__. Message identifier in the chat specified in from_chat_id
 * @property string          $caption                  __Required: Optional__. New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is kept
 * @property string          $parse_mode               __Required: Optional__. Mode for parsing entities in the new caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[] $caption_entities         __Required: Optional__. A JSON-serialized list of special entities that appear in the new caption, which can be specified instead of parse_mode
 * @property bool            $show_caption_above_media __Required: Optional__. Pass True, if the caption must be shown above the message media. Ignored if a new caption isn't specified.
 * @property bool            $disable_notification     __Required: Optional__. Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool            $protect_content          __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property bool            $allow_paid_broadcast     __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring [broadcasting limits](https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once) for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property ReplyParameters $reply_parameters         __Required: Optional__. Description of the message to reply to
 * @property Keyboard        $reply_markup             __Required: Optional__. Additional interface options. A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards), [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove a reply keyboard or to force a reply from the user
 */
class CopyMessageMethod extends TelegramMethod
{
    protected string $method = 'copyMessage';

    protected string $expect = 'MessageId';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'from_chat_id' => 'string',
        'message_id' => 'integer',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'show_caption_above_media' => 'boolean',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'allow_paid_broadcast' => 'boolean',
        'reply_parameters' => 'ReplyParameters',
        'reply_markup' => 'Keyboard',
    ];

    public function mock($arguments)
    {
        return new MessageId([
            'message_id' => $arguments['message_id'],
        ]);
    }
}
