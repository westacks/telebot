<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a voice recording in an .OGG container encoded with OPUS. By default, this voice recording will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the the voice message.
 * 
 * @property String                        $type                      Type of the result, must be voice
 * @property String                        $id                        Unique identifier for this result, 1-64 bytes
 * @property String                        $voice_url                 A valid URL for the voice recording
 * @property String                        $title                     Recording title
 * @property String                        $caption                   _Optional_. Caption, 0-1024 characters after entities parsing
 * @property String                        $parse_mode                _Optional_. Mode for parsing entities in the voice message caption. See formatting options for more details.
 * @property Integer                       $voice_duration            _Optional_. Recording duration in seconds
 * @property InlineKeyboardMarkup          $reply_markup              _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent           $input_message_content     _Optional_. Content of the message to be sent instead of the voice recording
 * 
 * @package WeStacks\TeleBot\Objects\InlineQueryResult
 */
class InlineQueryResultVoice extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'id'                    => 'string',
            'voice_url'             => 'string',
            'title'                 => 'string',
            'caption'               => 'string',
            'parse_mode'            => 'string',
            'voice_duration'        => 'integer',
            'reply_markup'          => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class
        ];
    }
}