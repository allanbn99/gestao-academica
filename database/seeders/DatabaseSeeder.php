<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CursoSeeder;
use Database\Seeders\DisciplinaSeeder;

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
            RolePermissionSeeder::class,
            UserSeeder::class,
            CursoSeeder::class,
            DisciplinaSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
