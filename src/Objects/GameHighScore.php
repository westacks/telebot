<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents one row of the high scores table for a game.And that's about all we've got for now. If you've got any questions, please check out our [__Bot FAQ »__](https://core.telegram.org/bots/faq)
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
