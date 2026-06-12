<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to process a received chat join request query by showing a Mini App to the user before deciding the outcome. Returns True on success.
 *
 * @property-read string $chat_join_request_query_id Unique identifier of the join request query
 * @property-read string $web_app_url The URL of the Mini App to be opened
 *
 * @see https://core.telegram.org/bots/api#sendchatjoinrequestwebapp
 */
class SendChatJoinRequestWebAppMethod extends TelegramMethod
{
    protected string $method = 'sendChatJoinRequestWebApp';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $chat_join_request_query_id,
        public readonly string $web_app_url,
    ) {
    }
}
