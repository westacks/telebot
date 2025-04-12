<?php

namespace WeStacks\TeleBot\Foundation;

interface StorageContract
{
    public function get(string $key, $default = null): mixed;

    public function set(string $key, $value): bool;

    public function delete(string $key): bool;
}
