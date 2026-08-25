<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the bot's menu button in a private chat. It should be one of
 * If a menu button other than MenuButtonDefault is set for a private chat, then it is applied in the chat. Otherwise the default menu button is applied. By default, the menu button opens the list of bot commands.
 *
 * @see https://core.telegram.org/bots/api#menubutton
 */
class MenuButton extends TelegramObject
{
}
