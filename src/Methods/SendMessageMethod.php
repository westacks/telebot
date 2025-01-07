<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\LinkPreviewOptions;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send text messages. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string             $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * @property string             $chat_id                __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int                $message_thread_id      __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * @property string             $text                   __Required: Yes__. Text of the message to be sent, 1-4096 characters after entities parsing
 * @property string             $parse_mode             __Required: Optional__. Mode for parsing entities in the message text. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[]    $entities               __Required: Optional__. A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
 * @property LinkPreviewOptions $link_preview_options   __Required: Optional__. Link preview generation options for the message
 * @property bool               $disable_notification   __Required: Optional__. Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool               $protect_content        __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property bool               $allow_paid_broadcast   __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring [broadcasting limits](https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once) for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property string             $message_effect_id      __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * @property ReplyParameters    $reply_parameters       __Required: Optional__. Description of the message to reply to
 * @property Keyboard           $reply_markup           __Required: Optional__. Additional interface options. A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards), [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove a reply keyboard or to force a reply from the user
 */
class SendMessageMethod extends TelegramMethod
{
    protected string $method = 'sendMessage';

    protected string $expect = 'Message';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'text' => 'string',
        'parse_mode' => 'string',
        'entities' => 'MessageEntity[]',
        'link_preview_options' => 'LinkPreviewOptions',
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
            'message_id' => '-1',
            'from' => [
                'id' => '-1',
                'first_name' => 'First',
                'last_name' => 'Last',
                'username' => 'username',
                'is_bot' => true,
            ],
            'chat' => [
                'id' => $arguments['chat_id'] ?? '-1',
                'first_name' => 'First',
                'last_name' => 'Last',
                'type' => 'private',
            ],
            'date' => time(),
            'text' => $arguments['text'] ?? 'Test message',
            'entities' => $arguments['entities'] ?? [],
        ]);
    }
}
