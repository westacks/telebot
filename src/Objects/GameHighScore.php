<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents one row of the high scores table for a game.
 *
 * @property int  $position Position in high score table for the game
 * @property User $user     User
 * @property int  $score    Score
 */
class GameHighScore extends TelegramObject
{
    protected $attributes = [
        'position' => 'integer',
        'user' => 'User',
        'score' => 'integer',
    ];
}
