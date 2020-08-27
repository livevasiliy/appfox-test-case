<?php

namespace App\Notifications;

use App\CompanyProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class NewProduct extends Notification
{
    use Queueable;

    /** @var \App\CompanyProduct */
    public $product;

    /**
     * Create a new notification instance.
     *
     * @param CompanyProduct $product
     *
     * @return void
     */
    public function __construct(CompanyProduct $product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'message' => "Доступен новый товар: {$this->product->name}",
            'typeNotify' => 'new_product',
            'url' => route('products.show', ['product' => $this->product->id])
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => "Доступен новый товар: {$this->product->name}",
            'typeNotify' => 'new_product',
            'url' => route('products.show', ['product' => $this->product->id])
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
