<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\MessageId;

/**
 * Use this method to copy messages of any kind. Service messages and invoice messages can't be copied. The method is analogous to the method [forwardMessage](https://core.telegram.org/bots/api#forwardmessage), but the copied message doesn't have a link to the original message. Returns the [MessageId](https://core.telegram.org/bots/api#messageid) of the sent message on success.
 *
 * @property string          $chat_id                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int             $message_thread_id           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string          $from_chat_id                __Required: Yes__. Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
 * @property int             $message_id                  __Required: Yes__. Message identifier in the chat specified in from_chat_id
 * @property string          $caption                     __Required: Optional__. New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is kept
 * @property string          $parse_mode                  __Required: Optional__. Mode for parsing entities in the new caption. See formatting options for more details.
 * @property MessageEntity[] $caption_entities            __Required: Optional__. A JSON-serialized list of special entities that appear in the new caption, which can be specified instead of parse_mode
 * @property bool            $disable_notification        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property bool            $protect_content             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property int             $reply_to_message_id         __Required: Optional__. If the message is a reply, ID of the original message
 * @property bool            $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property Keyboard        $reply_markup                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
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
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'reply_to_message_id' => 'integer',
        'allow_sending_without_reply' => 'boolean',
        'reply_markup' => 'Keyboard',
    ];

    public function mock($arguments)
    {
        return new MessageId([
            'message_id' => $arguments['message_id'],
        ]);
    }
}
