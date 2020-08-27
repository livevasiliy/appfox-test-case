<?php

use Illuminate\Database\Seeder;

class CompanyPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CompanyPost::class, 1)->create();
    }
}
