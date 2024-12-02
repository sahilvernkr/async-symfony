<?php

namespace App\Message;

class PurchaseConfirmationNotification
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
