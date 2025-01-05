<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual way that files are uploaded via the browser.
 */
class InputFile
{
    /**
     * File name.
     *
     * @var null|string
     */
    protected $filename;

    /**
     * File contents.
     *
     * @var bool|resource|string
     */
    protected $contents;

    public function __construct($file, ?string $filename = null)
    {
        if (!$file) {
            throw new TeleBotException('InputFile must be a file path or a resource');
        }

        if (is_array($file)) {
            $filename = $file['filename'] ?? null;
            $file = $file['file'] ?? null;
        }

        $this->filename = $filename;

        if (is_resource($file) || !@is_file($file) || !$this->contents = @fopen($file, 'r')) {
            $this->contents = $file;
        }
    }

    public static function create($file, ?string $filename = null)
    {
        return new static($file, $filename);
    }

    public function toMultipart(string $name)
    {
        $data = [
            'name' => $name,
            'contents' => $this->contents,
        ];

        if ($this->filename) {
            $data['filename'] = $this->filename;
        }

        return $data;
    }
}
