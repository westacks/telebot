<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;

/**
 * Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
 * @property-read null|int|string $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_id Required if inline_message_id is not specified. Identifier of the message to edit
 * @property-read ?string $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property-read ?string $caption New caption of the message, 0-1024 characters after entities parsing
 * @property-read ?string $parse_mode Mode for parsing entities in the message caption. See formatting options for more details.
 * @property-read ?MessageEntity[] $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property-read ?bool $show_caption_above_media Pass True, if the caption must be shown above the message media. Supported only for animation, photo and video messages.
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for an inline keyboard.
 *
 * @see https://core.telegram.org/bots/api#editmessagecaption
 */
class EditMessageCaptionMethod extends TelegramMethod
{
    protected string $method = 'editMessageCaption';
    protected array $expect = ['Message', 'true'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly null|int|string $chat_id,
        public readonly ?int $message_id,
        public readonly ?string $inline_message_id,
        public readonly ?string $caption,
        public readonly ?string $parse_mode,
        public readonly ?array $caption_entities,
        public readonly ?bool $show_caption_above_media,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
