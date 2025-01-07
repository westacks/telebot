<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Contains information about the start page settings of a Telegram Business account.
 *
 * @property string  $title   Optional. Title text of the business intro
 * @property string  $message Optional. Message text of the business intro
 * @property Sticker $sticker Optional. Sticker of the business intro
 */
class BusinessIntro extends ReactionType
{
    protected $attributes = [
        'title' => 'string',
        'message' => 'string',
        'sticker' => 'Sticker',
    ];
}
