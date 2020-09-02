<?php

namespace WeStacks\TeleBot\Objects;

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
     * @var string|resource|bool
     */
    protected $contents;

    public function __construct($file, string $filename = null)
    {
        if (is_array($file))
        {
            $filename = $file['filename'] ?? null;
            $file = $file['file'] ?? null;
        }

        if (is_null($file) || is_bool($file))
        {
            throw TeleBotFileException::fileCantBeNull();
        }

        $this->filename = $filename;

        if (is_resource($file) || !@is_file($file) || !$this->contents = @fopen($file, 'r'))
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
        $data = [
            'name' => $name,
            'contents' => $this->contents
        ];

        if ($this->filename)
        {
            $data['filename'] = $this->filename;
        }

        return $data;
    }
}