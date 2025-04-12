<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents an incoming update.At most one of the optional parameters can be present in any given update.
 * @property-read int $update_id The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This identifier becomes especially handy if you're using webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
 * @property-read ?Message $message Optional. New incoming message of any kind - text, photo, sticker, etc.
 * @property-read ?Message $edited_message Optional. New version of a message that is known to the bot and was edited. This update may at times be triggered by changes to message fields that are either unavailable or not actively used by your bot.
 * @property-read ?Message $channel_post Optional. New incoming channel post of any kind - text, photo, sticker, etc.
 * @property-read ?Message $edited_channel_post Optional. New version of a channel post that is known to the bot and was edited. This update may at times be triggered by changes to message fields that are either unavailable or not actively used by your bot.
 * @property-read ?BusinessConnection $business_connection Optional. The bot was connected to or disconnected from a business account, or a user edited an existing connection with the bot
 * @property-read ?Message $business_message Optional. New message from a connected business account
 * @property-read ?Message $edited_business_message Optional. New version of a message from a connected business account
 * @property-read ?BusinessMessagesDeleted $deleted_business_messages Optional. Messages were deleted from a connected business account
 * @property-read ?MessageReactionUpdated $message_reaction Optional. A reaction to a message was changed by a user. The bot must be an administrator in the chat and must explicitly specify "message_reaction" in the list of allowed_updates to receive these updates. The update isn't received for reactions set by bots.
 * @property-read ?MessageReactionCountUpdated $message_reaction_count Optional. Reactions to a message with anonymous reactions were changed. The bot must be an administrator in the chat and must explicitly specify "message_reaction_count" in the list of allowed_updates to receive these updates. The updates are grouped and can be sent with delay up to a few minutes.
 * @property-read ?InlineQuery $inline_query Optional. New incoming inline query
 * @property-read ?ChosenInlineResult $chosen_inline_result Optional. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates for your bot.
 * @property-read ?CallbackQuery $callback_query Optional. New incoming callback query
 * @property-read ?ShippingQuery $shipping_query Optional. New incoming shipping query. Only for invoices with flexible price
 * @property-read ?PreCheckoutQuery $pre_checkout_query Optional. New incoming pre-checkout query. Contains full information about checkout
 * @property-read ?PaidMediaPurchased $purchased_paid_media Optional. A user purchased paid media with a non-empty payload sent by the bot in a non-channel chat
 * @property-read ?Poll $poll Optional. New poll state. Bots receive only updates about manually stopped polls and polls, which are sent by the bot
 * @property-read ?PollAnswer $poll_answer Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 * @property-read ?ChatMemberUpdated $my_chat_member Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
 * @property-read ?ChatMemberUpdated $chat_member Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify "chat_member" in the list of allowed_updates to receive these updates.
 * @property-read ?ChatJoinRequest $chat_join_request Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the chat to receive these updates.
 * @property-read ?ChatBoostUpdated $chat_boost Optional. A chat boost was added or changed. The bot must be an administrator in the chat to receive these updates.
 * @property-read ?ChatBoostRemoved $removed_chat_boost Optional. A boost was removed from a chat. The bot must be an administrator in the chat to receive these updates.
 *
 * @see https://core.telegram.org/bots/api#update
 */
class Update extends TelegramObject
{
    public function __construct(
        public readonly int $update_id,
        public readonly ?Message $message,
        public readonly ?Message $edited_message,
        public readonly ?Message $channel_post,
        public readonly ?Message $edited_channel_post,
        public readonly ?BusinessConnection $business_connection,
        public readonly ?Message $business_message,
        public readonly ?Message $edited_business_message,
        public readonly ?BusinessMessagesDeleted $deleted_business_messages,
        public readonly ?MessageReactionUpdated $message_reaction,
        public readonly ?MessageReactionCountUpdated $message_reaction_count,
        public readonly ?InlineQuery $inline_query,
        public readonly ?ChosenInlineResult $chosen_inline_result,
        public readonly ?CallbackQuery $callback_query,
        public readonly ?ShippingQuery $shipping_query,
        public readonly ?PreCheckoutQuery $pre_checkout_query,
        public readonly ?PaidMediaPurchased $purchased_paid_media,
        public readonly ?Poll $poll,
        public readonly ?PollAnswer $poll_answer,
        public readonly ?ChatMemberUpdated $my_chat_member,
        public readonly ?ChatMemberUpdated $chat_member,
        public readonly ?ChatJoinRequest $chat_join_request,
        public readonly ?ChatBoostUpdated $chat_boost,
        public readonly ?ChatBoostRemoved $removed_chat_boost,
    ) {
    }

    /**
     * Get the type of given `Update`. You may pass type as parameter to check if current update is that type.
     */
    public function type(?string $type = null): string|bool
    {
        if ($type) {
            return isset($this->{$type});
        }

        foreach (array_keys(get_object_vars($this)) as $type) {
            if ($type !== 'update_id') {
                return $type;
            }
        }

        return false;
    }

    /**
     * Get the `Message` object instance from update.
     * @return null|Message|InaccessibleMessage
     */
    public function message(): ?MaybeInaccessibleMessage
    {
        return $this->message ??
            $this->edited_message ??
            $this->channel_post ??
            $this->edited_channel_post ??
            $this->callback_query->message ??
            $this->business_message ??
            $this->edited_business_message ??
            null;
    }

    /**
     * Get the `Chat` (where sended) object instance from update.
     */
    public function chat(): ?Chat
    {
        return $this->message()->chat ??
            $this->chat_member->chat ??
            $this->my_chat_member->chat ??
            $this->chat_join_request->chat ??
            $this->message_reaction->chat ??
            $this->message_reaction_count->chat ??
            $this->chat_boost->chat ??
            $this->removed_chat_boost->chat ??
            null;
    }

    /**
     * Get the `User` (sender) object instance from update.
     */
    public function user(): ?User
    {
        return $this->message->from ??
            $this->edited_message->from ??
            $this->channel_post->from ??
            $this->edited_channel_post->from ??
            $this->inline_query->from ??
            $this->chosen_inline_result->from ??
            $this->callback_query->from ??
            $this->shipping_query->from ??
            $this->pre_checkout_query->from ??
            $this->poll_answer->user ??
            $this->chat_member->from ??
            $this->my_chat_member->from ??
            $this->chat_join_request->from ??
            $this->message_reaction->user ??
            $this->business_message->from ??
            $this->edited_business_message->from ??
            null;
    }
}
