<?php

namespace WeStacks\TeleBot\Laravel\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

final class TelegramWebAppService
{
    public function __construct(
        protected Request $request
    ) {
    }

    public function getCredentials(): ?Collection
    {
        if (! $data = $this->request->header('X-Telegram-Web-App')) {
            return null;
        }

        return collect(explode('&', urldecode($data)))
            ->mapWithKeys(function ($value) {
                [$key, $val] = explode('=', $value);

                return [$key => $val];
            });
    }

    public function validCredentials(string $bot): bool
    {
        if (! $credentials = $this->getCredentials()) {
            return false;
        }

        $hash = $credentials->get('hash');

        $data_check_string = $credentials->except('hash')
            ->sortKeys()
            ->transform(fn ($val, $key) => "$key=$val")
            ->join("\n");

        $secret_key = hash_hmac('sha256', config("telebot.bots.$bot.token"), 'WebAppData', true);
        $hash_hmac = bin2hex(hash_hmac('sha256', $data_check_string, $secret_key, true));

        return $hash === $hash_hmac;
    }

    public function user(): ?array
    {
        if (! $credentials = $this->getCredentials()) {
            return null;
        }

        return json_decode($credentials->get('user'), true);
    }
}
