<?php
namespace App\Http\Controllers\Dentista;

use Carbon\Carbon;
use App\Models\Horarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HorarioController extends Controller{


        private $days=[
            'Lunes','Martes','Miercoles','Jueves','Viernes','Sábado'
        ];

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(){

        // si existe un horario se muestra el horario y si no se muestra el de por defecto
         $horarios= Horarios::where('user_id',auth()->id())->get();
         if(count($horarios)>0){
            $horarios->map(function($horarios){
                $horarios->morning_start = (new Carbon($horarios->morning_start))->format('g:i A');
                $horarios->morning_end = (new Carbon($horarios->morning_end))->format('g:i A');
                $horarios->afternoon_start = (new Carbon($horarios->afternoon_start))->format('g:i A');
                $horarios->afternoon_end = (new Carbon($horarios->afternoon_end))->format('g:i A');
               });
        }else{
            $horarios =collect();
            for ($i=0; $i < 6; $i++) {
                $horarios->push(new Horarios());
            }
        }

        // llamamos al array privado con los dias de la semana
        $days =$this->days;
        //dd($horarios->toArray());
        return view('horario',compact('days','horarios'));
        //return view('horario',compact('days'));
    }
    public function store(Request $request){

         $active=$request->input('active') ?: [];//si no hay un active en la variable se le agrega un array vacio
         $morning_start=$request->input('morning_start');
         $morning_end=$request->input('morning_end');
         $afternoon_start=$request->input('afternoon_start');
         $afternoon_end=$request->input('afternoon_end');

         $errors =[];
        for ($i=0; $i < 6; $i++) {
            // agregamos las condiciones para el buble for para que se muestran los mensajes del intervalo, notificando si es correcto
            if($morning_start[$i]> $morning_end[$i]){
                $errors [] ='El intervalo de las horas del turno de mañana no coincide, en el día  '.$this->days[$i].'.';
            }
            if($afternoon_start[$i]> $afternoon_end[$i]){
                $errors [] ='El intervalo de las horas del turno de tarde no coincide, en el día  '.$this->days[$i].'.';
            }
           Horarios::updateOrCreate(
                // estos atributos que vamos a definir a continuacion nos van a permitir buscar en la tabla para hacer cambios
                [
                    'dia'=>$i,
                    'user_id'=>auth()->id()
                ],
                // campos que se van a actualizar
                [
                    'active'=>in_array($i,$active),
                    'morning_start'=>$morning_start[$i],
                    'morning_end'=>$morning_end[$i],
                    'afternoon_start'=>$afternoon_start[$i],
                    'afternoon_end'=>$afternoon_end[$i],
                 ]
            );


        }
        // si la cantidad de errores es mayor a 0 mostraremos los mensajes
        if(count($errors)>0){
            return back()->with(compact("errors"));
        }
        //retornara la variable en la vista
        $notificaciones ='Los cambios se han guardado correctamente';
        return back()->with(compact('notificaciones'));
     }
}
