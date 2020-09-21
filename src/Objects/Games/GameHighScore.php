<?php

namespace WeStacks\TeleBot\Objects\Games;

use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\User;

/**
 * This object represents one row of the high scores table for a game.
 *
 * @property int  $position Position in high score table for the game
 * @property User $user     User
 * @property int  $score    Score
 */
class GameHighScore extends TelegramObject
{
    protected function relations()
    {
        return [
            'position' => 'integer',
            'user' => User::class,
            'score' => 'integer',
        ];
    }
}
