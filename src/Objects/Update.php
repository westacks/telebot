<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This [object](https://core.telegram.org/bots/api#available-types) represents an incoming update.
 * At most one of the optional parameters can be present in any given update.
 *
 * @property int                $update_id            The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you're using Webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
 * @property Message            $message              Optional. New incoming message of any kind — text, photo, sticker, etc.
 * @property Message            $edited_message       Optional. New version of a message that is known to the bot and was edited
 * @property Message            $channel_post         Optional. New incoming channel post of any kind — text, photo, sticker, etc.
 * @property Message            $edited_channel_post  Optional. New version of a channel post that is known to the bot and was edited
 * @property InlineQuery        $inline_query         Optional. New incoming inline query
 * @property ChosenInlineResult $chosen_inline_result Optional. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates for your bot.
 * @property CallbackQuery      $callback_query       Optional. New incoming callback query
 * @property ShippingQuery      $shipping_query       Optional. New incoming shipping query. Only for invoices with flexible price
 * @property PreCheckoutQuery   $pre_checkout_query   Optional. New incoming pre-checkout query. Contains full information about checkout
 * @property Poll               $poll                 Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
 * @property PollAnswer         $poll_answer          Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 * @property ChatMemberUpdated  $my_chat_member       Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
 * @property ChatMemberUpdated  $chat_member          Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify “chat_member” in the list of allowed_updates to receive these updates.
 * @property ChatJoinRequest    $chat_join_request    Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the chat to receive these updates.
 */
class Update extends TelegramObject
{
    protected $attributes = [
        'update_id' => 'integer',
        'message' => 'Message',
        'edited_message' => 'Message',
        'channel_post' => 'Message',
        'edited_channel_post' => 'Message',
        'inline_query' => 'InlineQuery',
        'chosen_inline_result' => 'ChosenInlineResult',
        'callback_query' => 'CallbackQuery',
        'shipping_query' => 'ShippingQuery',
        'pre_checkout_query' => 'PreCheckoutQuery',
        'poll' => 'Poll',
        'poll_answer' => 'PollAnswer',
        'my_chat_member' => 'ChatMemberUpdated',
        'chat_member' => 'ChatMemberUpdated',
        'chat_join_request' => 'ChatJoinRequest',
    ];

    /**
     * Check `Update` is given `$type`.
     */
    public function is(string $type): bool
    {
        return isset($this->$type);
    }

    /**
     * Get the type of given `Update`.
     *
     * @return string|null
     */
    public function type()
    {
        foreach ($this as $key => $value) {
            if ($key !== 'update_id') {
                return $key;
            }
        }
    }

    /**
     * Get the `Message` object instance from update.
     *
     * @return Message|null
     */
    public function message()
    {
        return  $this->message ??
                $this->edited_message ??
                $this->channel_post ??
                $this->edited_channel_post ??
                $this->callback_query->message ??
                null;
    }

    /**
     * Get the `Chat` (where sended) object instance from update.
     *
     * @return Chat|null
     */
    public function chat()
    {
        return  $this->message()->chat ??
                $this->chat_member->chat ??
                $this->my_chat_member->chat ??
                $this->chat_join_request->chat ??
                null;
    }

    /**
     * Get the `User` (sender) object instance from update.
     *
     * @return User|null
     */
    public function user()
    {
        return  $this->message->from ??
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
                null;
    }
}
