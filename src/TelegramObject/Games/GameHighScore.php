<?php

namespace WeStacks\TeleBot\TelegramObject\Games;

use WeStacks\TeleBot\TelegramObject;
use WeStacks\TeleBot\TelegramObject\User;

/**
 * This object represents one row of the high scores table for a game.
 * 
 * @property Integer                 $position                Position in high score table for the game
 * @property User                    $user                    User
 * @property Integer                 $score                   Score
 * 
 * @package WeStacks\TeleBot\TelegramObject\Games
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