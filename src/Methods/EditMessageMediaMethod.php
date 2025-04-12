<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\InputMedia;

/**
 * Use this method to edit animation, audio, document, photo, or video messages, or to add media to text messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
 * @property-read null|int|string $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_id Required if inline_message_id is not specified. Identifier of the message to edit
 * @property-read ?string $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property-read InputMedia $media A JSON-serialized object for a new media content of the message
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for a new inline keyboard.
 *
 * @see https://core.telegram.org/bots/api#editmessagemedia
 */
class EditMessageMediaMethod extends TelegramMethod
{
    protected string $method = 'editMessageMedia';
    protected array $expect = ['Message', 'true'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly null|int|string $chat_id,
        public readonly ?int $message_id,
        public readonly ?string $inline_message_id,
        public readonly InputMedia $media,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
