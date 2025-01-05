<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
 *
 * @property string   $id        Unique identifier for this query
 * @property User     $from      Sender
 * @property string   $query     Text of the query (up to 256 characters)
 * @property string   $offset    Offset of the results to be returned, can be controlled by the bot
 * @property string   $chat_type Optional. Type of the chat from which the inline query was sent. Can be either “sender” for a private chat with the inline query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always known for requests sent from official clients and most third-party clients, unless the request was sent from a secret chat
 * @property Location $location  Optional. Sender location, only for bots that request user location
 */
class InlineQuery extends TelegramObject
{
    protected $attributes = [
        'id' => 'string',
        'from' => 'User',
        'query' => 'string',
        'offset' => 'string',
        'chat_type' => 'string',
        'location' => 'Location',
    ];
}
