<?php

use WeStacks\TeleBot\TeleBot;

require_once 'vendor/autoload.php';

$config = [
    'exceptions' => true,
    'async' => false,
];

if ($val = getenv('TELEGRAM_API_URL')) {
    $config['api_url'] = $val;
}

if ($val = getenv('TELEGRAM_BOT_NAME')) {
    $config['name'] = $val;
}

if ($val = getenv('TELEGRAM_BOT_TOKEN')) {
    $config['token'] = $val;
}

$bot = new TeleBot($config);
