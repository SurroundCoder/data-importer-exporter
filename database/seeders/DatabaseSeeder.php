<?php

namespace Database\Seeders;

use App\Models\EndUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        EndUser::factory()->count(10)->create();
    }
}
