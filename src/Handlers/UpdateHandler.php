<?php

namespace WeStacks\TeleBot\Handlers;

use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;
use WeStacks\TeleBot\Traits\HasTelegramMethods;

/**
 * Abstract class for creating Telegram update handlers.
 *
 * @mixin \WeStacks\TeleBot\TeleBot Passes all calls to the bot.
 */
abstract class UpdateHandler
{
    use HasTelegramMethods;

    /**
     * Update being processed.
     *
     * @var Update
     */
    protected $update;

    /**
     * Bot instance.
     *
     * @var TeleBot
     */
    protected $bot;

    /**
     * Create new update handler instance.
     */
    public function __construct(TeleBot $bot, Update $update)
    {
        $this->bot = $bot;
        $this->update = $update;
    }

    public function __call($name, $arguments)
    {
        if (! $this->method($name)) {
            return $this->bot->{$name}(...$arguments);
        }

        $custom = [
            'chat_id' => $this->update->chat()->id ?? null,
            'user_id' => $this->update->user()->id ?? null,
            'message_id' => $this->update->message()->message_id ?? null,
            'callback_query_id' => $this->update->callback_query->id ?? null,
            'inline_message_id' => $this->update->chosen_inline_result->inline_message_id ?? null,
            'inline_query_id' => $this->update->inline_query->id ?? null,
            'shipping_query_id' => $this->update->shipping_query->id ?? null,
            'pre_checkout_query_id' => $this->update->pre_checkout_query->id ?? null,
        ];

        $arguments[0] = array_merge(
            array_filter($custom, fn ($v) => ! is_null($v)),
            $arguments[0] ?? [],
        );

        return $this->bot->{$name}(...$arguments);
    }

    /**
     * This function should return `true` if this handler should handle given update, or `false` if should not.
     *
     * @return bool
     */
    public function trigger()
    {
        return true;
    }

    /**
     * This function should handle updates.
     */
    public function handle()
    {
        // Do nothing.
    }

    /**
     * Handling proccess.
     *
     * @param callable $next
     * @return $next
     */
    public function __invoke($next)
    {
        if ($this->trigger()) {
            $result = $this->handle();
        }

        return $result ?? $next();
    }
}
