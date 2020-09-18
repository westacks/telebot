<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an MP3 audio file stored on the Telegram servers. By default, this audio file will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the audio.
 *
 * @property String                    $type                        Type of the result, must be audio
 * @property String                    $id                          Unique identifier for this result, 1-64 bytes
 * @property String                    $audio_file_id               A valid file identifier for the audio file
 * @property String                    $caption                     _Optional_. Caption, 0-1024 characters after entities parsing
 * @property String                    $parse_mode                  _Optional_. Mode for parsing entities in the audio caption. See formatting options for more details.
 * @property InlineKeyboardMarkup      $reply_markup                _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent       $input_message_content       _Optional_. Content of the message to be sent instead of the audio
 *
 * @package WeStacks\TeleBot\Objects\InlineQueryResult
 */
class InlineQueryResultCachedAudio extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'id'                    => 'string',
            'audio_file_id'         => 'string',
            'caption'               => 'string',
            'parse_mode'            => 'string',
            'reply_markup'          => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
