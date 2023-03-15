<?php

namespace WeStacks\TeleBot\Laravel\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeWebAppRequest
{
    protected ?Collection $credentials;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $bot = 'bot'): Response
    {
        abort_unless($this->validCredentials($request, $bot), 403);

        // TODO: Should be compatible with Octane
        // $request->macro('webAppUser', $this->getUser($request));

        return $next($request);
    }

    protected function getCredentials(Request $request): ?Collection
    {
        if (isset($this->credentials)) {
            return $this->credentials;
        }

        if (! $data = $request->header('X-Telegram-Web-App')) {
            return null;
        }

        return $this->credentials = collect(explode('&', urldecode($data)))
            ->mapWithKeys(function ($value) {
                [$key, $val] = explode('=', $value);

                return [$key => $val];
            });
    }

    protected function validCredentials(Request $request, string $bot): bool
    {
        if (! $credentials = $this->getCredentials($request)) {
            return false;
        }

        $hash = $credentials->get('hash');

        $data_check_string = $credentials->except('hash')
            ->sortKeys()
            ->transform(fn ($val, $key) => "$key=$val")
            ->join("\n");

        $secret_key = hash_hmac('sha256', config("telebot.bots.$bot.token", ''), 'WebAppData', true);

        return $hash === bin2hex(hash_hmac('sha256', $data_check_string, $secret_key, true));
    }

    protected function getUser(Request $request): ?array
    {
        if (! $credentials = $this->getCredentials($request)) {
            return null;
        }

        return json_decode($credentials->get('user'));
    }
}