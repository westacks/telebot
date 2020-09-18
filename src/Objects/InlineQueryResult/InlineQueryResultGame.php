<?php

namespace WeStacks\TeleBot\Objects\InlineQueryResult;

use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;

/**
 * Represents a Game.
 *
 * @property String                        $type                      Type of the result, must be game
 * @property String                        $id                        Unique identifier for this result, 1-64 Bytes
 * @property String                        $game_short_name           Short name of the game
 * @property InlineKeyboardMarkup          $reply_markup              _Optional_. Inline keyboard attached to the message
 *
 * @package WeStacks\TeleBot\Objects\InlineQueryResult
 */
class InlineQueryResultGame extends InlineQueryResult
{
    protected function relations()
    {
        return [
            'type'                  => 'string',
            'id'                    => 'string',
            'game_short_name'       => 'string',
            'reply_markup'          => InlineKeyboardMarkup::class,
        ];
    }
}
