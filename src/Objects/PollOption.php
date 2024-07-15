<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains information about one answer option in a poll.
 *
 * @property string          $text          Option text, 1-100 characters
 * @property MessageEntity[] $text_entities Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in poll option texts
 * @property int             $voter_count   Number of users that voted for this option
 */
class PollOption extends TelegramObject
{
    protected $attributes = [
        'text' => 'string',
        'text_entities' => 'MessageEntity[]',
        'voter_count' => 'integer',
    ];
}
