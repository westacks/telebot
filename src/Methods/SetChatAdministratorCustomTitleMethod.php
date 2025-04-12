<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property-read int $user_id Unique identifier of the target user
 * @property-read string $custom_title New custom title for the administrator; 0-16 characters, emoji are not allowed
 *
 * @see https://core.telegram.org/bots/api#setchatadministratorcustomtitle
 */
class SetChatAdministratorCustomTitleMethod extends TelegramMethod
{
    protected string $method = 'setChatAdministratorCustomTitle';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $user_id,
        public readonly string $custom_title,
    ) {
    }
}
