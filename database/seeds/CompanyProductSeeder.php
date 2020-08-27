<?php

use App\CompanyProduct;
use Illuminate\Database\Seeder;

class CompanyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CompanyProduct::class, 1)->create();
    }
}
