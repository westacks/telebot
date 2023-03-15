<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a text message to be sent as the result of an inline query.
 *
 * @property string          $message_text             Text of the message to be sent, 1-4096 characters
 * @property string          $parse_mode               Optional. Mode for parsing entities in the message text. See formatting options for more details.
 * @property MessageEntity[] $entities                 Optional. List of special entities that appear in message text, which can be specified instead of parse_mode
 * @property bool            $disable_web_page_preview Optional. Disables link previews for links in the sent message
 */
class InputTextMessageContent extends InputMessageContent
{
    protected $attributes = [
        'message_text' => 'string',
        'parse_mode' => 'string',
        'entities' => 'MessageEntity[]',
        'disable_web_page_preview' => 'boolean',
    ];
}
