<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\TipoPerfilSeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PessoaSeeder;
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
            TipoPerfilSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            PessoaSeeder::class,
            CursoSeeder::class,
            DisciplinaSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
