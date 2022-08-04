<?php

namespace App\Http\Controllers\Administrador;

use App\Models\User;
use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactoController extends Controller
{

    /**
     * Funcion constructor de genera datos
     * @return void vincula con los datos
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Funcion que retorna la vista de especialidades
     * @return void vincula con la vista de especialidades
     */
    public function index(){
        // vamos a inyectar los datos en esta vista
        //$pacientes = Contacto::all();

        //$pacientes2 = Contacto::paginate(20);
        $pacientes = User::patients()->paginate(10);
        //dd($pacientes);
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Funcion que va a crear un nuevo tratamiento en la vista del archivo crear
     * @return void crear un nuevo tratamiento
     */
    public function crear(){
        return view('pacientes.crear');
    }

    /**
     * Funcion con el metodo store se encarga de guardar la informacion en la base de datos
     * @param  mixed $request informacion del objeto
     * @return void
     */
    public function store(Request $request){
        $reglas=[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'dni'=>'required|regex:/^[0-9]{7,8}[A-Z]$/i',
            'direccionDentista'=>'nullable|min:6',
            'telefonoDentista'=>'required',
        ];
        $avisos=[
            'name.required'=>'El nombre del Paciente es obligatorio',
            'name.min'=>'El nombre Paciente debe tener más de 3 caracteres',
            'direccionDentista.min'=>'La direccion del Paciente debe tener más de 6 caracteres',
            'email.required'=>'El correo electronico del Paciente es obligatorio',
            'email.email'=>'Ingresa una direccion de correo electronico valido',
            'dni.required'=>'El dni del Paciente es obligatorio',
            'dni.regex'=>'La celula debe tener 8 digitos y un caracter',
            'telefonoDentista.required'=>'El telefono del Paciente es obligatorio',
        ];
        $this -> validate($request,$reglas,$avisos);
        // $pacientes = new User(); //creamos un nuevo objeto de la clase modelo
        // $pacientes->name = $request->input('name');
        // $pacientes->direccionDentista = $request->input('direccionPaciente');
        // $pacientes->telefonoDentista = $request->input('telefonoPaciente');
        // $pacientes->email = $request->input('email');
        // $pacientes->save();
        User::create(
            $request->only('name','email','dni','telefonoDentista','direccionDentista')
            +[
                'role'=>'paciente',
                'password'=>bcrypt($request->input('password'))
            ]
            );
        // procederemos a crear las notificaciones para los mensajes de las acciones
        $notificaciones = 'La especialidad se ha creado correctamente.';

        return redirect('/pacientes');
    }

    // public function search(Request $request){
    //   $busquedaTexto=$_GET['nombre'];
    //   $contactos=Contacto::where('name','LIKE','%'.$busquedaTexto.'%')->get();

    //   return view('buscar.index',compact('contactos'));
    // }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id){
        $paciente=User::Patients()->findOrFail($id);

        return view('pacientes.editar', compact('paciente'));
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id){

        $reglas=[
          'name'=>'required|min:3',
          'email'=>'required|email',
          'dni'=>'required|regex:/^[0-9]{7,8}[A-Z]$/i',
          'direccionDentista'=>'nullable|min:6',
          'telefonoDentista'=>'required',
      ];
      $avisos=[
          'name.required'=>'El nombre del dentista es obligatorio',
          'name.min'=>'El nombre dentista debe tener más de 3 caracteres',
          'direccion.min'=>'La direccion del dentista debe tener más de 6 caracteres',
          'email.required'=>'El correo electronico del dentista es obligatorio',
          'email.email'=>'Ingresa una direccion de correo electronico valido',
          'dni.required'=>'El dni del dentista es obligatorio',
          'dni.regex'=>'La celula debe tener 8 digitos y un caracter',
          'telefonoDentista.required'=>'El telefono del dentista es obligatorio'
      ];
      $this -> validate($request,$reglas,$avisos);
      $user =User::patients()->findOrFail($id);

      $datos=$request->only('name','email','dni','direccion','telefonoDentista','direccionDentista');
      $password=$request->input('password');
      if($password){
          $datos['password']=password_hash($password,PASSWORD_DEFAULT);
      }

      $user->fill($datos);
      $user->save();
      $notificacion='La informacion del paciente se actualizo correctamente';
      return redirect('/pacientes')->with(compact('notificacion'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function eliminar($id){
      $paciente = User::patients()->findOrFail($id);
      $NombrePaciente=$paciente->name;
      $paciente->delete();

      $mensaje="El paciente $NombrePaciente se elimino correctamente";

      return redirect('/pacientes')->with(compact('mensaje'));

  }

}
