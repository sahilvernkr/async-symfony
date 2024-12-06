<?php

namespace App\MessageHandler\Event;

use Mpdf\Mpdf;
use RuntimeException;
use Symfony\Component\Mime\Email;
use App\Message\Event\OrderSavedEvent;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class OrderSavedEventHandler
{
    public function __construct(private MailerInterface $mailer) {}

    public function __invoke(OrderSavedEvent $event)
    {
        //attempt to retrieve an order from MongoDB
        throw new RuntimeException('ORDER COULD NOT BE FOUND');

        // 1. create a PDF contract note

        $mpdf = new Mpdf();
        $content = "<h1>Contract Note For Order {$event->getOrderId()}</h1>";
        $content .= '<p>Total: <b>$1453.12</b></p>';
        $mpdf->WriteHTML($content);
        $contractNotePdf = $mpdf->output('', 'S');

        $email = (new Email())
            ->from('sales@stickapp.com')
            ->to('sahil@test.com')
            ->subject('Contract note for order' . $event->getOrderId())
            ->text('Here is your contract note')
            ->attach($contractNotePdf, 'contract-note.pdf');

        $this->mailer->send($email);
    }
}
