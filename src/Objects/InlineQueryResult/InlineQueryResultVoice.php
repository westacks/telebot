<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Represents a link to a voice recording in an .OGG container encoded with OPUS. By default, this voice recording will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the the voice message.
 *
 * @property string               $type                  Type of the result, must be voice
 * @property string               $id                    Unique identifier for this result, 1-64 bytes
 * @property string               $voice_url             A valid URL for the voice recording
 * @property string               $title                 Recording title
 * @property string               $caption               _Optional_. Caption, 0-1024 characters after entities parsing
 * @property string               $parse_mode            _Optional_. Mode for parsing entities in the voice message caption. See formatting options for more details.
 * @property Array<MessageEntity> $caption_entities      _Optional_. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property int                  $voice_duration        _Optional_. Recording duration in seconds
 * @property InlineKeyboardMarkup $reply_markup          _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent  $input_message_content _Optional_. Content of the message to be sent instead of the voice recording
 */
class InlineQueryResultVoice extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type' => 'string',
            'id' => 'string',
            'voice_url' => 'string',
            'title' => 'string',
            'caption' => 'string',
            'parse_mode' => 'string',
            'caption_entities' => [MessageEntity::class],
            'voice_duration' => 'integer',
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
