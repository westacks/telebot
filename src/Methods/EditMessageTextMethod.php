<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Use this method to edit text and [game](https://core.telegram.org/bots/api#games) messages. On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * @property string               $chat_id                  __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int                  $message_id               __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * @property string               $inline_message_id        __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property string               $text                     __Required: Yes__. New text of the message, 1-4096 characters after entities parsing
 * @property string               $parse_mode               __Required: Optional__. Mode for parsing entities in the message text. See formatting options for more details.
 * @property MessageEntity[]      $entities                 __Required: Optional__. A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
 * @property bool                 $disable_web_page_preview __Required: Optional__. Disables link previews for links in this message
 * @property InlineKeyboardMarkup $reply_markup             __Required: Optional__. A JSON-serialized object for an inline keyboard.
 */
class EditMessageTextMethod extends TelegramMethod
{
    protected string $method = 'editMessageText';

    protected string $expect = 'Message|boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_id' => 'integer',
        'inline_message_id' => 'string',
        'text' => 'string',
        'parse_mode' => 'string',
        'entities' => 'MessageEntity[]',
        'disable_web_page_preview' => 'boolean',
        'reply_markup' => 'InlineKeyboardMarkup',
    ];

    public function mock($arguments)
    {
        if (isset($arguments['inline_message_id'])) {
            return true;
        }

        return new Message([
            'chat' => [
                'id' => $arguments['chat_id'],
            ],
            'message_id' => $arguments['message_id'],
            'text' => $arguments['text'] ?? 'Test',
            'reply_markup' => $arguments['reply_markup'] ?? [],
            'entities' => $arguments['entities'] ?? [],
        ]);
    }
}
