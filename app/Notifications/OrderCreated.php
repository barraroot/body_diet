<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCreated extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pedido Body Diet')
                    ->greeting('Seu pedido Body Diet')
                    ->line($notifiable->nome . ' seu pedido da body diet encontra-se como "Pendente", para retornar ao seu carrinho e finalizar o pedido basta clicar no botão abaixo.')
                    ->action('Retornar ao meu carrinho', url('/retornar-carrinho/'. $notifiable->id))
                    ->salutation('Atenciosamente Body Diet');
    }
}
