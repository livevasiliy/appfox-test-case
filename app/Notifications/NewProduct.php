<?php

namespace App\Notifications;

use App\CompanyProduct;
use Illuminate\Bus\Queueable;
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
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'message' => "Доступен новый товар: {$this->product->name}",
            'typeNotify' => 'new_product',
            'url' => route('products.show', ['id' => $this->product->id])
        ];
    }
}
