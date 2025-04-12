<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\ChatPermissions;

/**
 * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property-read int $user_id Unique identifier of the target user
 * @property-read ChatPermissions $permissions A JSON-serialized object for new user permissions
 * @property-read ?bool $use_independent_chat_permissions Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
 * @property-read ?int $until_date Date when restrictions will be lifted for the user; Unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever
 *
 * @see https://core.telegram.org/bots/api#restrictchatmember
 */
class RestrictChatMemberMethod extends TelegramMethod
{
    protected string $method = 'restrictChatMember';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $user_id,
        public readonly ChatPermissions $permissions,
        public readonly ?bool $use_independent_chat_permissions,
        public readonly ?int $until_date,
    ) {
    }
}
