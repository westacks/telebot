<?php

namespace WeStacks\TeleBot\Objects\Games;

use WeStacks\TeleBot\Objects\TelegramObject;
use WeStacks\TeleBot\Objects\User;

/**
 * This object represents one row of the high scores table for a game.
 * 
 * @property Integer                 $position                Position in high score table for the game
 * @property User                    $user                    User
 * @property Integer                 $score                   Score
 * 
 * @package WeStacks\TeleBot\Objects\Games
 */
class GameHighScore extends TelegramObject
{
    protected function relations()
    {
        return [
            'position'      => 'integer',
            'user'          => User::class,
            'score'         => 'integer'
        ];
    }
}