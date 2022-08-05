<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;

use App\Models\Horario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HorarioController extends Controller{


    public function hours(Request $request){
        $rules =[
            'date'=>'required|date_format:"Y-m-d"',
            'dentista_id'=>'required|exists:users,id'
        ];
        $this->validate($request, $rules);

        $date = $request->input('date');
        $dateCarbon= new Carbon($date);
        // para saber los dias de la semana, hacemos lo siguiente
        $i=$dateCarbon->dayOfWeek;


        // a continuacion arreglamos el formato ya que carbon trae un formato diferente al establecido
        $day =($i==0 ? 6 : $i-1);
        $dentistaID=$request->input('dentista_id');
        dd($dentistaID);

        $horario =Horario::where('active',true)
        ->where ('dia',$day)
        ->where ('user_id',$dentistaID)
        ->first([
            'morning_start','morning_end',
            'afternoon_start','afternoon_end',
        ]);
        dd($horario);
        if(!$horario){
            return[];
        }
        $morningIntervalos =$this ->getIntervalos(
            $horario->morning_start,$horario->morning_end
        );
        $afternoonIntervalos =$this ->getIntervalos(
            $horario->afternoon_start,$horario->afternoon_end
        );

        $data =[];
        $data['morning']=$morningIntervalos;
        $data['afternoon']=$afternoonIntervalos;

        return $data;
    }
    private function getIntervalos($start, $end){
        $start = new Carbon($start);
        $end = new Carbon($end);

        $intervalos =[];
        while($start < $end){
            $intervalo =[];
            $intervalo['start']->$start->format("g:i A");
            $start ->addMinutes(30);
            $intervalo['end']->$start->format("g:i A");
            $intervalos[]=$intervalo;
        }
        return $intervalos;
    }
}
