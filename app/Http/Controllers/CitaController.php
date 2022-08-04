<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class CitaController extends Controller{

    public function crear(){
        // variable que guarda todas las especialidades de un dentista
        $especialidades=Speciality::all();


        return view('cita.crear',compact('especialidades'));
    }
}
