<?php

namespace WeStacks\TeleBot\Laravel\Controllers;

use Illuminate\Routing\Controller;
use WeStacks\TeleBot\Laravel\Requests\UpdateRequest;
use WeStacks\TeleBot\Laravel\TeleBot;

class WebhookController extends Controller
{
    public function __invoke(string $bot, string $token, UpdateRequest $request)
    {
        $config = config("telebot.bots.$bot");
        $realToken = $config['token'] ?? $config;

        abort_if($realToken !== $token, 404);

        TeleBot::bot($bot)->handleUpdate($request->update());
    }
}
