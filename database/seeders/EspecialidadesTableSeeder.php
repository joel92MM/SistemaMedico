<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speciality;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crearemos un array de especialidades
        $especialidades =[
            'Odontología general.',
            'Odontopediatría',
            'Endodoncia',
            'Cirugía maxilofacial y oral.',
            'Radiología maxilofacial y oral.',
            'Periodoncia',
            'Prostodoncia'
        ];

        foreach($especialidades as $especialidad){
            Speciality::create([
                'name'=>$especialidad
            ]);
        }
    }
}
