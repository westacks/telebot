<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\InputMessageContent;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the location.
 * 
 * @property String                       $type                      Type of the result, must be location
 * @property String                       $id                        Unique identifier for this result, 1-64 Bytes
 * @property Float                        $latitude                  Location latitude in degrees
 * @property Float                        $longitude                 Location longitude in degrees
 * @property String                       $title                     Location title
 * @property Integer                      $live_period               _Optional_. Period in seconds for which the location can be updated, should be between 60 and 86400.
 * @property InlineKeyboardMarkup         $reply_markup              _Optional_. Inline keyboard attached to the message
 * @property InputMessageContent          $input_message_content     _Optional_. Content of the message to be sent instead of the location
 * @property String                       $thumb_url                 _Optional_. Url of the thumbnail for the result
 * @property Integer                      $thumb_width               _Optional_. Thumbnail width
 * @property Integer                      $thumb_height              _Optional_. Thumbnail height
 * 
 * @package WeStacks\TeleBot\Objects\InlineQueryResult
 */
class InlineQueryResultLocation extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'id'                    => 'string',
            'latitude'              => 'float',
            'longitude'             => 'float',
            'title'                 => 'string',
            'live_period'           => 'integer',
            'reply_markup'          => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
            'thumb_url'             => 'string',
            'thumb_width'           => 'integer',
            'thumb_height'          => 'integer',
        ];
    }
}