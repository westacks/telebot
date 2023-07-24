<?php

namespace WeStacks\TeleBot\Contracts;

interface StorageContract
{
    public function get(string $key, $default = null): mixed;
    public function set(string $key, string $value): true;
    public function delete(string $key): true;
}