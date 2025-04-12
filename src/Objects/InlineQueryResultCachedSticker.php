<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a sticker stored on the Telegram servers. By default, this sticker will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the sticker.
 * @property-read string $type Type of the result, must be sticker
 * @property-read string $id Unique identifier for this result, 1-64 bytes
 * @property-read string $sticker_file_id A valid file identifier of the sticker
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the sticker
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedsticker
 */
class InlineQueryResultCachedSticker extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $sticker_file_id,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
    ) {
    }
}
