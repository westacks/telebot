<?php

namespace WeStacks\TeleBot\Laravel\Requests;

use Illuminate\Foundation\Http\FormRequest;
use WeStacks\TeleBot\Objects\Update;

class UpdateRequest extends FormRequest
{
    protected Update $update;

    private array $types = [
        'message',
        'edited_message',
        'channel_post',
        'edited_channel_post',
        'inline_query',
        'chosen_inline_result',
        'callback_query',
        'shipping_query',
        'pre_checkout_query',
        'poll',
        'poll_answer',
        'my_chat_member',
        'chat_member',
        'chat_join_request',
    ];

    public function authorize()
    {
        return  $this->isMethod('post') &&
                $this->isJson() &&
                $this->validToken() &&
                $this->validSecret();
    }

    private function validToken()
    {
        $bot = $this->route('bot');
        $token = $this->route('token');

        $config = config("telebot.bots.$bot");
        $realToken = $config['token'] ?? $config;

        return $token === $realToken;
    }

    private function validSecret()
    {
        $bot = $this->route('bot');

        $secret = $this->header('X-Telegram-Bot-Api-Secret-Token');
        $token = config("telebot.bots.$bot.webhook.secret_token");

        return $secret === $token;
    }

    protected function onlyOnePresent(string $type)
    {
        $types = implode(',', array_filter($this->types, fn ($value) => $value !== $type));

        return "required_without_all:$types|prohibits:$types";
    }

    protected function prepareForValidation()
    {
        // Crutch to prevent any data modifications from Laravel
        // For now, Laravel not allowing to disable global middleware per request,
        // so we can't ignore middlewares like: ConvertEmptyStringsToNull, TrimStrings etc.
        $this->merge(json_decode($this->getContent(), true));
    }

    public function rules()
    {
        return collect($this->types)
            ->mapWithKeys(fn ($type) => [$type => [$this->onlyOnePresent($type), 'array']])
            ->prepend(['required', 'numeric'], 'update_id')
            ->toArray();
    }

    public function update()
    {
        if (empty($this->update)) {
            $this->update = new Update($this->validated());
        }

        return $this->update;
    }
}
