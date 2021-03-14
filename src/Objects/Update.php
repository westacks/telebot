<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\Payments\PreCheckoutQuery;
use WeStacks\TeleBot\Objects\Payments\ShippingQuery;

/**
 * This object represents an incoming update.
 * At most one of the optional parameters can be present in any given update.
 *
 * @property int                    $update_id              The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you're using Webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
 * @property Message                $message                _Optional_. New incoming message of any kind — text, photo, sticker, etc.
 * @property Message                $edited_message         _Optional_. New version of a message that is known to the bot and was edited
 * @property Message                $channel_post           _Optional_. New incoming channel post of any kind — text, photo, sticker, etc.
 * @property Message                $edited_channel_post    _Optional_. New version of a channel post that is known to the bot and was edited
 * @property InlineQuery            $inline_query           _Optional_. New incoming inline query
 * @property ChosenInlineResult     $chosen_inline_result   _Optional_. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates for your bot.
 * @property CallbackQuery          $callback_query         _Optional_. New incoming callback query
 * @property ShippingQuery          $shipping_query         _Optional_. New incoming shipping query. Only for invoices with flexible price
 * @property PreCheckoutQuery       $pre_checkout_query     _Optional_. New incoming pre-checkout query. Contains full information about checkout
 * @property Poll                   $poll                   _Optional_. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
 * @property PollAnswer             $poll_answer            _Optional_. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 * @property ChatMemberUpdated	    $my_chat_member         _Optional_. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
 * @property ChatMemberUpdated	    $chat_member            _Optional_. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify “chat_member” in the list of allowed_updates to receive these updates.
 */
class Update extends TelegramObject
{
    protected function relations()
    {
        return [
            'update_id' => 'integer',
            'message' => Message::class,
            'edited_message' => Message::class,
            'channel_post' => Message::class,
            'edited_channel_post' => Message::class,
            'inline_query' => InlineQuery::class,
            'chosen_inline_result' => ChosenInlineResult::class,
            'callback_query' => CallbackQuery::class,
            'shipping_query' => ShippingQuery::class,
            'pre_checkout_query' => PreCheckoutQuery::class,
            'poll' => Poll::class,
            'poll_answer' => PollAnswer::class,
            'my_chat_member' => ChatMemberUpdated::class,
            'chat_member' => ChatMemberUpdated::class,
        ];
    }

    /**
     * Check `Update` is given `$type`
     * @param string $type 
     * @return bool 
     */
    public function is(string $type): bool
    {
        return isset($this->$type);
    }

    /**
     * Get the type of given `Update`
     * @return string|null 
     */
    public function type()
    {
        $types = ['message', 'edited_message', 'channel_post', 'edited_channel_post', 'inline_query', 'chosen_inline_result', 'callback_query', 'shipping_query', 'pre_checkout_query', 'poll', 'poll_answer', 'my_chat_member', 'chat_member'];
        foreach ($this as $key => $value) {
            if (in_array($key, $types)) return $key;
        }
        return null;
    }

    /**
     * Get the `Message` object instance from update
     * @return Message|null 
     */
    public function message()
    {
        return $this->message ?? $this->edited_message ?? $this->channel_post ?? $this->edited_channel_post ?? $this->callback_query->message ?? null;
    }

    /**
     * Get the `Chat` (where sended) object instance from update
     * @return Chat|null 
     */
    public function chat()
    {
        return $this->message()->chat ?? $this->chat_member->chat ?? $this->my_chat_member->chat ?? null;
    }

    /**
     * Get the `User` (sender) object instance from update
     * @return User|null 
     */
    public function user()
    {
        return $this->message->from ?? $this->edited_message->from ?? $this->channel_post->from ?? $this->edited_channel_post->from ?? $this->inline_query->from ?? $this->chosen_inline_result->from ?? $this->callback_query->from ?? $this->shipping_query->from ?? $this->pre_checkout_query->from ?? $this->poll_answer->user ?? $this->chat_member->from ?? $this->my_chat_member->from ?? null;
    }
}
