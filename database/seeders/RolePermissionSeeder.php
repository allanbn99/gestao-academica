<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ROLES */
        $tecnicoAdministrativo = Role::create(['name' => 'TecnicoAdministrativo']);
        $coordenador           = Role::create(['name' => 'Coordenador']);
        $professor             = Role::create(['name' => 'Professor']);
        $aluno                 = Role::create(['name' => 'Aluno']);

        /* PERMISSIONS */
        //Home
        Permission::create(['name' => 'home'])->syncRoles([
            $tecnicoAdministrativo,
            $coordenador,
            $professor,
            $aluno,
        ]);
    }
}
