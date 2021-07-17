<?php

namespace WeStacks\TeleBot;

use Exception;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Handlers\CommandHandler;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;

class HandlerKernel
{
    /**
     * Array of update handlers.
     * 
     * @var UpdateHandler[]
     */
    protected $handlers = [];

    /**
     * Array of bot commands with default scope. Default commands are used if no commands with a narrower scope are specified for the user.
     * 
     * @var BotCommand[]
     */
    protected $defaultCommands = [];

    /**
     * Array of bot commands, covering all private chats.
     * 
     * @var BotCommand[]
     */
    protected $allPrivateChatsCommands = [];

    /**
     * Array of bot commands, covering all group and supergroup chats.
     * 
     * @var BotCommand[]
     */
    protected $allGroupChatsCommands = [];

    /**
     * Array of bot commands, covering all group and supergroup chat administrators.
     * 
     * @var BotCommand[]
     */
    protected $allChatAdministratorsCommands = [];

    /**
     * Array of bot commands, covering a specific chat.
     * 
     * @var BotCommand[][]
     */
    protected $chatCommands = [];

    /**
     * Array of bot commands, covering all administrators of a specific group or supergroup chat.
     * 
     * @var BotCommand[][]
     */
    protected $chatAdministratorsCommands = [];

    /**
     * Array of bot commands, covering a specific member of a group or supergroup chat.
     * 
     * @var BotCommand[][][]
     */
    protected $chatMemberCommands = [];

    public function __construct(array $handelrs = null)
    {
        $this->addHandler($handelrs ?? []);
    }

    public function handlers()
    {
        return $this->flatten(array_merge(
            $this->handlers,
            $this->defaultCommands,
            $this->allPrivateChatsCommands,
            $this->allGroupChatsCommands,
            $this->allChatAdministratorsCommands,
            $this->chatCommands,
            $this->chatAdministratorsCommands,
            $this->chatMemberCommands
        ));
    }

    private function flatten(array $array)
    {
        $return = [];
        array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
        return $return;
    }

    /**
     * Add new update handler(s) to the bot instance.
     *
     * @param array|Closure|string $handler string that represents `UpdateHandler` subclass resolution or closure function. You also may give an array to add multiple handlers.
     *
     * @throws TeleBotMehtodException
     */
    public function addHandler($handler)
    {
        if (is_array($handler)) {
            foreach ($handler as $sub) {
                $this->addHandler($sub);
            }
            return;
        }

        if (!$this->isUpdateHandler($handler)) {
            throw TeleBotMehtodException::wrongHandlerType(is_string($handler) ? $handler : gettype($handler));
        }

        if (is_subclass_of($handler, CommandHandler::class)) {
            $this->defaultCommands[] = $handler;
        }
        else {
            $this->handlers[] = $handler;
        }
    }

    /**
     * Get local bot instance commands registered by commands handlers.
     *
     * @return BotCommand[]
     */
    public function getCommands(string $scope = 'default')
    {
        $commands = [];
        foreach ($this->flatten($this->getScope($scope)) as $handler) {
            $commands = array_merge($commands, $handler::getBotCommand());
        }

        return $commands;
    }

    private function scope(string $scope)
    {
        return [
            'default'                   => 'defaultCommands',
            'all_private_chats'         => 'allPrivateChatsCommands',
            'all_group_chats'           => 'allGroupChatsCommands',
            'all_chat_administrators'   => 'allChatAdministratorsCommands',
            'chat'                      => 'chatCommands',
            'chat_administrators'       => 'chatAdministratorsCommands',
            'chat_member'               => 'chatMemberCommands',
        ][$scope] ?? null;
    }

    public function getScope(string $scope = 'default')
    {
        $scope = $this->scope($scope);
        return $this->$scope;
    }

    public function commandsDatasets()
    {
        $scopes = ['default', 'all_private_chats', 'all_group_chats', 'all_chat_administrators', 'chat', 'chat_administrators', 'chat_member'];
        $res = [];
        foreach ($scopes as $scope) {
            $commands = $this->getScope($scope);
            if (count($commands) == 0) continue;
            
            foreach ($this->extractCommands($commands) as $dataset) {
                $params = [ 'scope' => ['type' => $scope ] ];
                if (isset($dataset['params'][0])) $params['scope']['chat_id'] = $dataset['params'][0];
                if (isset($dataset['params'][1])) $params['scope']['user_id'] = $dataset['params'][1];

                $params['commands'] = $dataset['commands'];
                $res[] = $params;
            }
        }
        return $res;
    }

    private function extractCommands(array $commands, array $params = [], array &$res = [])
    {
        foreach ($commands as $key => $value) {
            if (is_array($value)) {
                $params[] = $key;
                $this->extractCommands($value, $params, $res);
                unset($commands[$key]);
            }
        }
        $out = [];
        foreach ($commands as $key => $value) {
            $out = array_merge($out, $value::getBotCommand());
        }
        if(count($out)) $res[] = ['params' => $params, 'commands' => $out];
        return $res;
    }

    private function isUpdateHandler($handler)
    {
        return is_callable($handler) || is_string($handler) && class_exists($handler) && is_subclass_of($handler, UpdateHandler::class);
    }
}