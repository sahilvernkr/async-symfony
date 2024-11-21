<?php

namespace App\Controller;

use App\Message\PurchaseConfirmationNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class StockTransactionController extends AbstractController
{
    //buy
    #[Route('/buy', name: 'buy-stock')]
    public function buy(MessageBusInterface $bus)
    {
        //$notification->getOrder()->getBuyer()->getEmail()
        $order = new class{
            public function getBuyer(): object
            {
                return new class {
                    public function getEmail(): string
                    {
                        return 'sahil@test.com';
                    }
                };
            }
        };


        //dispatch confimation message
        $bus->dispatch(new PurchaseConfirmationNotification($order));

        //display confirmation to user
        
    }
}
