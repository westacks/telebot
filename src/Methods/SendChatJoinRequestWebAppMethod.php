<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to process a received chat join request query by showing a Mini App to the user before deciding the outcome. Call answerChatJoinRequestQuery to resolve the join request query based on the user interaction with the Mini App. Returns True on success.
 *
 * @property-read string $chat_join_request_query_id Unique identifier of the join request query
 * @property-read string $web_app_url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
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
