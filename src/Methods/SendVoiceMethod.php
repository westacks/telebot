<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as [Audio](https://core.telegram.org/bots/api#audio) or [Document](https://core.telegram.org/bots/api#document)). On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
 *
 * @property string          $chat_id                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int             $message_thread_id           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property InputFile       $voice                       __Required: Yes__. Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
 * @property string          $caption                     __Required: Optional__. Voice message caption, 0-1024 characters after entities parsing
 * @property string          $parse_mode                  __Required: Optional__. Mode for parsing entities in the voice message caption. See formatting options for more details.
 * @property MessageEntity[] $caption_entities            __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property int             $duration                    __Required: Optional__. Duration of the voice message in seconds
 * @property bool            $disable_notification        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property bool            $protect_content             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property int             $reply_to_message_id         __Required: Optional__. If the message is a reply, ID of the original message
 * @property bool            $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property Keyboard        $reply_markup                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendVoiceMethod extends TelegramMethod
{
    protected string $method = 'sendVoice';

    protected string $expect = 'Message';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'voice' => 'InputFile',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'duration' => 'integer',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'reply_to_message_id' => 'integer',
        'allow_sending_without_reply' => 'boolean',
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
            'voice' => [
                'file_id' => '',
                'duration' => rand(1, 100),
                'mime_type' => 'audio/ogg',
                'file_size' => rand(1, 100),
            ],
        ]);
    }
}
