<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents an invite link for a chat.
 * @property-read string $invite_link The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”.
 * @property-read User $creator Creator of the link
 * @property-read bool $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators
 * @property-read bool $is_primary True, if the link is primary
 * @property-read bool $is_revoked True, if the link is revoked
 * @property-read ?string $name Optional. Invite link name
 * @property-read ?int $expire_date Optional. Point in time (Unix timestamp) when the link will expire or has been expired
 * @property-read ?int $member_limit Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * @property-read ?int $pending_join_request_count Optional. Number of pending join requests created using this link
 * @property-read ?int $subscription_period Optional. The number of seconds the subscription will be active for before the next payment
 * @property-read ?int $subscription_price Optional. The amount of Telegram Stars a user must pay initially and after each subsequent subscription period to be a member of the chat using the link
 *
 * @see https://core.telegram.org/bots/api#chatinvitelink
 */
class ChatInviteLink extends TelegramObject
{
    public function __construct(
        public readonly string $invite_link,
        public readonly User $creator,
        public readonly bool $creates_join_request,
        public readonly bool $is_primary,
        public readonly bool $is_revoked,
        public readonly ?string $name,
        public readonly ?int $expire_date,
        public readonly ?int $member_limit,
        public readonly ?int $pending_join_request_count,
        public readonly ?int $subscription_period,
        public readonly ?int $subscription_price,
    ) {
    }
}
