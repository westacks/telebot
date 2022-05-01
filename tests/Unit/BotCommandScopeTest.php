<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Objects\BotCommandScope;
use WeStacks\TeleBot\Objects\BotCommandScopeAllChatAdministrators;
use WeStacks\TeleBot\Objects\BotCommandScopeAllGroupChats;
use WeStacks\TeleBot\Objects\BotCommandScopeAllPrivateChats;
use WeStacks\TeleBot\Objects\BotCommandScopeChat;
use WeStacks\TeleBot\Objects\BotCommandScopeChatAdministrators;
use WeStacks\TeleBot\Objects\BotCommandScopeChatMember;
use WeStacks\TeleBot\Objects\BotCommandScopeDefault;

class BotCommandScopeTest extends TestCase
{
    public function testBotCommandScope()
    {
        $object = BotCommandScope::create(['type' => 'default']);
        $this->assertInstanceOf(BotCommandScopeDefault::class, $object);

        $object = BotCommandScope::create(['type' => 'all_private_chats']);
        $this->assertInstanceOf(BotCommandScopeAllPrivateChats::class, $object);

        $object = BotCommandScope::create(['type' => 'all_group_chats']);
        $this->assertInstanceOf(BotCommandScopeAllGroupChats::class, $object);

        $object = BotCommandScope::create(['type' => 'all_chat_administrators']);
        $this->assertInstanceOf(BotCommandScopeAllChatAdministrators::class, $object);

        $object = BotCommandScope::create(['type' => 'chat']);
        $this->assertInstanceOf(BotCommandScopeChat::class, $object);

        $object = BotCommandScope::create(['type' => 'chat_administrators']);
        $this->assertInstanceOf(BotCommandScopeChatAdministrators::class, $object);

        $object = BotCommandScope::create(['type' => 'chat_member']);
        $this->assertInstanceOf(BotCommandScopeChatMember::class, $object);
    }

    public function testWrongBotCommandScope()
    {
        $this->expectException(TeleBotException::class);
        BotCommandScope::create(['type' => 'some_wrong_type']);
    }
}
