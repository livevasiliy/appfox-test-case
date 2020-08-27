<?php

namespace App\Observers;

use App\CompanyPost;
use App\User;
use App\Jobs\NotifyNewPost;

class CompanyPostObserver
{
    /**
     * Handle the company post "created" event.
     *
     * @param  \App\CompanyPost  $companyPost
     * @return void
     */
    public function created(CompanyPost $companyPost)
    {
        $users = User::whereHasSubscribeOnNewPosts(true)->get();
        foreach ($users as $user) {
            NotifyNewPost::dispatch($user, $companyPost);
        }
    }

    /**
     * Handle the company post "updated" event.
     *
     * @param  \App\CompanyPost  $companyPost
     * @return void
     */
    public function updated(CompanyPost $companyPost)
    {
        //
    }

    /**
     * Handle the company post "deleted" event.
     *
     * @param  \App\CompanyPost  $companyPost
     * @return void
     */
    public function deleted(CompanyPost $companyPost)
    {
        //
    }

    /**
     * Handle the company post "restored" event.
     *
     * @param  \App\CompanyPost  $companyPost
     * @return void
     */
    public function restored(CompanyPost $companyPost)
    {
        //
    }

    /**
     * Handle the company post "force deleted" event.
     *
     * @param  \App\CompanyPost  $companyPost
     * @return void
     */
    public function forceDeleted(CompanyPost $companyPost)
    {
        //
    }
}
