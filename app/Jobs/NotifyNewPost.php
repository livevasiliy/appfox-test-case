<?php

namespace App\Jobs;

use App\CompanyPost;
use App\Notifications\NewPost;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyNewPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var \App\User */
    public $user;

    /** @var \App\CompanyPost */
    public $post;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param CompanyPost $post
     *
     * @return void
     */
    public function __construct(User $user, CompanyPost $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->notify(new NewPost($this->post));
    }
}
