<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\BusinessConnection;

/**
 * Use this method to get information about the connection of the bot with a business account. Returns a [BusinessConnection](https://core.telegram.org/bots/api#businessconnection) object on success.
 *
 * @property string $business_connection_id __Required: Yes__. Unique identifier of the business connection
 */
class GetBusinessConnectionMethod extends TelegramMethod
{
    protected string $method = 'getBusinessConnection';

    protected string $expect = 'BusinessConnection';

    protected array $parameters = [
        'business_connection_id' => 'string',
    ];

    public function mock($arguments)
    {
        return BusinessConnection::create([
            'id' => '123456789',
            'user' => [
                'id' => $arguments['user_id'],
                'first_name' => 'First',
                'last_name' => 'Last',
                'username' => 'username',
            ],
            'user_chat_id' => 123456789,
            'date' => time(),
            'can_reply' => true,
            'is_enabled' => true,
        ]);
    }
}
