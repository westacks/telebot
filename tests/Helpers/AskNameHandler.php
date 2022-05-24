<?php

namespace WeStacks\TeleBot\Tests\Helpers;

use WeStacks\TeleBot\Handlers\AskInputHandler;

class AskNameHandler extends AskInputHandler
{
    public function handle()
    {
        if (!in_array($name = $this->update->message()->text, ['John', 'Jane'])) {
            return $this->fake()->sendMessage([
                'text' => 'Sorry, I don\'t know you.',
            ]);
        }

        $this->answered();

        return $this->fake()->sendMessage([
            'text' => "Hello, $name!",
        ]);
    }
}
