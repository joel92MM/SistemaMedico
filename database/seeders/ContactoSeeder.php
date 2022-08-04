<?php

namespace Database\Seeders;

use App\Models\Contacto;
use App\Models\Paciente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('contactos')->delete();
        $ficheroJson=File::get('database/datosJson/contactos.json');//obtengo los datos del fichero
        $datos=json_decode($ficheroJson);
        //recorro la variable con el array de datos del fichero
        foreach($datos as $datosDentistas){
            Contacto::create(array(
                'name'=>$datosDentistas->Nombre.' '.$datosDentistas->Apellidos,//concateno el nombre y los apellidos de las tablas en la variable name
                'direccion'=>$datosDentistas->Dirección.' '.$datosDentistas->Población,
                'movil'=>$datosDentistas->Móvil,
                'telefono'=>$datosDentistas->Teléfono,
                'email'=>$datosDentistas->Email
            ));
        }

    }
    // public function run(){
    //     DB::table('contactos')->delete();
    //     $ficheroJson=File::get('database/datosJson/contactos.json');//obtengo los datos del fichero
    //     $datos=json_decode($ficheroJson);
    //     //recorro la variable con el array de datos del fichero
    //     foreach($datos as $datosDentistas){
    //         Paciente::create(array(
    //             'name'=>$datosDentistas->Nombre.' '.$datosDentistas->Apellidos,//concateno el nombre y los apellidos de las tablas en la variable name
    //             'direccion'=>$datosDentistas->Dirección.' '.$datosDentistas->Población,
    //             'movil'=>$datosDentistas->Móvil,
    //             'telefono'=>$datosDentistas->Teléfono,
    //             'email'=>$datosDentistas->Email
    //         ));
    //     }
    //     //
    // }
}
