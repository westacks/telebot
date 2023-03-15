<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Message;

/**
 * Use this method to send a game. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property int                  $chat_id                     __Required: Yes__. Unique identifier for the target chat
 * @property int                  $message_thread_id           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string               $game_short_name             __Required: Yes__. Short name of the game, serves as the unique identifier for the game. Set up your games via Botfather.
 * @property bool                 $disable_notification        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property bool                 $protect_content             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property int                  $reply_to_message_id         __Required: Optional__. If the message is a reply, ID of the original message
 * @property bool                 $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property InlineKeyboardMarkup $reply_markup                __Required: Optional__. A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be shown. If not empty, the first button must launch the game.
 */
class SendGameMethod extends TelegramMethod
{
    protected string $method = 'sendGame';

    protected string $expect = 'Message';

    protected array $parameters = [
        'chat_id' => 'integer',
        'message_thread_id' => 'integer',
        'game_short_name' => 'string',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'reply_to_message_id' => 'integer',
        'allow_sending_without_reply' => 'boolean',
        'reply_markup' => 'InlineKeyboardMarkup',
    ];

    public function mock($arguments)
    {
        return new Message([
            'message_id' => '123456789',
            'from' => [
                'id' => $arguments['chat_id'],
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
            'game' => [
                'title' => 'game_title',
                'description' => 'game_description',
                'photo' => [
                    'small' => [
                        'file_id' => 'photo_file_id',
                        'file_unique_id' => 'photo_file_unique_id',
                        'width' => 'photo_width',
                        'height' => 'photo_height',
                    ],
                    'big' => [
                        'file_id' => 'photo_file_id',
                        'file_unique_id' => 'photo_file_unique_id',
                        'width' => 'photo_width',
                        'height' => 'photo_height',
                    ],
                ],
                'text' => 'game_text',
            ],
        ]);
    }
}
