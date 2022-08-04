<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UsersTabkeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Joel',
            'email' => 'joel@roquark.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            // agregamos los nuevos campos
            'dni'=>'1233454353',
            'direccionDentista'=>'pepe rayuela',
            'telefonoDentista'=>'66632654',
            'role'=>'admin',

        ]);
        // creamos un usuario para dentistas
        User::create([
            'name' => 'dentista',
            'email' => 'dentista@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            // agregamos los nuevos campos
            'role'=>'dentista',

        ]);
        // creamos un usuario para pacientes
        User::create([
            'name' => 'paciente',
            'email' => 'paciente@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            // agregamos los nuevos campos
            'dni'=>'55555555u',
            'role'=>'paciente',

        ]);

        User::factory()
        ->count(50)

        ->create();
    }
}
