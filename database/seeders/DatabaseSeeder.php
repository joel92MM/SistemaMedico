<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ContactoSeeder;
use Database\Seeders\UsersTabkeSeeder;
use Database\Seeders\EspecialidadesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //para que se importe el fichero json, llamamos al seeder con los datos
        $this->call(ContactoSeeder::class);
        $this->call(UsersTabkeSeeder::class);
        $this->call(EspecialidadesTableSeeder::class);
    }
}
