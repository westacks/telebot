<?php

namespace Telegram\Bot\Laravel\Artisan;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\TableCell;
use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\Objects\WebhookInfo;

use function GuzzleHttp\Promise\all;

class WebhookCommand extends Command
{
    protected $signature = 'telebot:webhook
                {bot? : The bot name defined in the config file.}
                {--A|all : Perform actions on all your bots.} 
                {--S|setup : Declare your webhook on Telegram servers. So they can call you.} 
                {--R|remove : Remove your already declared webhook on Telegram servers.} 
                {--I|info : Get the information about your current webhook on Telegram servers.}';

    protected $description = 'Ease the Process of setting up and removing webhooks.';
    protected $bot;

    public function __construct(BotManager $bot)
    {
        parent::__construct();
        $this->bot = $bot;
    }

    public function handle()
    {
        if (!$this->option('setup') && !$this->option('remove') && !$this->option('info')) {
            return $this->error('No task specified!');
        }

        $bots = $this->hasOption('all') ? $this->bot->bots() : [$this->argument('bot') ?? config('telebot.default')];

        if ($this->option('setup')) {
            $this->setupWebhook($bots);
        }

        if ($this->option('remove')) {
            $this->removeWebhook($bots);
        }

        if ($this->option('info')) {
            $this->getInfo($bots);
        }
        return 0;
    }

    private function setupWebhook(array $bots)
    {
        $promises = [];
        foreach ($bots as $bot) {
            $promises[] = $this->bot->bot($bot)
                ->async(true)
                ->exceptions(true)
                ->setWebhook(config("telebot.bots.$bot.webhook", []))
                ->then(function(bool $result) use($bot) {
                    if ($result) $this->info("Success! Webhook has been set for '$bot' bot!");
                    return $result;
                });
        }
        all($promises)->wait();
    }

    private function removeWebhook(array $bots)
    {
        $promises = [];
        foreach ($bots as $bot) {
            $promises[] = $this->bot->bot($bot)
                ->async(true)
                ->exceptions(true)
                ->deleteWebhook()
                ->then(function(bool $result) use($bot) {
                    if ($result) $this->info("Success! Webhook has been removed for '$bot' bot!");
                    return $result;
                });
        }
        all($promises)->wait();
    }

    private function getInfo(array $bots)
    {
        $this->alert('Webhook Info');

        $promises = [];
        foreach ($bots as $bot) {
            $promises[] = $this->bot->bot($bot)
                ->async(true)
                ->exceptions(true)
                ->getWebhookInfo()
                ->then(function(WebhookInfo $info) use($bot) {
                    $this->makeTable($info, $bot);
                    return $info;
                });
        }
        all($promises)->wait();
    }

    private function makeTable(WebhookInfo $info, string $bot)
    {
        $rows = collect($info->toArray())->map(function ($value, $key) {
            $key = Str::title(str_replace('_', ' ', $key));
            $value = is_bool($value) ? ($value ? 'Yes' : 'No') : $value;
            return compact('key', 'value');
        })->toArray();

        return $this->table([
            [new TableCell('Bot: '.$bot, ['colspan' => 2])],
            ['Key', 'Info'],
        ], $rows);
    }
}