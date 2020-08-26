<?php

namespace App\Notifications;

use App\CompanyPost;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewPost extends Notification
{
    use Queueable;

    /** @var \App\CompanyPost */
    public $post;


    /**
     * Create a new notification instance.
     *
     * @param CompanyPost $post
     *
     * @return void
     */
    public function __construct(CompanyPost $post)
    {
        $this->post = $post;
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
            'message' => "Новый пост: {$this->post->title}",
            'typeNotify' => 'new_post',
            'url' => route('posts.show', ['id' => $this->post->id])
        ];
    }
}
