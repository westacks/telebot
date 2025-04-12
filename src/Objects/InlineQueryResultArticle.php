<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to an article or web page.
 * @property-read string $type Type of the result, must be article
 * @property-read string $id Unique identifier for this result, 1-64 Bytes
 * @property-read string $title Title of the result
 * @property-read InputMessageContent $input_message_content Content of the message to be sent
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?string $url Optional. URL of the result
 * @property-read ?string $description Optional. Short description of the result
 * @property-read ?string $thumbnail_url Optional. Url of the thumbnail for the result
 * @property-read ?int $thumbnail_width Optional. Thumbnail width
 * @property-read ?int $thumbnail_height Optional. Thumbnail height
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultarticle
 */
class InlineQueryResultArticle extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $title,
        public readonly InputMessageContent $input_message_content,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?string $url,
        public readonly ?string $description,
        public readonly ?string $thumbnail_url,
        public readonly ?int $thumbnail_width,
        public readonly ?int $thumbnail_height,
    ) {
    }
}
