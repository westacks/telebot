<?php

namespace WeStacks\TeleBot\Laravel\Log;

use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use WeStacks\TeleBot\TeleBot;

class TelegramLogger extends AbstractProcessingHandler
{
    /**
     * Bot instance
     * @var TeleBot
     */
    protected $bot;

    /**
     * Chat id to send log message
     * @var string
     */
    protected $chat_id;
    
    /**
     * App name
     * @var string
     */
    protected $app;

    /**
     * App env
     * @var string
     */
    protected $env;

    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        return new Logger(
            config('app.name'),
            [
                new static($config)
            ]
        );
    }

    public function __construct(array $config)
    {
        $level = Logger::toMonologLevel($config['level']);

        parent::__construct($level, true);

        // define variables for making Telegram request
        $this->bot = app('telebot')->bot($config['bot'] ?? null);
        $this->chat_id = $config['chat_id'];

        // define variables for text message
        $this->app = config('app.name');
        $this->emv = config('app.env');
    }

    /**
     * @param array $record
     */
    public function write(array $record): void
    {
        $textChunks = str_split($this->formatText($record), 4096);

        foreach ($textChunks as $textChunk) {
            $this->sendMessage($textChunk);
        }
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new LineFormatter("%message% %context% %extra%\n");
    }

    /**
     * @param array $record
     * @return string
     */
    private function formatText(array $record): string
    {
        return view('telebot::log', array_merge($record, [
            'app' => $this->app,
            'env' => $this->env,
        ]))->render();
    }

    /**
     * @param  string  $text
     */
    private function sendMessage(string $text): void
    {
        $this->bot->exceptions(false)->async(false)->sendMessage([
            'chat_id' => $this->chat_id,
            'parse_mode' => 'html',
            'text' => $text,
        ]);
    }
}