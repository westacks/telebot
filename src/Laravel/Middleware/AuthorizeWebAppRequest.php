<?php

namespace WeStacks\TeleBot\Laravel\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use WeStacks\TeleBot\Laravel\Services\TelegramWebAppService;

class AuthorizeWebAppRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, \Closure $next, string $bot = null): Response
    {
        abort_unless(
            (new TelegramWebAppService($request))->validCredentials($bot ?: config('telebot.bots.default')),
            403, trans('Invalid credentials')
        );

        return $next($request);
    }
}