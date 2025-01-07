<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatPermissions;

/**
 * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
 *
 * @property string          $chat_id                          __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property int             $user_id                          __Required: Yes__. Unique identifier of the target user
 * @property ChatPermissions $permissions                      __Required: Yes__. A JSON-serialized object for new user permissions
 * @property bool            $use_independent_chat_permissions __Required: Optional__. Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
 * @property int             $until_date                       __Required: Optional__. Date when restrictions will be lifted for the user; Unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever
 */
class RestrictChatMemberMethod extends TelegramMethod
{
    protected string $method = 'restrictChatMember';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'user_id' => 'integer',
        'permissions' => 'ChatPermissions',
        'use_independent_chat_permissions' => 'boolean',
        'until_date' => 'integer',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
