<?php

namespace WeStacks\TeleBot\Laravel\Controllers;

use Illuminate\Routing\Controller;
use WeStacks\TeleBot\Laravel\Requests\UpdateRequest;
use WeStacks\TeleBot\Laravel\TeleBot;

class WebhookController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        TeleBot::bot($request->route('bot'))->handleUpdate($request->update());
    }
}
