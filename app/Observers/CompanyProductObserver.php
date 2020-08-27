<?php

namespace App\Observers;

use App\CompanyProduct;
use App\Jobs\NotifyAvaliableNewProduct;
use App\User;

class CompanyProductObserver
{
    /**
     * Handle the company product "created" event.
     *
     * @param  \App\CompanyProduct  $companyProduct
     * @return void
     */
    public function created(CompanyProduct $companyProduct)
    {
        $users = User::whereHasSubscribeOnNewProducts(true)->get();
        foreach ($users as $user) {
            NotifyAvaliableNewProduct::dispatch($user, $companyProduct);
        }
    }

    /**
     * Handle the company product "updated" event.
     *
     * @param  \App\CompanyProduct  $companyProduct
     * @return void
     */
    public function updated(CompanyProduct $companyProduct)
    {
        //
    }

    /**
     * Handle the company product "deleted" event.
     *
     * @param  \App\CompanyProduct  $companyProduct
     * @return void
     */
    public function deleted(CompanyProduct $companyProduct)
    {
        //
    }

    /**
     * Handle the company product "restored" event.
     *
     * @param  \App\CompanyProduct  $companyProduct
     * @return void
     */
    public function restored(CompanyProduct $companyProduct)
    {
        //
    }

    /**
     * Handle the company product "force deleted" event.
     *
     * @param  \App\CompanyProduct  $companyProduct
     * @return void
     */
    public function forceDeleted(CompanyProduct $companyProduct)
    {
        //
    }
}
