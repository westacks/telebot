<?php

namespace WeStacks\TeleBot\Contracts;

interface StorageContract
{
    public function get(string $key, $default = null): mixed;
    public function set(string $key, $value): true;
    public function delete(string $key): true;
}