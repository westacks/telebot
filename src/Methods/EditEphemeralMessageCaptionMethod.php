<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Use this method to edit the caption of an ephemeral message. Note that it is not guaranteed that the user will receive the message edit event, especially if they are offline. On success, True is returned.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username
 * @property-read int $receiver_user_id Identifier of the user who received the message
 * @property-read int $ephemeral_message_id Identifier of the ephemeral message to edit
 * @property-read ?string $caption New caption of the message, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Mode for parsing entities in the message caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Pass True if the caption must be shown above the message media. Supported only for animation, photo and video messages.
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for an inline keyboard
 *
 * @see https://core.telegram.org/bots/api#editephemeralmessagecaption
 */
class EditEphemeralMessageCaptionMethod extends TelegramMethod
{
    protected string $method = 'editEphemeralMessageCaption';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $receiver_user_id,
        public readonly int $ephemeral_message_id,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
