<?php

namespace WeStacks\TeleBot\Foundation;

use WeStacks\TeleBot\Objects\Chat;
use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\TeleBot;

abstract class RequestInputHandler extends UpdateHandler
{
    private static function storage(TeleBot $bot): StorageContract
    {
        $storage = $bot->config['storage'] ?? FileStorage::class;

        return new $storage($bot);
    }

    public function trigger(): bool
    {
        $storage = static::storage($this->bot);

        foreach ($this->storageKeys() as $key) {
            $value = $storage->get($key);
            if ($value) {
                return static::class === $value;
            }
        }

        return false;
    }

    private function storageKeys(): array
    {
        $chatId = $this->update->chat()->id;
        $userId = $this->update->user()->id;

        if ($this->update->chat()->type === 'supergroup' && $this->update->message?->message_thread_id) {
            $suffix = "message_thread_{$this->update->message->message_thread_id}";

            return [
                "chat_{$chatId}_user_{$userId}_{$suffix}",
                "chat_{$chatId}_{$suffix}",
                "user_{$userId}_{$suffix}",
                (string)$userId,
            ];
        }

        return [
            "chat_{$chatId}_user_{$userId}",
            "chat_{$chatId}",
            "user_{$userId}",
            (string)$userId,
        ];
    }

    /**
     * Can be used to set the request input handler for a specific user or chat.
     *
     * @param User|Chat $target If `User`, awaits a message in ANY chat from SPECIFIC user. If `Chat`, awaits a message in SPECIFIC chat from ANY user.
     * @param User|null $user If `$target` is `Chat`, awaits a message in SPECIFIC chat from SPECIFIC user.
     * @param int|null $message_thread_id If passed, awaits a message in SPECIFIC message thread.
     */
    public static function request(TeleBot $bot, User|Chat $target, ?User $user = null, ?int $message_thread_id = null): bool
    {
        $key = match (true) {
            $target instanceof Chat && $user !== null => "chat_{$target->id}_user_{$user->id}",
            $target instanceof User => "user_{$target->id}",
            $target instanceof Chat => "chat_{$target->id}",
        };

        if ($message_thread_id) {
            $key .= "_message_thread_{$message_thread_id}";
        }

        return static::storage($bot)->set($key, static::class);
    }

    protected function accept(): bool
    {
        $storage = static::storage($this->bot);

        foreach ($this->storageKeys() as $key) {
            if ($storage->delete($key)) {
                return true;
            }
        }

        return false;
    }

    public function __invoke(callable $next)
    {
        return $this->trigger() ? $this->handle() : $next();
    }
}
