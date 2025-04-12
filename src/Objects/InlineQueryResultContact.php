<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the contact.
 * @property-read string $type Type of the result, must be contact
 * @property-read string $id Unique identifier for this result, 1-64 Bytes
 * @property-read string $phone_number Contact's phone number
 * @property-read string $first_name Contact's first name
 * @property-read ?string $last_name Optional. Contact's last name
 * @property-read ?string $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property-read ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the contact
 * @property-read ?string $thumbnail_url Optional. Url of the thumbnail for the result
 * @property-read ?int $thumbnail_width Optional. Thumbnail width
 * @property-read ?int $thumbnail_height Optional. Thumbnail height
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcontact
 */
class InlineQueryResultContact extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $phone_number,
        public readonly string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $vcard,
        public readonly ?InlineKeyboardMarkup $reply_markup,
        public readonly ?InputMessageContent $input_message_content,
        public readonly ?string $thumbnail_url,
        public readonly ?int $thumbnail_width,
        public readonly ?int $thumbnail_height,
    ) {
    }
}
