<?php

namespace App\MessageHandler;

use App\Message\PurchaseConfirmationNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class PurchaseConfirmationNotificationHandler
{
    public function __invoke(PurchaseConfirmationNotification $notification)
    {
        // 1. create a PDF contract note
        echo "creating a PDF contract note...<br>";
        
        // 2. Email the contract note to the buyer 
        echo "Emailing contract note to " . $notification->getOrder()->getBuyer()->getEmail() . '<br>';
    }
}
