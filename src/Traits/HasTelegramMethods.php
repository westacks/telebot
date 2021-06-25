<?php

namespace WeStacks\TeleBot\Traits;

use GuzzleHttp\Promise\PromiseInterface;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Chat;
use WeStacks\TeleBot\Objects\ChatMember;
use WeStacks\TeleBot\Objects\File;
use WeStacks\TeleBot\Objects\Games\GameHighScore;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\Poll;
use WeStacks\TeleBot\Objects\Stickers\StickerSet;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\Objects\UserProfilePhotos;
use WeStacks\TeleBot\Objects\WebhookInfo;

/**
 * This trait is a ralation layer to `TelegramMethod` classes.
 */
trait HasTelegramMethods
{
    /**
     * Bot methods relations.
     *
     * @return string|null
     */
    protected static function method(string $method)
    {
        $relations = [
            'deleteWebhook'                     => \WeStacks\TeleBot\Methods\DeleteWebhookMethod::class,
            'editMessageLiveLocation'           => \WeStacks\TeleBot\Methods\EditMessageLiveLocationMethod::class,
            'forwardMessage'                    => \WeStacks\TeleBot\Methods\ForwardMessageMethod::class,
            'getMe'                             => \WeStacks\TeleBot\Methods\GetMeMethod::class,
            'getUpdates'                        => \WeStacks\TeleBot\Methods\GetUpdatesMethod::class,
            'getWebhookInfo'                    => \WeStacks\TeleBot\Methods\GetWebhookInfoMethod::class,
            'sendAnimation'                     => \WeStacks\TeleBot\Methods\SendAnimationMethod::class,
            'sendAudio'                         => \WeStacks\TeleBot\Methods\SendAudioMethod::class,
            'sendContact'                       => \WeStacks\TeleBot\Methods\SendContactMethod::class,
            'sendDocument'                      => \WeStacks\TeleBot\Methods\SendDocumentMethod::class,
            'sendLocation'                      => \WeStacks\TeleBot\Methods\SendLocationMethod::class,
            'sendMediaGroup'                    => \WeStacks\TeleBot\Methods\SendMediaGroupMethod::class,
            'sendMessage'                       => \WeStacks\TeleBot\Methods\SendMessageMethod::class,
            'sendPhoto'                         => \WeStacks\TeleBot\Methods\SendPhotoMethod::class,
            'sendPoll'                          => \WeStacks\TeleBot\Methods\SendPollMethod::class,
            'sendVenue'                         => \WeStacks\TeleBot\Methods\SendVenueMethod::class,
            'sendVideo'                         => \WeStacks\TeleBot\Methods\SendVideoMethod::class,
            'sendVideoNote'                     => \WeStacks\TeleBot\Methods\SendVideoNoteMethod::class,
            'sendVoice'                         => \WeStacks\TeleBot\Methods\SendVoiceMethod::class,
            'setWebhook'                        => \WeStacks\TeleBot\Methods\SetWebhookMethod::class,
            'stopMessageLiveLocation'           => \WeStacks\TeleBot\Methods\StopMessageLiveLocationMethod::class,
            'sendDice'                          => \WeStacks\TeleBot\Methods\SendDiceMethod::class,
            'sendChatAction'                    => \WeStacks\TeleBot\Methods\SendChatActionMethod::class,
            'getUserProfilePhotos'              => \WeStacks\TeleBot\Methods\GetUserProfilePhotosMethod::class,
            'getFile'                           => \WeStacks\TeleBot\Methods\GetFileMethod::class,
            'editMessageText'                   => \WeStacks\TeleBot\Methods\EditMessageTextMethod::class,
            'editMessageCaption'                => \WeStacks\TeleBot\Methods\EditMessageCaptionMethod::class,
            'editMessageMedia'                  => \WeStacks\TeleBot\Methods\EditMessageMediaMethod::class,
            'editMessageReplyMarkup'            => \WeStacks\TeleBot\Methods\EditMessageReplyMarkupMethod::class,
            'stopPoll'                          => \WeStacks\TeleBot\Methods\StopPollMethod::class,
            'deleteMessage'                     => \WeStacks\TeleBot\Methods\DeleteMessageMethod::class,
            'setChatPermissions'                => \WeStacks\TeleBot\Methods\SetChatPermissionsMethod::class,
            'exportChatInviteLink'              => \WeStacks\TeleBot\Methods\ExportChatInviteLinkMethod::class,
            'setChatPhoto'                      => \WeStacks\TeleBot\Methods\SetChatPhotoMethod::class,
            'deleteChatPhoto'                   => \WeStacks\TeleBot\Methods\DeleteChatPhotoMethod::class,
            'setChatTitle'                      => \WeStacks\TeleBot\Methods\SetChatTitleMethod::class,
            'setChatDescription'                => \WeStacks\TeleBot\Methods\SetChatDescriptionMethod::class,
            'pinChatMessage'                    => \WeStacks\TeleBot\Methods\PinChatMessageMethod::class,
            'unpinChatMessage'                  => \WeStacks\TeleBot\Methods\UnpinChatMessageMethod::class,
            'getChat'                           => \WeStacks\TeleBot\Methods\GetChatMethod::class,
            'getChatAdministrators'             => \WeStacks\TeleBot\Methods\GetChatAdministratorsMethod::class,
            'getChatMembersCount'               => \WeStacks\TeleBot\Methods\GetChatMemberCountMethod::class,
            'getChatMemberCount'                => \WeStacks\TeleBot\Methods\GetChatMemberCountMethod::class,
            'getChatMember'                     => \WeStacks\TeleBot\Methods\GetChatMemberMethod::class,
            'setMyCommands'                     => \WeStacks\TeleBot\Methods\SetMyCommandsMethod::class,
            'getMyCommands'                     => \WeStacks\TeleBot\Methods\GetMyCommandsMethod::class,
            'deleteMyCommands'                  => \WeStacks\TeleBot\Methods\DeleteMyCommandsMethod::class,
            'sendSticker'                       => \WeStacks\TeleBot\Methods\SendStickerMethod::class,
            'getStickerSet'                     => \WeStacks\TeleBot\Methods\GetStickerSetMethod::class,
            'createChatInviteLink'              => \WeStacks\TeleBot\Methods\CreateChatInviteLinkMethod::class,
            'editChatInviteLink'                => \WeStacks\TeleBot\Methods\EditChatInviteLinkMethod::class,
            'revokeChatInviteLink'              => \WeStacks\TeleBot\Methods\RevokeChatInviteLinkMethod::class,
            // FIXME: next methods are untested
            'kickChatMember'                    => \WeStacks\TeleBot\Methods\BanChatMemberMethod::class,
            'banChatMember'                     => \WeStacks\TeleBot\Methods\BanChatMemberMethod::class,
            'unbanChatMember'                   => \WeStacks\TeleBot\Methods\UnbanChatMemberMethod::class,
            'restrictChatMember'                => \WeStacks\TeleBot\Methods\RestrictChatMemberMethod::class,
            'promoteChatMember'                 => \WeStacks\TeleBot\Methods\PromoteChatMemberMethod::class,
            'setChatAdministratorCustomTitle'   => \WeStacks\TeleBot\Methods\SetChatAdministratorCustomTitleMethod::class,
            'leaveChat'                         => \WeStacks\TeleBot\Methods\LeaveChatMethod::class,
            'setChatStickerSet'                 => \WeStacks\TeleBot\Methods\SetChatStickerSetMethod::class,
            'deleteChatStickerSet'              => \WeStacks\TeleBot\Methods\DeleteChatStickerSetMethod::class,
            'answerCallbackQuery'               => \WeStacks\TeleBot\Methods\AnswerCallbackQueryMethod::class,
            'createNewStickerSet'               => \WeStacks\TeleBot\Methods\CreateNewStickerSetMethod::class,
            'addStickerToSet'                   => \WeStacks\TeleBot\Methods\AddStickerToSetMethod::class,
            'setStickerPositionInSet'           => \WeStacks\TeleBot\Methods\SetStickerPositionInSetMethod::class,
            'deleteStickerFromSet'              => \WeStacks\TeleBot\Methods\DeleteStickerFromSetMethod::class,
            'setStickerSetThumb'                => \WeStacks\TeleBot\Methods\SetStickerSetThumbMethod::class,
            'answerInlineQuery'                 => \WeStacks\TeleBot\Methods\AnswerInlineQueryMethod::class,
            'sendInvoice'                       => \WeStacks\TeleBot\Methods\SendInvoiceMethod::class,
            'answerShippingQuery'               => \WeStacks\TeleBot\Methods\AnswerShippingQueryMethod::class,
            'answerPreCheckoutQuery'            => \WeStacks\TeleBot\Methods\AnswerPreCheckoutQueryMethod::class,
            'setPassportDataErrors'             => \WeStacks\TeleBot\Methods\SetPassportDataErrorsMethod::class,
            'sendGame'                          => \WeStacks\TeleBot\Methods\SendGameMethod::class,
            'setGameScore'                      => \WeStacks\TeleBot\Methods\SetGameScoreMethod::class,
            'getGameHighScores'                 => \WeStacks\TeleBot\Methods\GetGameHighScoresMethod::class,

            'close'                             => \WeStacks\TeleBot\Methods\CloseMethod::class,
            'logOut'                            => \WeStacks\TeleBot\Methods\LogOutMethod::class,
            'copyMessage'                       => \WeStacks\TeleBot\Methods\CopyMessageMethod::class,
            'unpinAllChatMessages'              => \WeStacks\TeleBot\Methods\UnpinAllChatMessagesMethod::class,
        ];
        return $relations[$method] ?? null;
    }
}
