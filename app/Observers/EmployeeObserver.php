<?php

namespace App\Observers;

use App\Employee;

class EmployeeObserver
{
    /**
     * Handle the employee "creating" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function creating(Employee $employee)
    {
        $employee->user()->update([
            'has_subscribe_on_new_posts' => true,
            'has_subscribe_on_new_products' => true
        ]);
    }

    /**
     * Handle the employee "updated" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "deleted" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "restored" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "force deleted" event.
     *
     * @param Employee $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        //
    }
}
