<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send an animated emoji that will display a random value. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string          $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * @property string          $chat_id                __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int             $message_thread_id      __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string          $emoji                  __Required: Optional__. Emoji on which the dice throw animation is based. Currently, must be one of “![🎲](https://telegram.org/img/emoji/40/F09F8EB2.png)”, “![🎯](https://telegram.org/img/emoji/40/F09F8EAF.png)”, “![🏀](https://telegram.org/img/emoji/40/F09F8F80.png)”, “![⚽](https://telegram.org/img/emoji/40/E29ABD.png)”, “![🎳](https://telegram.org/img/emoji/40/F09F8EB3.png)”, or “![🎰](https://telegram.org/img/emoji/40/F09F8EB0.png)”. Dice can have values 1-6 for “![🎲](https://telegram.org/img/emoji/40/F09F8EB2.png)”, “![🎯](https://telegram.org/img/emoji/40/F09F8EAF.png)” and “![🎳](https://telegram.org/img/emoji/40/F09F8EB3.png)”, values 1-5 for “![🏀](https://telegram.org/img/emoji/40/F09F8F80.png)” and “![⚽](https://telegram.org/img/emoji/40/E29ABD.png)”, and values 1-64 for “![🎰](https://telegram.org/img/emoji/40/F09F8EB0.png)”. Defaults to “![🎲](https://telegram.org/img/emoji/40/F09F8EB2.png)”
 * @property bool            $disable_notification   __Required: Optional__. Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool            $protect_content        __Required: Optional__. Protects the contents of the sent message from forwarding
 * @property bool            $allow_paid_broadcast   __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring [broadcasting limits](https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once) for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property string          $message_effect_id      __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * @property ReplyParameters $reply_parameters       __Required: Optional__. Description of the message to reply to
 * @property Keyboard        $reply_markup           __Required: Optional__. Additional interface options. A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards), [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove a reply keyboard or to force a reply from the user
 */
class SendDiceMethod extends TelegramMethod
{
    protected string $method = 'sendDice';

    protected string $expect = 'Message';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'emoji' => 'string',
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
            'dice' => [
                'emoji' => '🎲',
                'value' => '1',
            ],
        ]);
    }
}
