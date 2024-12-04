<?php

namespace App\Message\Event;

class OrderSavedEvent
{

    public function __construct(private int|string $orderId) {}

    /**
     * Get the value of order
     */
    public function getOrderId(): int|string
    {
        return $this->orderId;
    }
}
