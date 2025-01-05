<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object describes the bot's menu button in a private chat. It should be one of
 *
 * - [MenuButtonCommands](https://core.telegram.org/bots/api#menubuttoncommands)
 * - [MenuButtonWebApp](https://core.telegram.org/bots/api#menubuttonwebapp)
 * - [MenuButtonDefault](https://core.telegram.org/bots/api#menubuttondefault)
 */
abstract class MenuButton extends TelegramObject
{
    private static $types = [
        'commands' => MenuButtonCommands::class,
        'web_app' => MenuButtonWebApp::class,
        'default' => MenuButtonDefault::class,
    ];

    public static function create($object)
    {
        $object = (array)$object;

        foreach (static::$types as $type => $class) {
            if (!isset($object[$type])) {
                continue;
            }

            return new $class($object);
        }

        throw new TeleBotException('Cannot cast value of type ' . gettype($object) . ' to type ' . static::class);
    }
}
