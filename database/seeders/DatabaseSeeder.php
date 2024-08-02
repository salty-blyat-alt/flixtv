<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\OrderDetailSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            CustomerSeeder::class,
            OrderDetailSeeder::class,
            OrderSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
