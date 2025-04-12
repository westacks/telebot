<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?string $description New chat description, 0-255 characters
 *
 * @see https://core.telegram.org/bots/api#setchatdescription
 */
class SetChatDescriptionMethod extends TelegramMethod
{
    protected string $method = 'setChatDescription';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly ?string $description,
    ) {
    }
}
