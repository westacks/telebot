<?php

namespace WeStacks\TeleBot\Laravel\Artisan;

use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\TableCell;
use WeStacks\TeleBot\Objects\WebhookInfo;

class WebhookCommand extends TeleBotCommand
{
    protected $signature = 'telebot:webhook
                {bot? : The bot name defined in the config file.}
                {--A|all : Perform actions on all your bots.} 
                {--S|setup : Declare your webhook on Telegram servers. So they can call you.} 
                {--R|remove : Remove your already declared webhook on Telegram servers.} 
                {--I|info : Get the information about your current webhook on Telegram servers.}';

    protected $description = 'Ease the Process of setting up and removing webhooks.';

    public function handle()
    {
        if (true !== ($error = $this->validOptions())) {
            $this->error($error);

            return 1;
        }

        $bots = $this->botsList();

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
            $config = config("telebot.bots.{$bot}");
            $webhook = $config['webhook'] ?? [];
            $token = $config['token'] ?? $config ?? null;

            if (! isset($webhook['url'])) {
                $webhook['url'] = route('telebot.webhook', [
                    'bot' => $bot,
                    'token' => $token,
                ]);
            }

            $promises[] = $this->bot->bot($bot)
                ->async(true)
                ->exceptions(true)
                ->setWebhook($webhook)
                ->then(function (bool $result) use ($bot) {
                    if ($result) {
                        $this->info("Success! Webhook has been set for '{$bot}' bot!");
                    }

                    return $result;
                });
        }
        Utils::all($promises)->wait();
    }

    private function removeWebhook(array $bots)
    {
        $promises = [];
        foreach ($bots as $bot) {
            $promises[] = $this->bot->bot($bot)
                ->async(true)
                ->exceptions(true)
                ->deleteWebhook()
                ->then(function (bool $result) use ($bot) {
                    if ($result) {
                        $this->info("Success! Webhook has been removed for '{$bot}' bot!");
                    }

                    return $result;
                });
        }
        Utils::all($promises)->wait();
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
                ->then(function (WebhookInfo $info) use ($bot) {
                    $this->makeTable($info, $bot);

                    return $info;
                });
        }
        Utils::all($promises)->wait();
    }

    private function makeTable(WebhookInfo $info, string $bot)
    {
        $rows = collect($info->toArray())->map(function ($value, $key) {
            $key = Str::title(str_replace('_', ' ', $key));
            $value = is_bool($value) ? ($value ? 'Yes' : 'No') : $value;

            return compact('key', 'value');
        })->toArray();

        $this->table([
            [new TableCell('Bot: '.$bot, ['colspan' => 2])],
            ['Key', 'Info'],
        ], $rows);
    }
}
