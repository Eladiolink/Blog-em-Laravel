<?php

namespace Database\Seeders;

use App\Models\{Categories,Posts};
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
        //\App\Models\User::factory(10)->create();
         Categories::factory(10)->create();
         Posts::factory(1000)->create();
    }
}
