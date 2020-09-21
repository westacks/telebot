<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
 *
 * @property string                &id                Unique identifier for this query
 * @property User                  &from              Sender
 * @property Location              &location          _Optional_. Sender location, only for bots that request user location
 * @property string                &query             Text of the query (up to 256 characters)
 * @property string                &offset            Offset of the results to be returned, can be controlled by the bot
 */
class InlineQuery extends TelegramObject
{
    protected function relations()
    {
        return [
            'id' => 'string',
            'from' => User::class,
            'location' => Location::class,
            'query' => 'string',
            'offset' => 'string',
        ];
    }
}
