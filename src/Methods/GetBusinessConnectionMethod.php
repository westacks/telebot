<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get information about the connection of the bot with a business account. Returns a BusinessConnection object on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 *
 * @see https://core.telegram.org/bots/api#getbusinessconnection
 */
class GetBusinessConnectionMethod extends TelegramMethod
{
    protected string $method = 'getBusinessConnection';
    protected array $expect = ['BusinessConnection'];

    public function __construct(
        public readonly string $business_connection_id,
    ) {
    }
}
