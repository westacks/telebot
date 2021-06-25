<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\BotCommandScope;
use WeStacks\TeleBot\Objects\BotCommandScope\BotCommandScopeAllChatAdministrators;
use WeStacks\TeleBot\Objects\BotCommandScope\BotCommandScopeAllGroupChats;
use WeStacks\TeleBot\Objects\BotCommandScope\BotCommandScopeAllPrivateChats;
use WeStacks\TeleBot\Objects\BotCommandScope\BotCommandScopeChat;
use WeStacks\TeleBot\Objects\BotCommandScope\BotCommandScopeChatAdministrators;
use WeStacks\TeleBot\Objects\BotCommandScope\BotCommandScopeChatMember;
use WeStacks\TeleBot\Objects\BotCommandScope\BotCommandScopeDefault;

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
        $this->expectException(TeleBotObjectException::class);
        BotCommandScope::create(['type' => 'some_wrong_type']);
    }
}
