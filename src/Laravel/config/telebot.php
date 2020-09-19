<?php

return [
    /*-------------------------------------------------------------------------
    | Default Bot Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the bots you wish to use as
    | your default bot for regular use.
    |
    */
    'default' => 'mybot',

    /*-------------------------------------------------------------------------
    | Your Telegram Bots
    |--------------------------------------------------------------------------
    | You may use multiple bots. Each bot that you own should be configured here.
    |
    | Bot Parameters:
    |
    | - name:               The *personal* name you would like to refer to your bot as.
    |
    |       - token:        (Required) Your Telegram Bot's Access Token.
    |                       Refer for more details: https://core.telegram.org/bots#botfather
    |                       Example: (string) '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11'.
    |
    |       - exceptions:   (Optional) Bot throws exceptions on telegram API errors by default. Default: true
    |                       Example: (boolean) false
    |
    |       - async:        (Optional) Bot returns GuzzleHTTP promises for each telegram API method. Default: false
    |                       Example: (boolean) true
    |
    |       - rate_limit:   (Optional) Maximum of requests per second bot allowed to execute. Default: 1
    |                       Refer for more details: https://core.telegram.org/bots/faq#my-bot-is-hitting-limits-how-do-i-avoid-this
    |                       Example: (integer) 30
    |
    |       - handlers:     (Optional) Update handlers used to handle your Telegram updates.
    |                       Should be an array of closure functions or \WeStacks\TeleBot\Interfaces\UpdateHandler::class resolutions
    |                       Example: (array) [
    |                           \App\Services\Telegram\Commands\StartCommand::class,
    |                           \App\Services\Telegram\Commands\HelpCommand::class,
    |                           function($update) {
    |                               Log::info($update);
    |                           }
    |                       ]
    */
    'bots' => [
        'mybot' => [
            'token'         => env('TELEGRAM_BOT_TOKEN', '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11'),
            'exceptions'    => true,
            'async'         => false,
            'rate_limit'    => 1,
            'handlers'      => [
                // Your update handlers
            ],
        ],

        // 'secondbot' => [
        //     'token'         => '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11',
        // ],
    ]
];