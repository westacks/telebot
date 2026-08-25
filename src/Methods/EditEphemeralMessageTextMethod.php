<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\InputRichMessage;
use WeStacks\TeleBot\Objects\LinkPreviewOptions;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Use this method to edit an ephemeral text or rich message. Note that it is not guaranteed that the user will receive the message edit event, especially if they are offline. On success, True is returned.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username
 * @property-read int $receiver_user_id Identifier of the user who received the message
 * @property-read int $ephemeral_message_id Identifier of the ephemeral message to edit
 * @property-read ?string $text New text of the message, 1-4096 characters after entity parsing; required if rich_message isn't specified
 * @property-read ?string $parse_mode Mode for parsing entities in the message text. See formatting options for more details.
 * @property-read ?MessageEntity[] $entities A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
 * @property-read ?InputRichMessage $rich_message New rich content of the message; required if text isn't specified
 * @property-read ?LinkPreviewOptions $link_preview_options Link preview generation options for the message
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for an inline keyboard
 *
 * @see https://core.telegram.org/bots/api#editephemeralmessagetext
 */
class EditEphemeralMessageTextMethod extends TelegramMethod
{
    protected string $method = 'editEphemeralMessageText';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $receiver_user_id,
        public readonly int $ephemeral_message_id,
        public readonly ?string $text,
        public readonly ?string $parse_mode,
        public readonly ?array $entities,
        public readonly ?InputRichMessage $rich_message,
        public readonly ?LinkPreviewOptions $link_preview_options,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
