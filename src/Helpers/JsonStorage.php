<?php

namespace WeStacks\TeleBot\Helpers;

use WeStacks\TeleBot\Contracts\StorageContract;
use WeStacks\TeleBot\TeleBot;

class JsonStorage implements StorageContract
{
    protected string $path;
    protected array $data;
    protected bool $changed = false;

    public function __construct(TeleBot $bot)
    {
        $this->path = __DIR__.'/../../storage/'.$bot->config('token').'.json';
        $this->data = file_exists($this->path) ? json_decode(file_get_contents($this->path), true) : [];
    }

    public function __destruct()
    {
        if (!$this->changed) {
            return;
        }

        if (empty($this->data)) {
            return unlink($this->path);
        }

        file_put_contents($this->path, json_encode($this->data));
    }

    public function get(string $key, $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }

    public function set(string $key, string $value): true
    {
        $this->data[$key] = $value;
        return $this->changed = true;
    }

    public function delete(string $key): true
    {
        unset($this->data[$key]);
        return $this->changed = true;
    }
}