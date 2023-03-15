<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\Message;

/**
 * As of [v.4.0](https://telegram.org/blog/video-messages-and-telescope), Telegram clients support rounded square mp4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string    $chat_id                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int       $message_thread_id           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property InputFile $video_note                  __Required: Yes__. Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data. More info on Sending Files ». Sending video notes by a URL is currently unsupported
 * @property int       $duration                    __Required: Optional__. Duration of sent video in seconds
 * @property int       $length                      __Required: Optional__. Video width and height, i.e. diameter of the video message
 * @property InputFile $thumbnail                   __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://” if the thumbnail was uploaded using multipart/form-data under . More info on Sending Files »
 * @property bool      $disable_notification        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property bool      $protect_content             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property int       $reply_to_message_id         __Required: Optional__. If the message is a reply, ID of the original message
 * @property bool      $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property Keyboard  $reply_markup                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendVideoNoteMethod extends TelegramMethod
{
    protected string $method = 'sendVideoNote';

    protected string $expect = 'Message';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'video_note' => 'InputFile',
        'duration' => 'integer',
        'length' => 'integer',
        'thumbnail' => 'InputFile',
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
            ],
            'date' => time(),
            'video_note' => [
                'file_id' => '',
                'file_unique_id' => '',
                'duration' => mt_rand(1, 60),
                'length' => mt_rand(1, 100),
                'mime_type' => 'video/mp4',
                'file_size' => mt_rand(1, 100),
            ],
        ]);
    }
}
