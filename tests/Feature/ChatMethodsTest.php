<?php

namespace WeStacks\TeleBot\Tests\Feature;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Objects\Chat;
use WeStacks\TeleBot\Objects\ChatInviteLink;
use WeStacks\TeleBot\Objects\ChatMember;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\TeleBot;

class ChatMethodsTest extends TestCase
{
    /**
     * @var TeleBot
     */
    private $bot;

    protected function setUp(): void
    {
        $this->bot = get_bot();
    }

    public function testSetChatPermissions()
    {
        $set = $this->bot->setChatPermissions([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'permissions' => [
                'can_send_messages' => true,
            ],
        ]);

        $this->assertTrue($set);
    }

    public function testExportChatInviteLink()
    {
        $link = $this->bot->exportChatInviteLink([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
        ]);
        $this->assertNotFalse(filter_var($link, FILTER_VALIDATE_URL));
    }

    public function testSetChatPhoto()
    {
        $set = $this->bot->setChatPhoto([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'photo' => fopen('https://picsum.photos/640', 'r'),
        ]);

        $this->assertTrue($set);

        $deleted = $this->bot->deleteChatPhoto([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
        ]);

        $this->assertTrue($deleted);
    }

    public function testSetChatTitle()
    {
        $set = $this->bot->setChatTitle([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'title' => 'PHP TeleBot Test',
        ]);
        $this->assertTrue($set);
    }

    public function testSetChatDescription()
    {
        $set = $this->bot->setChatDescription([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'description' => 'PHP TeleBot Test '.rand(0, 200),
        ]);
        $this->assertTrue($set);
    }

    public function testPinChatMessage()
    {
        $message = $this->bot->sendMessage([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'text' => 'Test message to pin!',
        ]);
        $this->assertInstanceOf(Message::class, $message);

        $pinned = $this->bot->pinChatMessage([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'message_id' => $message->message_id,
        ]);
        $this->assertTrue($pinned);

        $unpinned = $this->bot->unpinChatMessage([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'message_id' => $message->message_id,
        ]);
        $this->assertTrue($unpinned);

        $unpinned = $this->bot->unpinAllChatMessages([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
        ]);
        $this->assertTrue($unpinned);
    }

    public function testGetChat()
    {
        $chat = $this->bot->getChat([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
        ]);
        $this->assertInstanceOf(Chat::class, $chat);

        $members = $this->bot->getChatAdministrators([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
        ]);
        $this->assertContainsOnlyInstancesOf(ChatMember::class, $members);

        $total = $this->bot->getChatMemberCount([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
        ]);
        $this->assertTrue(is_int($total));

        $member = $this->bot->getChatMember([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'user_id' => getenv('TELEGRAM_USER_ID'),
        ]);
        $this->assertInstanceOf(ChatMember::class, $member);
    }

    public function testInviteLinks()
    {
        $link = $this->bot->createChatInviteLink([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
        ]);

        $link = $this->bot->editChatInviteLink([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'invite_link' => $link->invite_link,
            'member_limit' => 1,
        ]);

        $link = $this->bot->revokeChatInviteLink([
            'chat_id' => getenv('TELEGRAM_CHAT_ID'),
            'invite_link' => $link->invite_link,
        ]);

        $this->assertInstanceOf(ChatInviteLink::class, $link);
    }
}
