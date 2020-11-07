<?php

namespace WeStacks\TeleBot\Objects\InputMessageContent;

use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
 *
 * @property string                 $message_text               Text of the message to be sent, 1-4096 characters
 * @property string                 $parse_mode                 _Optional_. Mode for parsing entities in the message text. See formatting options for more details.
 * @property Array<MessageEntity>   $entities                   _Optional_. List of special entities that appear in message text, which can be specified instead of parse_mode
 * @property bool                   $disable_web_page_preview   _Optional_. Disables link previews for links in the sent message
 */
class InputTextMessageContent extends InputMessageContent
{
    protected function relations()
    {
        return [
            'message_text' => 'string',
            'parse_mode' => 'string',
            'entities' => [MessageEntity::class],
            'disable_web_page_preview' => 'boolean',
        ];
    }
}
