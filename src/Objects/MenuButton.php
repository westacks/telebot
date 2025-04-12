<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the bot's menu button in a private chat. It should be one of
 * If a menu button other than MenuButtonDefault is set for a private chat, then it is applied in the chat. Otherwise the default menu button is applied. By default, the menu button opens the list of bot commands.
 * - [MenuButtonCommands](https://core.telegram.org/bots/api#menubuttoncommands)
 * - [MenuButtonWebApp](https://core.telegram.org/bots/api#menubuttonwebapp)
 * - [MenuButtonDefault](https://core.telegram.org/bots/api#menubuttondefault)
 *
 * @see https://core.telegram.org/bots/api#menubutton
 */
abstract class MenuButton extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'commands' => MenuButtonCommands::class,
            'web_app' => MenuButtonWebApp::class,
            'default' => MenuButtonDefault::class,
            default => throw new \InvalidArgumentException("Unknown MenuButton: ".$parameters['type']),
        };
    }
}
