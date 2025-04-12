<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a Game.
 * @property-read string $type Type of the result, must be game
 * @property-read string $id Unique identifier for this result, 1-64 bytes
 * @property-read string $game_short_name Short name of the game
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultgame
 */
class InlineQueryResultGame extends InlineQueryResult
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $game_short_name,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
