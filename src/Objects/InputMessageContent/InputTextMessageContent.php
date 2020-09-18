<?php

namespace WeStacks\TeleBot\Objects\InputMessageContent;

use WeStacks\TeleBot\Objects\InputMessageContent;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
 *
 * @property String                    $message_text                  Text of the message to be sent, 1-4096 characters
 * @property String                    $parse_mode                    _Optional_. Mode for parsing entities in the message text. See formatting options for more details.
 * @property Boolean                   $disable_web_page_preview      _Optional_. Disables link previews for links in the sent message
 *
 * @package WeStacks\TeleBot\Objects\InputMessageContent
 */
class InputTextMessageContent extends InputMessageContent
{
    protected function relations()
    {
        return [
            'message_text'                  => 'string',
            'parse_mode'                    => 'string',
            'disable_web_page_preview'      => 'boolean'
        ];
    }
}
