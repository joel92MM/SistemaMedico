 <?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use App\Models\Contacto;
// use App\Models\Paciente;
// use App\Http\Controllers\Controller;


// class PacienteController extends Controller
// {
//        protected $property;

//     /**
//      * Funcion constructor de genera datos
//      * @return void vincula con los datos
//      */
//     public function __construct(){
//         $this->middleware('auth');
//     }

//     /**
//      * Funcion que retorna la vista de especialidades con paginacion
//      * @return void vincula con la vista de especialidades
//      */
//     public function index(){
//         // vamos a inyectar los datos en esta vista
//         //$pacientes= Contacto::all();
//         $pacientes= Paciente::paginate(20);
//         //dd($pacientes);
//         return view('pacientes.mostrar',compact('pacientes'));
//     }
//     /**
//      * Show the form for creating a new resource.
//      *
//      *
//      */
//     public function crear(){
//         return view('pacientes.crear');
//     }


//  }

