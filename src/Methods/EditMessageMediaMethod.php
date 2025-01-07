<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\InputMedia;
use WeStacks\TeleBot\Objects\Message;

/**
 * Use this method to edit animation, audio, document, photo, or video messages, or to add media to text messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within __48 hours__ from the time they were sent.
 *
 * @property string               $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * @property string               $chat_id                __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int                  $message_id             __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * @property string               $inline_message_id      __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property InputMedia           $media                  __Required: Yes__. A JSON-serialized object for a new media content of the message
 * @property InlineKeyboardMarkup $reply_markup           __Required: Optional__. A JSON-serialized object for a new [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards).
 */
class EditMessageMediaMethod extends TelegramMethod
{
    protected string $method = 'editMessageMedia';

    protected string $expect = 'Message|boolean';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_id' => 'integer',
        'inline_message_id' => 'string',
        'media' => 'InputMedia',
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
            'text' => 'Test',
            'reply_markup' => $arguments['reply_markup'] ?? [],
            // TODO: mock media
        ]);
    }
}
