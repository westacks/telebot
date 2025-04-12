<?php

namespace Tests\Lib;

use WeStacks\TeleBot\Foundation\CallbackHandler;

class PopupHandler extends CallbackHandler
{
    protected string $match = '/popup:(.*)/';

    public function handle()
    {
        return $this->sendMessage(
            text: $this->arguments(0),
        );
    }
}
