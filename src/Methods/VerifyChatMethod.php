<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Verifies a chat on behalf of the organization which is represented by the bot. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?string $custom_description Custom description for the verification; 0-70 characters. Must be empty if the organization isn't allowed to provide a custom verification description.
 *
 * @see https://core.telegram.org/bots/api#verifychat
 */
class VerifyChatMethod extends TelegramMethod
{
    protected string $method = 'verifyChat';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?string $custom_description,
    ) {
    }
}
