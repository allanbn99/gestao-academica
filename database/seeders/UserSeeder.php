<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private const PASSWORD = '@Aa123456';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'        => 'tecnicoadministrativo@gestaoacademica.com.br',
            'password'     => Hash::make(self::PASSWORD),
            'is_activated' => 1,
        ])->assignRole('TecnicoAdministrativo');

        User::create([
            'email'        => 'coordenador@gestaoacademica.com.br',
            'password'     => Hash::make(self::PASSWORD),
            'is_activated' => 1,
        ])->assignRole('Coordenador');

        User::create([
            'email'        => 'professor@gestaoacademica.com.br',
            'password'     => Hash::make(self::PASSWORD),
            'is_activated' => 1,
        ])->assignRole('Professor');

        User::create([
            'email'        => 'aluno@gestaoacademica.com.br',
            'password'     => Hash::make(self::PASSWORD),
            'is_activated' => 1,
        ])->assignRole('Aluno');

        User::create([
            'email'        => 'allan.nascimento@mt.estudante.senai.br',
            'password'     => Hash::make('default'),
        ])->assignRole('TecnicoAdministrativo');
    }
}
