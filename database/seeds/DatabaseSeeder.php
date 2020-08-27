<?php

use App\CompanyPost;
use App\CompanyProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanySeeder::class);
        factory(App\CompanyPost::class, 10)->create();
        factory(CompanyProduct::class, 10)->create();
        factory(\App\User::class, 5)->create();
        factory(\App\Employee::class, 20)->create();
    }
}
