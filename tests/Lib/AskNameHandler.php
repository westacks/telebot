<?php

namespace Tests\Lib;

use WeStacks\TeleBot\Foundation\RequestInputHandler;

class AskNameHandler extends RequestInputHandler
{
    public function handle()
    {
        if (!in_array($name = $this->update->message()->text, ['John', 'Jane'])) {
            return $this->sendMessage(
                text: 'Sorry, I don\'t know you.',
            );
        }

        $this->accept();

        return $this->sendMessage(
            text: "Hello, $name!",
        );
    }
}
