<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @property string         $poll_id    Unique poll identifier
 * @property User           $user       The user, who changed the answer to the poll
 * @property Array<Integer> $option_ids 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
 */
class PollAnswer extends TelegramObject
{
    protected function relations()
    {
        return [
            'poll_id' => 'string',
            'user' => User::class,
            'option_ids' => ['integer'],
        ];
    }
}
