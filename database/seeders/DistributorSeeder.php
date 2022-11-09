<?php

namespace Database\Seeders;

use App\Models\Distributors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Distributor::factory()
        ->times(4)
        ->hasComics(5)
        ->create();
    }
}
