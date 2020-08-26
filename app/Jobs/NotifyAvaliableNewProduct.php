<?php

namespace App\Jobs;

use App\Notifications\NewProduct;
use App\User;
use App\CompanyProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyAvaliableNewProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var \App\User */
    public $user;

    /** @var \App\CompanyProduct */
    public $product;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param CompanyProduct $product
     *
     * @return void
     */
    public function __construct(User $user, CompanyProduct $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->notify(new NewProduct($this->product));
    }
}
