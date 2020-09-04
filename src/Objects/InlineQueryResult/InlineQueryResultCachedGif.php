<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an animated GIF file stored on the Telegram servers. By default, this animated GIF file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with specified content instead of the animation.
 * 
 * @property String                        $type                      Type of the result, must be gif
 * @property String                        $id                        Unique identifier for this result, 1-64 bytes
 * @property String                        $gif_file_id               A valid file identifier for the GIF file
 * @property String                        $title                     _Optional_. Title for the result
 * @property String                        $caption                   _Optional_. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
 * @property String                        $parse_mode                _Optional_. Mode for parsing entities in the caption. See formatting options for more details.
 * @property InlineKeyboardMarkup          $reply_markup              _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent           $input_message_content     _Optional_. Content of the message to be sent instead of the GIF animation
 * 
 * @package WeStacks\TeleBot\Objects\InlineQueryResult
 */
class InlineQueryResultCachedGif extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'id'                    => 'string',
            'gif_file_id'           => 'string',
            'title'                 => 'string',
            'caption'               => 'string',
            'parse_mode'            => 'string',
            'reply_markup'          => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}