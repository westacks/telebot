<?php

namespace WeStacks\TeleBot\Laravel\Controllers;

use Illuminate\Routing\Controller;
use WeStacks\TeleBot\Laravel\TeleBot;

class WebhookController extends Controller
{
    public function __invoke(string $bot, string $token)
    {
        $config = config("telebot.bots.$bot");
        $realToken = $config['token'] ?? $config;

        if ($realToken !== $token) {
            abort(404);
        }

        TeleBot::bot($bot)->handleUpdate();
    }
}