<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Removes verification from a chat that is currently verified on behalf of the organization represented by the bot. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 *
 * @see https://core.telegram.org/bots/api#removechatverification
 */
class RemoveChatVerificationMethod extends TelegramMethod
{
    protected string $method = 'removeChatVerification';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
    ) {
    }
}
