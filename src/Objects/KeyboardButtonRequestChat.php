<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object defines the criteria used to request a suitable chat. Information about the selected chat will be shared with the bot when the corresponding button is pressed. The bot will be granted requested rights in the chat if appropriate. [More about requesting chats »](https://core.telegram.org/bots/features#chat-and-user-selection).
 *
 * @property int                     $request_id                Signed 32-bit identifier of the request, which will be received back in the [ChatShared](https://core.telegram.org/bots/api#chatshared) object. Must be unique within the message
 * @property bool                    $chat_is_channel           Pass True to request a channel chat, pass False to request a group or a supergroup chat.
 * @property bool                    $chat_is_forum             Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no additional restrictions are applied.
 * @property bool                    $chat_has_username         Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a username. If not specified, no additional restrictions are applied.
 * @property bool                    $chat_is_created           Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
 * @property ChatAdministratorRights $user_administrator_rights Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied.
 * @property ChatAdministratorRights $bot_administrator_rights  Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied.
 * @property bool                    $bot_is_member             Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
 * @property bool                    $request_title             Optional. Pass True to request the chat's title
 * @property bool                    $request_username          Optional. Pass True to request the chat's username
 * @property bool                    $request_photo             Optional. Pass True to request the chat's photo
 */
class KeyboardButtonRequestChat extends TelegramObject
{
    protected $attributes = [
        'request_id' => 'integer',
        'chat_is_channel' => 'boolean',
        'chat_is_forum' => 'boolean',
        'chat_has_username' => 'boolean',
        'chat_is_created' => 'boolean',
        'user_administrator_rights' => 'ChatAdministratorRights',
        'bot_administrator_rights' => 'ChatAdministratorRights',
        'bot_is_member' => 'boolean',
        'request_title' => 'boolean',
        'request_username' => 'boolean',
        'request_photo' => 'boolean',
    ];
}
