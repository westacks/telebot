<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object defines the criteria used to request a suitable chat. Information about the selected chat will be shared with the bot when the corresponding button is pressed. The bot will be granted requested rights in the chat if appropriate. More about requesting chats ».
 * @property-read int $request_id Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must be unique within the message
 * @property-read bool $chat_is_channel Pass True to request a channel chat, pass False to request a group or a supergroup chat.
 * @property-read ?bool $chat_is_forum Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no additional restrictions are applied.
 * @property-read ?bool $chat_has_username Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a username. If not specified, no additional restrictions are applied.
 * @property-read ?bool $chat_is_created Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
 * @property-read ?ChatAdministratorRights $user_administrator_rights Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied.
 * @property-read ?ChatAdministratorRights $bot_administrator_rights Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied.
 * @property-read ?bool $bot_is_member Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
 * @property-read ?bool $request_title Optional. Pass True to request the chat's title
 * @property-read ?bool $request_username Optional. Pass True to request the chat's username
 * @property-read ?bool $request_photo Optional. Pass True to request the chat's photo
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 */
class KeyboardButtonRequestChat extends TelegramObject
{
    public function __construct(
        public readonly int $request_id,
        public readonly bool $chat_is_channel,
        public readonly ?bool $chat_is_forum,
        public readonly ?bool $chat_has_username,
        public readonly ?bool $chat_is_created,
        public readonly ?ChatAdministratorRights $user_administrator_rights,
        public readonly ?ChatAdministratorRights $bot_administrator_rights,
        public readonly ?bool $bot_is_member,
        public readonly ?bool $request_title,
        public readonly ?bool $request_username,
        public readonly ?bool $request_photo,
    ) {
    }
}
