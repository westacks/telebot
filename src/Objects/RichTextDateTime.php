<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Formatted date and time.
 * @property-read string $type Type of the rich text, always “date_time”
 * @property-read RichText $text The text
 * @property-read int $unix_time The Unix time associated with the entity
 * @property-read string $date_time_format The string that defines the formatting of the date and time. See date-time entity formatting for more details.
 *
 * @see https://core.telegram.org/bots/api#richtextdatetime
 */
class RichTextDateTime extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly int $unix_time,
        public readonly string $date_time_format,
    ) {
    }
}
