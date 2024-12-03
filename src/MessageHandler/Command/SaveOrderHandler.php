<?php

namespace App\MessageHandler\Command;

use App\Message\Command\SaveOrder;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SaveOrderHandler 
{

    public function __invoke(SaveOrder $saveOrder)
    {
        // save order to database

        $orderid = 123;
        echo 'Order being saved' . PHP_EOL;

        // Dispatch an event message on event bus
    }
}
