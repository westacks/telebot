<?php

namespace WeStacks\TeleBot\Foundation;

use WeStacks\TeleBot\TeleBot;

class FileStorage implements StorageContract
{
    /**
     * Storage name for given bot.
     */
    protected string $storage;

    public function __construct(TeleBot $bot)
    {
        $this->storage = hash('xxh128', $bot->config['token']);

        if (! file_exists($root = $this->path())) {
            mkdir($root, 0755, true);
        }
    }

    protected function path(?string $file = null): string
    {
        $root = __DIR__ . '/../../.storage/' . $this->storage;

        return $file ? $root . '/' . $file : $root;
    }

    public function get(string $key, $default = null): mixed
    {
        return file_exists($path = $this->path($key)) ? file_get_contents($path) : $default;
    }

    public function set(string $key, $value): bool
    {
        return file_put_contents($this->path($key), $value) !== false;
    }

    public function delete(string $key): bool
    {
        return @unlink($this->path($key));
    }
}
