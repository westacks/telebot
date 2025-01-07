<?php

namespace WeStacks\TeleBot\Tests\Helpers;

use WeStacks\TeleBot\Handlers\UpdateHandler;

class TestUpdateHandler extends UpdateHandler
{
    public function trigger()
    {
        return false;
    }

    public function handle()
    {
        echo 'TestUpdateHandler';
    }
}
