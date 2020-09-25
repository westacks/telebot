<?php

namespace WeStacks\TeleBot\Tests\Helpers;

use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;

class TestUpdateHandler extends UpdateHandler
{
    public static function trigger(Update $update)
    {
        return false;
    }

    public function handle()
    {
        echo 'TestUpdateHandler';
    }
}