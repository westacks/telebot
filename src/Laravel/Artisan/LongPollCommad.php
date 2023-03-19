<?php

namespace WeStacks\TeleBot\Laravel\Artisan;

use Symfony\Component\Console\Command\SignalableCommandInterface;
use WeStacks\TeleBot\Objects\Update;

class LongPollCommad extends TeleBotCommand implements SignalableCommandInterface
{
    protected $poll = true;

    protected $signature = 'telebot:polling
                {bot? : The bot name defined in the config file.}
                {--A|all : Perform actions on all your bots.}
                {--O|once : Poll only one time (for debug purposes).}';

    protected $description = 'Ease the Process of polling for bot updates.';

    public function handle()
    {
        $bots = collect($this->botsList())->map(function ($key) {
            return [$key => 0];
        })->collapse()->toArray();

        $this->info('Polling telegram updates...');
        while ($this->poll) {
            foreach (array_keys($bots) as $bot) {
                $this->handleUpdates($bot, $bots[$bot]);
            }
            if ($this->option('once')) {
                $this->poll = false;
            }
        }

        return 0;
    }

    private function handleUpdates(string $bot, int &$offset)
    {
        $updates = $this->bot->bot($bot)
            ->async(false)
            ->exceptions(true)
            ->getUpdates(array_merge(config("telebot.bots.{$bot}.poll", []), [
                'offset' => $offset + 1,
            ]));

        foreach ($updates as $update) {
            $this->logUpdate($bot, $update);
            $this->bot->bot($bot)->handleUpdate($update);
            $offset = $update->update_id;
        }
    }

    private function logUpdate(string $bot, Update $update)
    {
        $output = $this->getOutput();

        if ($output->isQuiet()) {
            return;
        } elseif ($output->isVerbose() || $output->isVeryVerbose() || $output->isDebug()) {
            $this->info("Bot: '{$bot}'; Update: {$update}");
        } else {
            $this->info("Bot: '{$bot}'; Update: {$update->update_id}; Type: '".$update->type()."'");
        }
    }

    public function getSubscribedSignals(): array
    {
        $signals = [];

        if (defined('SIGINT')) {
            $signals[] = SIGINT;
        }
        if (defined('SIGTERM')) {
            $signals[] = SIGTERM;
        }
        if (defined('SIGQUIT')) {
            $signals[] = SIGQUIT;
        }

        return $signals;
    }

    public function handleSignal(int $signal): void
    {
        $this->warn('Shutting down Telegram polling...');
        $this->poll = false;
    }
}
