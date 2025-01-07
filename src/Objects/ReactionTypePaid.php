<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The reaction is paid.
 *
 * @property string $type Type of the reaction, always “paid”
 */
class ReactionTypePaid extends ReactionType
{
    protected $attributes = [
        'type' => 'string',
    ];
}
