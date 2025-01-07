<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to an MP3 audio file. By default, this audio file will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the audio.
 *
 * @property string                                                                                                  $type                  Type of the result, must be audio
 * @property string                                                                                                  $id                    Unique identifier for this result, 1-64 bytes
 * @property string                                                                                                  $audio_url             A valid URL for the audio file
 * @property string                                                                                                  $title                 Title
 * @property string                                                                                                  $caption               Optional. Caption, 0-1024 characters after entities parsing
 * @property string                                                                                                  $parse_mode            Optional. Mode for parsing entities in the audio caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[]                                                                                         $caption_entities      Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property string                                                                                                  $performer             Optional. Performer
 * @property int                                                                                                     $audio_duration        Optional. Audio duration in seconds
 * @property InlineKeyboardMarkup                                                                                    $reply_markup          Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content Optional. Content of the message to be sent instead of the audio
 */
class InlineQueryResultAudio extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'audio_url' => 'string',
        'title' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'performer' => 'string',
        'audio_duration' => 'integer',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
    ];
}
