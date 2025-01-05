<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send a game. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string               $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * @property int                  $chat_id                __Required: Yes__. Unique identifier for the target chat
 * @property int                  $message_thread_id      __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string               $game_short_name        __Required: Yes__. Short name of the game, serves as the unique identifier for the game. Set up your games via [@BotFather](https://t.me/botfather).
 * @property bool                 $disable_notification   __Required: Optional__. Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool                 $protect_content        __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property bool                 $allow_paid_broadcast   __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring [broadcasting limits](https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once) for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property string               $message_effect_id      __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * @property ReplyParameters      $reply_parameters       __Required: Optional__. Description of the message to reply to
 * @property InlineKeyboardMarkup $reply_markup           __Required: Optional__. A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards). If empty, one 'Play game_title' button will be shown. If not empty, the first button must launch the game.
 */
class SendGameMethod extends TelegramMethod
{
    protected string $method = 'sendGame';

    protected string $expect = 'Message';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'integer',
        'message_thread_id' => 'integer',
        'game_short_name' => 'string',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'allow_paid_broadcast' => 'boolean',
        'message_effect_id' => 'string',
        'reply_parameters' => 'ReplyParameters',
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
