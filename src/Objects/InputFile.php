<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual way that files are uploaded via the browser.
 *
 * @see https://core.telegram.org/bots/api#inputfile
 */
class InputFile extends TelegramObject
{
    /** Original filename as defined by sender */
    protected ?string $filename;

    /**
     * The contents of the file
     * @var string|resource|null
     */
    protected $contents;

    public function __construct(mixed $file, ?string $filename = null)
    {
        if (is_array($file)) {
            $filename = $file['filename'] ?? null;
            $file = $file['file'] ?? null;
        }

        if (empty($filename) && is_string($file)) {
            $filename = basename($file);
        }

        if (! is_resource($file) && (! is_string($file) || ! file_exists($file))) {
            throw new \TypeError('The file must be a resource or a path to a file');
        }

        $this->filename = $filename;

        if (is_resource($file)) {
            $this->contents = $file;
        } elseif (is_file($file)) {
            $this->contents = fopen($file, 'r');
        }
    }

    public function __destruct()
    {
        if (is_resource($this->contents)) {
            fclose($this->contents);
        }
    }

    public static function from(array|string $parameters): static
    {
        if (is_string($parameters)) {
            $parameters = ['file' => $parameters];
        }

        return new static(...$parameters);
    }

    public function toArray(bool $recursive = true): array
    {
        return [
            'file' => $this->contents,
            'filename' => $this->filename,
        ];
    }

    public function toJson(): string
    {
        throw new \RuntimeException('This object cannot be converted to JSON');
    }

    public function toMultipart(string $key): array
    {
        $data = [
            'name' => $key,
            'contents' => $this->contents,
        ];

        if ($this->filename) {
            $data['filename'] = $this->filename;
        }

        return $data;
    }
}
