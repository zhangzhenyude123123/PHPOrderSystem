<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserve;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Reserve::factory(10)->create();
    }
}
