<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents the opening hours of the business.
 *
 * @property string  $title     Optional. Title text of the business intro
 * @property string  $message   Optional. Message text of the business intro
 * @property Sticker $sticker   Optional. Sticker of the business intro
 */
class BusinessIntro extends ReactionType
{
    protected $attributes = [
        'title' => 'string',
        'message' => 'string',
        'sticker' => 'Sticker',
    ];
}
