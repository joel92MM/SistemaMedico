<?php

namespace App\Http\Controllers\Administrador;

use App\Models\Speciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialityController extends Controller
{
    protected $property;

    // /**
    //  * Funcion constructor de genera datos
    //  * @return void vincula con los datos
    //  */
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    /**
     * Funcion que retorna la vista de especialidades
     * @return void vincula con la vista de especialidades
     */
    public function index(){
        // vamos a inyectar los datos en esta vista
        $especialidades= Speciality::all();
        //dd($especialidades);
        return view('especialidades.index',compact('especialidades'));
    }

    /**
     * Funcion que va a crear un nuevo tratamiento en la vista del archivo crear
     * @return void crear un nuevo tratamiento
     */
    public function crear(){
        return view('especialidades.crear');
    }

    /**
     * Funcion en la cual vamos a crear un nuevo objeto de la clase modelo especialidades, donde llamaremos a los datos y luego los enviaremos a traves de una peticion
     * @param  mixed $request datos del modelo
     * @return void guardamos los datos del modelo para enviar mediante una peticion
     */
    public function enviarDatos(Request $request){
        //vamos a definir las reglas
        $rules=[
            'name'=>'required|min:3',
            'descripcion'=>'required|min:10|max:255',
            'fecha'=>'required',
            'piezas'=>'required|integer'
        ];
        //aqui definimos los mensajes para las reglas anteriores
        $messages=[
            'name.required'=>'El campo nombre debe tener valores.',
            'name.min'=>'El campo nombre debe de tener al menos 3 caracteres.',
            'descripcion.required'=>'El campo descripcion debe tener valores.',
            'descripcion.min'=>'El campo descripcion debe de tener al menos 20 caracteres.',
            'descripcion.max'=>'El campo descripcion debe tener un maximo de 255 valores.',
            'fecha.required'=>'El campo fecha debe de tener valores.',
            'piezas.required'=>'El campo piezas debe tener valores.',
            'piezas.min'=>'El campo piezas debe de ser entero.'
        ];
        //vamos a agregar las siguiente validaciones
        $this->validate($request,$rules, $messages);

        $especialidad = new Speciality();//creamos un nuevo objeto de la clase modelo
        $especialidad->name= $request->input('name');
        $especialidad->descripcion= $request->input('descripcion');
        $especialidad->fecha= $request->input('fecha');
        $especialidad->piezas= $request->input('piezas');
        $especialidad->save();

        // procederemos a crear las notificaciones para los mensajes de las acciones
        $notificaciones='La especialidad se ha creado correctamente.';

        return redirect('/especialidades')->with(compact('notificaciones'));

    }

    /**
     * Funcion que se encarga de editar un productos de la lista tratamientos
     * @param  mixed $objetoEspecialidades recibe un objeto de tratamiento
     * @return void edita el tratamiento que ha recibido por el objeto
     */
    public function editar(Speciality $objetoEspecialidades){
        return view('especialidades.editar',compact('objetoEspecialidades'));
    }

        /**
     * Funcion en la cual vamos a crear un nuevo objeto de la clase modelo especialidades, donde llamaremos a los datos y luego los enviaremos a traves de una peticion
     * @param  mixed $request datos del modelo
     * @return void guardamos los datos del modelo para enviar mediante una peticion
     */
    public function actualizar(Request $request, Speciality $objetoEspecialidades){
        //vamos a definir las reglas
        $rules=[
            'name'=>'required|min:3',
            'descripcion'=>'required|min:10|max:255',
            'fecha'=>'required',
            'piezas'=>'required|integer'
        ];
        //aqui definimos los mensajes para las reglas anteriores
        $messages=[
            'name.required'=>'El campo nombre debe tener valores.',
            'name.min'=>'El campo nombre debe de tener al menos 3 caracteres.',
            'descripcion.required'=>'El campo descripcion debe tener valores.',
            'descripcion.min'=>'El campo descripcion debe de tener al menos 20 caracteres.',
            'descripcion.max'=>'El campo descripcion debe tener un maximo de 255 valores.',
            'fecha.required'=>'El campo fecha debe de tener valores.',
            'piezas.required'=>'El campo piezas debe tener valores.',
            'piezas.min'=>'El campo piezas debe de ser entero.'
        ];
        //vamos a agregar las siguiente validaciones
        $this->validate($request,$rules, $messages);

        $objetoEspecialidades->name= $request->input('name');
        $objetoEspecialidades->descripcion= $request->input('descripcion');
        $objetoEspecialidades->fecha= $request->input('fecha');
        $objetoEspecialidades->piezas= $request->input('piezas');
        $objetoEspecialidades->save();

         // procederemos a crear las notificaciones para los mensajes de las acciones
         $notificaciones='La especialidad se ha actualizo correctamente.';

        return redirect('/especialidades')->with(compact('notificaciones'));
    }

    /**
     * Funcion que va a eliminar un tratamiento de la BBDD
     * @param  mixed $objetoEspecialidades recibe el objeto a eliminar de la BBDD
     * @return void elimina el tratamiento de la BBDD
     */
    public function eliminar(Speciality $objetoEspecialidades){
        $borrarTratamiento = $objetoEspecialidades->name;
        $objetoEspecialidades->delete();

        // procederemos a crear las notificaciones para los mensajes de las acciones
        $notificaciones='La especialidad '.$borrarTratamiento.' se ha borrado correctamente.';

        return redirect('/especialidades')->with(compact('notificaciones'));
    }
}
