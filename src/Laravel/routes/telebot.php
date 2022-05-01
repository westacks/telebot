<?php

use Illuminate\Support\Facades\Route;
use WeStacks\TeleBot\Laravel\Controllers\WebhookController;

/*
|--------------------------------------------------------------------------
| TeleBot Routes
|--------------------------------------------------------------------------
*/

Route::post('/telebot/webhook/{bot}/{token}', [
    'as' => 'telebot.webhook',
    'uses' => WebhookController::class,
]);
