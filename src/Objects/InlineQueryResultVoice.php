<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a voice recording in an .OGG container encoded with OPUS. By default, this voice recording will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the the voice message.
 *
 * @property string                                                                                                  $type                  Type of the result, must be voice
 * @property string                                                                                                  $id                    Unique identifier for this result, 1-64 bytes
 * @property string                                                                                                  $voice_url             A valid URL for the voice recording
 * @property string                                                                                                  $title                 Recording title
 * @property string                                                                                                  $caption               Optional. Caption, 0-1024 characters after entities parsing
 * @property string                                                                                                  $parse_mode            Optional. Mode for parsing entities in the voice message caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[]                                                                                         $caption_entities      Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property int                                                                                                     $voice_duration        Optional. Recording duration in seconds
 * @property InlineKeyboardMarkup                                                                                    $reply_markup          Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content Optional. Content of the message to be sent instead of the voice recording
 */
class InlineQueryResultVoice extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'voice_url' => 'string',
        'title' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'voice_duration' => 'integer',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
    ];
}
