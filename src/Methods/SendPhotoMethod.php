<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Use this method to send photos. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string          $chat_id                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int             $message_thread_id           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property InputFile       $photo                       __Required: Yes__. Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20. More info on Sending Files »
 * @property string          $caption                     __Required: Optional__. Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing
 * @property string          $parse_mode                  __Required: Optional__. Mode for parsing entities in the photo caption. See formatting options for more details.
 * @property MessageEntity[] $caption_entities            __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool            $has_spoiler                 __Required: Optional__. Pass True if the photo needs to be covered with a spoiler animation
 * @property bool            $disable_notification        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property bool            $protect_content             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property int             $reply_to_message_id         __Required: Optional__. If the message is a reply, ID of the original message
 * @property bool            $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property Keyboard        $reply_markup                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendPhotoMethod extends TelegramMethod
{
    protected string $method = 'sendPhoto';

    protected string $expect = 'Message';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'photo' => 'InputFile',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'has_spoiler' => 'boolean',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'reply_to_message_id' => 'integer',
        'allow_sending_without_reply' => 'boolean',
        'reply_markup' => 'Keyboard',
    ];

    public function mock($arguments)
    {
        return new Message([
            'message_id' => mt_rand(1, 100),
            'from' => [
                'id' => mt_rand(1, 100),
                'is_bot' => false,
                'first_name' => '',
                'last_name' => '',
                'username' => '',
                'language_code' => '',
            ],
            'chat' => [
                'id' => $arguments['chat_id'],
                'type' => 'private',
                'title' => '',
                'username' => '',
                'first_name' => '',
                'last_name' => '',
                'all_members_are_administrators' => false,
            ],
            'date' => time(),
            'photo' => [
                'file_id' => '',
                'width' => mt_rand(1, 100),
                'height' => mt_rand(1, 100),
                'file_size' => mt_rand(1, 100),
            ],
        ]);
    }
}
