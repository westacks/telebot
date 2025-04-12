<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with the link when users share the bot. Returns True on success.
 *
 * @property-read ?string $short_description New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated short description for the given language.
 * @property-read ?string $language_code A two-letter ISO 639-1 language code. If empty, the short description will be applied to all users for whose language there is no dedicated short description.
 *
 * @see https://core.telegram.org/bots/api#setmyshortdescription
 */
class SetMyShortDescriptionMethod extends TelegramMethod
{
    protected string $method = 'setMyShortDescription';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?string $short_description,
        public readonly ?string $language_code,
    ) {
    }
}
