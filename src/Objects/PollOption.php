<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\TelegramObject;

/**
 * This object contains information about one answer option in a poll.
 * 
 * @property String            $text            Option text, 1-100 characters
 * @property Integer           $voter_count     Number of users that voted for this option
 * 
 * @package WeStacks\TeleBot\Objects
 */

class PollOption extends TelegramObject
{
    protected function relations()
    {
        return [
            'text'          => 'string',
            'voter_count'   => 'integer'
        ];
    }
}