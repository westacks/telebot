<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\TelegramObject;
use WeStacks\TeleBot\TelegramObject\Payments\PreCheckoutQuery;
use WeStacks\TeleBot\TelegramObject\Payments\ShippingQuery;

/**
 * This object represents an incoming update.
 * At most one of the optional parameters can be present in any given update.
 * 
 * @property Integer                $update_id                  The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you're using Webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
 * @property String                 $type                       The type of incoming update. One of these: message, edited_message, channel_post, edited_channel_post, inline_query, chosen_inline_result, callback_query, shipping_query, pre_checkout_query, poll, poll_answer
 * @property Message                $message                    _Optional_. New incoming message of any kind — text, photo, sticker, etc.
 * @property Message                $edited_message             _Optional_. New version of a message that is known to the bot and was edited
 * @property Message                $channel_post               _Optional_. New incoming channel post of any kind — text, photo, sticker, etc.
 * @property Message                $edited_channel_post        _Optional_. New version of a channel post that is known to the bot and was edited
 * @property InlineQuery            $inline_query               _Optional_. New incoming inline query
 * @property ChosenInlineResult     $chosen_inline_result       _Optional_. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates for your bot.
 * @property CallbackQuery          $callback_query             _Optional_. New incoming callback query
 * @property ShippingQuery          $shipping_query             _Optional_. New incoming shipping query. Only for invoices with flexible price
 * @property PreCheckoutQuery       $pre_checkout_query         _Optional_. New incoming pre-checkout query. Contains full information about checkout
 * @property Poll                   $poll                       _Optional_. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
 * @property PollAnswer             $poll_answer                _Optional_. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 * 
 * @package WeStacks\TeleBot\TelegramObject
 */

class Update extends TelegramObject
{
    public function __construct($object)
    {
        parent::__construct($object);

        $this->properties['type'] = null;
        $types = $this->relations();

        unset($types['update_id']);
        $types = array_keys($types);

        foreach($types as $type)
        {
            if(isset($this->$type)) {
                $this->properties['type'] = $type;
                break;
            }
        }
    }

    protected function relations() {
        return [
            'update_id'             => 'integer',
            'message'               => Message::class,
            'edited_message'        => Message::class,
            'channel_post'          => Message::class,
            'edited_channel_post'   => Message::class,
            'inline_query'          => InlineQuery::class,
            'chosen_inline_result'  => ChosenInlineResult::class,
            'callback_query'        => CallbackQuery::class,
            'shipping_query'        => ShippingQuery::class,
            'pre_checkout_query'    => PreCheckoutQuery::class,
            'poll'                  => Poll::class,
            'poll_answer'           => PollAnswer::class
        ];
    }
}