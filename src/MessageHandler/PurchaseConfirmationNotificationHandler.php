<?php

namespace App\MessageHandler;

use App\Message\PurchaseConfirmationNotification;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class PurchaseConfirmationNotificationHandler
{   
    public function __construct(private MailerInterface $mailer)
    {
        
    }

    public function __invoke(PurchaseConfirmationNotification $notification)
    {
        // 1. create a PDF contract note
        echo "creating a PDF contract note...<br>";

        $email = (new Email())
            ->from('sales@stickapp.com')
            ->to($notification->getOrder()->getBuyer()->getEmail())
            ->subject('Contract note for order' . $notification->getOrder()->getBuyer()->getId())
            ->text('Here is your contract note');

        $this->mailer->send($email);
    }
}
