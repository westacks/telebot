<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputMedia;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of [Messages](https://core.telegram.org/bots/api#message) that were sent is returned.
 *
 * @property string          $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * @property string          $chat_id                __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int             $message_thread_id      __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property InputMedia[]    $media                  __Required: Yes__. A JSON-serialized array describing messages to be sent, must include 2-10 items
 * @property bool            $disable_notification   __Required: Optional__. Sends messages [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool            $protect_content        __Required: Optional__. Protects the contents of the sent messages from forwarding and saving
 * @property bool            $allow_paid_broadcast   __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring [broadcasting limits](https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once) for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property string          $message_effect_id      __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * @property ReplyParameters $reply_parameters       __Required: Optional__. Description of the message to reply to
 */
class SendMediaGroupMethod extends TelegramMethod
{
    protected string $method = 'sendMediaGroup';

    protected string $expect = 'Message[]';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'media' => 'InputMedia[]',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'allow_paid_broadcast' => 'boolean',
        'message_effect_id' => 'string',
        'reply_parameters' => 'ReplyParameters',
    ];

    public function mock($arguments)
    {
        return [
            new Message([
                'message_id' => '123456789',
                'from' => [
                    'id' => '123456789',
                    'first_name' => 'First',
                    'last_name' => 'Last',
                    'username' => 'username',
                ],
                'chat' => [
                    'id' => '123456789',
                    'first_name' => 'First',
                    'last_name' => 'Last',
                    'type' => 'private',
                ],
                'date' => '1479168447',
                'photo' => [
                    'file_id' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                    'width' => '640',
                    'height' => '640',
                ],
            ]),
        ];
    }
}
