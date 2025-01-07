<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send photos. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string          $business_connection_id   __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * @property string          $chat_id                  __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int             $message_thread_id        __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property InputFile       $photo                    __Required: Yes__. Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20. [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
 * @property string          $caption                  __Required: Optional__. Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing
 * @property string          $parse_mode               __Required: Optional__. Mode for parsing entities in the photo caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[] $caption_entities         __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool            $show_caption_above_media __Required: Optional__. Pass True, if the caption must be shown above the message media
 * @property bool            $has_spoiler              __Required: Optional__. Pass True if the photo needs to be covered with a spoiler animation
 * @property bool            $disable_notification     __Required: Optional__. Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool            $protect_content          __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property bool            $allow_paid_broadcast     __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring [broadcasting limits](https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once) for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property string          $message_effect_id        __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * @property ReplyParameters $reply_parameters         __Required: Optional__. Description of the message to reply to
 * @property Keyboard        $reply_markup             __Required: Optional__. Additional interface options. A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards), [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove a reply keyboard or to force a reply from the user
 */
class SendPhotoMethod extends TelegramMethod
{
    protected string $method = 'sendPhoto';

    protected string $expect = 'Message';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'photo' => 'InputFile',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'show_caption_above_media' => 'boolean',
        'has_spoiler' => 'boolean',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'allow_paid_broadcast' => 'boolean',
        'message_effect_id' => 'string',
        'reply_parameters' => 'ReplyParameters',
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
