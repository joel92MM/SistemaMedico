<?php

namespace App\Http\Controllers\Administrador;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Speciality;


class DentistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dentista =User::all();
        $dentista = User::dentistas()->paginate(10);

        //dd($dentista);
        return view('dentistas.index', compact('dentista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $especialidades = Speciality::all();
        return view('dentistas.crear', compact('especialidades'));


    }

    /**
     * funcion que guarda la informacion de un dentista creado
     *
     * @param  \Illuminate\Http\Request  $request recibe los datos de un dentista creado
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //dd($request->all());
        $reglas = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'required|regex:/^[0-9]{7,8}[A-Z]$/i',
            'direccionDentista' => 'nullable|min:6',
            'telefonoDentista' => 'required',
        ];
        $avisos = [
            'name.required' => 'El nombre del dentista es obligatorio',
            'name.min' => 'El nombre dentista debe tener más de 3 caracteres',
            'direccion.min' => 'La direccion del dentista debe tener más de 6 caracteres',
            'email.required' => 'El correo electronico del dentista es obligatorio',
            'email.email' => 'Ingresa una direccion de correo electronico valido',
            'dni.required' => 'El dni del dentista es obligatorio',
            'dni.regex' => 'La celula debe tener 8 digitos y un caracter',
            'telefonoDentista.required' => 'El telefono del dentista es obligatorio',
        ];
        $this->validate($request, $reglas, $avisos);

        $user= User::create(
            $request->only('name', 'email', 'dni', 'telefonoDentista', 'direccionDentista')
                + [
                    'role' => 'dentista',
                    'password' => bcrypt($request->input('password'))
                ]
        );

        $user->especialidades()->attach($request->input("especialidades"));
        $notificacion = 'El dentista se a creado correctamente';
        return redirect('/dentistas')->with(compact('notificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $dentista = User::Dentistas()->findOrFail($id);

        // $especialidades= ModeloEspecialidades::all();
        // $especialidad_id=$dentista->especialidades()->pluck('especialidades.id');
        return view('dentistas.editar', compact('dentista','especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {

        $reglas = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'required|regex:/^[0-9]{7,8}[A-Z]$/i',
            'direccionDentista' => 'nullable|min:6',
            'telefonoDentista' => 'required',
        ];
        $avisos = [
            'name.required' => 'El nombre del dentista es obligatorio',
            'name.min' => 'El nombre dentista debe tener más de 3 caracteres',
            'direccion.min' => 'La direccion del dentista debe tener más de 6 caracteres',
            'email.required' => 'El correo electronico del dentista es obligatorio',
            'email.email' => 'Ingresa una direccion de correo electronico valido',
            'dni.required' => 'El dni del dentista es obligatorio',
            'dni.regex' => 'La celula debe tener 8 digitos y un caracter',
            'telefonoDentista.required' => 'El telefono del dentista es obligatorio'
        ];
        $this->validate($request, $reglas, $avisos);
        $user = User::dentistas()->findOrFail($id);

        $datos = $request->only('name', 'email', 'dni', 'direccion', 'telefonoDentista', 'direccionDentista');
        $password = $request->input('password');
        if ($password) {
            $datos['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $user->fill($datos);
        $user->save();
        // $user->especialidades()->sync($request->input('especialidades'));
        $notificacion = 'La informacion del dentista se actualizo correctamente';
        return redirect('/dentistas')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $dentista = User::dentistas()->findOrFail($id);
        $NombreDentista = $dentista->name;
        $dentista->delete();

        $mensaje = "El dentista $NombreDentista se elimino correctamente";

        return redirect('/dentistas')->with(compact('mensaje'));
    }
}
