<?php

namespace WeStacks\TeleBot\Laravel\Requests;

use Illuminate\Foundation\Http\FormRequest;
use WeStacks\TeleBot\Objects\Update;

class UpdateRequest extends FormRequest
{
    protected Update $update;

    public function authorize()
    {
        $bot = $this->route('bot');
        $token = $this->route('token');

        $config = config("telebot.bots.$bot");
        $realToken = $config['token'] ?? $config;

        return $this->isMethod('post') && $this->isJson() && $token === $realToken;
    }

    public function rules()
    {
        return [
            'update_id'             => ['required', 'numeric'],
            'message'               => ['sometimes', 'array'],
            'edited_message'        => ['sometimes', 'array'],
            'channel_post'          => ['sometimes', 'array'],
            'edited_channel_post'   => ['sometimes', 'array'],
            'inline_query'          => ['sometimes', 'array'],
            'chosen_inline_result'  => ['sometimes', 'array'],
            'callback_query'        => ['sometimes', 'array'],
            'shipping_query'        => ['sometimes', 'array'],
            'pre_checkout_query'    => ['sometimes', 'array'],
            'poll'                  => ['sometimes', 'array'],
            'poll_answer'           => ['sometimes', 'array'],
            'my_chat_member'        => ['sometimes', 'array'],
            'chat_member'           => ['sometimes', 'array'],
            'chat_join_request'     => ['sometimes', 'array'],
        ];
    }

    public function update()
    {
        if (empty($this->update)) {
            $this->update = new Update($this->validated());
        }
        return $this->update;
    }
}
