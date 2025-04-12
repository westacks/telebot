<?php

namespace WeStacks\TeleBot\Foundation;

use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

/**
 * @mixin \WeStacks\TeleBot\TeleBot Passes all method calls to TeleBot
 */
abstract class UpdateHandler
{
    use HasTelegramMethods;

    public function __construct(
        protected readonly TeleBot $bot,
        protected readonly Update $update,
    ) {
    }

    public function __invoke(callable $next)
    {
        if ($this->trigger()) {
            $result = $this->handle();
        }

        return $result ?? $next();
    }

    public function __call(string $name, array $arguments): mixed
    {
        if (! $method = $this->method($name)) {
            return $this->bot->{$name}(...$arguments);
        }

        $merge = [
            'chat_id' => $this->update->chat()->id ?? null,
            'from_chat_id' => $this->update->chat()->id ?? null,
            'user_id' => $this->update->user()->id ?? null,
            'message_id' => $this->update->message()->message_id ?? null,
            'message_thread_id' => $this->update->message()->message_thread_id ?? null,
            'business_connection_id' => $this->update->message()->business_connection_id ?? null,
            'sender_chat_id' => $this->update->message()->sender_chat->id ?? null,
            'callback_query_id' => $this->update->callback_query->id ?? null,
            'inline_message_id' => $this->update->chosen_inline_result->inline_message_id ?? null,
            'inline_query_id' => $this->update->inline_query->id ?? null,
            'shipping_query_id' => $this->update->shipping_query->id ?? null,
            'pre_checkout_query_id' => $this->update->pre_checkout_query->id ?? null,
        ];

        $merge = array_intersect_key($merge, array_flip($method::properties()));

        if (count($arguments) === 1 && isset($arguments[0]) && is_array($arguments[0])) {
            $arguments = $arguments[0];
        }

        $arguments = array_merge(
            array_filter($merge, fn ($value) => !is_null($value)),
            $arguments
        );

        return $this->bot->{$name}(...$arguments);
    }

    /**
     * Determine if the update should be handled by this handler.
     */
    public function trigger(): bool
    {
        return true;
    }

    /**
     * Handle the update. When `void` or `null` returned the update will be passed to the next handler. Stops handling otherwise.
     *
     * @return void|mixed
     */
    public function handle()
    {
        //
    }
}
