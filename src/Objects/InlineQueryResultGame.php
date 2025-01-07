<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a [Game](https://core.telegram.org/bots/api#games).
 *
 * @property string               $type            Type of the result, must be game
 * @property string               $id              Unique identifier for this result, 1-64 bytes
 * @property string               $game_short_name Short name of the game
 * @property InlineKeyboardMarkup $reply_markup    Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 */
class InlineQueryResultGame extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'game_short_name' => 'string',
        'reply_markup' => 'InlineKeyboardMarkup',
    ];
}
