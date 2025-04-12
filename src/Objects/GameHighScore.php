<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents one row of the high scores table for a game.
 * @property-read int $position Position in high score table for the game
 * @property-read User $user User
 * @property-read int $score Score
 *
 * @see https://core.telegram.org/bots/api#gamehighscore
 */
class GameHighScore extends TelegramObject
{
    public function __construct(
        public readonly int $position,
        public readonly User $user,
        public readonly int $score,
    ) {
    }
}
