<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Interfaces\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\Stickers\MaskPosition;

class CreateNewStickerSetMethod extends TelegramMethod
{
    protected function request()
    {
        return [
            'type' => 'POST',
            'url' => "{$this->api}/bot{$this->token}/createNewStickerSet",
            'send' => $this->send(),
            'expect' => 'boolean',
        ];
    }

    private function send()
    {
        $parameters = [
            'user_id' => 'integer',
            'name' => 'string',
            'title' => 'string',
            'png_sticker' => InputFile::class,
            'tgs_sticker' => InputFile::class,
            'emojis' => 'string',
            'contains_masks' => 'boolean',
            'mask_position' => MaskPosition::class,
        ];

        $object = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);

        return ['multipart' => TypeCaster::flatten($object)];
    }
}
