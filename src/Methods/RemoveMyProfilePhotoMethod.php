<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Removes the profile photo of the bot. Requires no parameters. Returns True on success.
 *
 *
 * @see https://core.telegram.org/bots/api#removemyprofilephoto
 */
class RemoveMyProfilePhotoMethod extends TelegramMethod
{
    protected string $method = 'removeMyProfilePhoto';
    protected array $expect = ['true'];

    public function __construct()
    {
    }
}
