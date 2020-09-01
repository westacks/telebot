<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\Exception\TeleBotFileException;

class InputFile
{
    /**
     * File name
     * @var string|null
     */
    protected $filename;

    /**
     * File contents
     * @var string|resource
     */
    protected $contents;

    public function __construct($file, string $filename = null)
    {
        if(is_array($file)) {
            $filename = $file['filename'] ?? null;
            $file = $file['file'] ?? null;
        }

        if(is_null($file) || is_bool($file)) throw TeleBotFileException::fileCantBeNull();

        $this->filename = $filename ?? 'input_file';

        if(is_resource($file) || !@is_file($file) && !filter_var($file, FILTER_VALIDATE_URL) || !$this->contents = @fopen($file, 'r'))
        {
            $this->contents = $file;
        }
    }

    public static function create($file, string $filename = null)
    {
        return new static($file, $filename);
    }

    public function toMultipart(string $name)
    {
        return [
            'name' => $name,
            'contents' => $this->contents,
            'filename' => $this->filename
        ];
    }
}