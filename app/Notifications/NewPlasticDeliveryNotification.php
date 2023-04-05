<?php

namespace App\Notifications;

use App\Models\PlasticDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPlasticDeliveryNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public PlasticDelivery $plasticDelivery)
    {
        $this->onQueue('notifications');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nueva entrega de Plastico [' . $this->plasticDelivery->id . '] - Plasticoin')
            ->markdown('emails.new-plastic-delivery', [
                'plasticDelivery' => $this->plasticDelivery,
            ]);
    }
}
