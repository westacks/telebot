<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns True on success.
 *
 * @property-read ?string $description New bot description; 0-512 characters. Pass an empty string to remove the dedicated description for the given language.
 * @property-read ?string $language_code A two-letter ISO 639-1 language code. If empty, the description will be applied to all users for whose language there is no dedicated description.
 *
 * @see https://core.telegram.org/bots/api#setmydescription
 */
class SetMyDescriptionMethod extends TelegramMethod
{
    protected string $method = 'setMyDescription';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?string $description,
        public readonly ?string $language_code,
    ) {
    }
}
