<?php

use WeStacks\TeleBot\TeleBot;

require_once 'vendor/autoload.php';

if (! function_exists('get_config')) {
    function get_config()
    {
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

        return $config;
    }
}

if (! function_exists('get_bot')) {
    function get_bot()
    {
        return new TeleBot(get_config());
    }
}
