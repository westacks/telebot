<?php

namespace WeStacks\TeleBot\Laravel\Requests;

use Illuminate\Foundation\Http\FormRequest;
use WeStacks\TeleBot\Objects\Update;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'update_id' => ['sometimes', 'numeric'],
            'message' => ['sometimes', 'array'],
            'edited_message' => ['sometimes', 'array'],
            'channel_post' => ['sometimes', 'array'],
            'edited_channel_post' => ['sometimes', 'array'],
            'inline_query' => ['sometimes', 'array'],
            'chosen_inline_result' => ['sometimes', 'array'],
            'callback_query' => ['sometimes', 'array'],
            'shipping_query' => ['sometimes', 'array'],
            'pre_checkout_query' => ['sometimes', 'array'],
            'poll' => ['sometimes', 'array'],
            'poll_answer' => ['sometimes', 'array'],
            'my_chat_member' => ['sometimes', 'array'],
            'chat_member' => ['sometimes', 'array'],
            'chat_join_request' => ['sometimes', 'array'],
        ];
    }

    public function update()
    {
        return new Update($this->validated());
    }
}
