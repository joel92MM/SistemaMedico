<?php

use App\Models\User;
use App\Models\Contacto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\dentista\HorarioController;
use App\Http\Controllers\administrador\ContactoController;
use App\Http\Controllers\administrador\DentistaController;
use App\Http\Controllers\administrador\SpecialityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Procederemos a crear un grupo de rutas middleware para el admin
Route::middleware(['auth', 'admin'])->group(function () {

    // Ruta de especialidades
    Route::get('/especialidades', [SpecialityController::class, 'index']);
    Route::get('/especialidades/crear', [SpecialityController::class, 'crear']);
    Route::get('/especialidades/{objetoEspecialidades}/editar', [SpecialityController::class, 'editar']);
    Route::post('/especialidades', [SpecialityController::class, 'enviarDatos']);
    // creamos esta ruta para actualizar los datos de la BBDD al editar, para ello creamos la siguiente ruta
    Route::put('/especialidades/{objetoEspecialidades}', [SpecialityController::class, 'actualizar']);
    // vamos a crear la peticion del boton eliminar, para al clickar sobre el boton eliminar borre los datos de la BBDD
    Route::delete('/especialidades/{objetoEspecialidades}', [SpecialityController::class, 'eliminar']);

    //Ruta pacientes
    // //mostramos la lista de pacientes
    // Route::get('/pacientes', [PacienteController::class, 'index']);
    //Route::get('/pacientes/crear', [PacienteController::class, 'crear']);
    Route::get('/pacientes', [ContactoController::class, 'index'])->name('pacientes.index');
    Route::get('/pacientes/crear', [ContactoController::class, 'crear']);
    Route::post('/pacientes', [ContactoController::class, 'store']);
    Route::get('/pacientes/{paciente}/editar', [ContactoController::class, 'editar']);
    Route::put('/pacientes/{paciente}', [ContactoController::class, 'actualizar']);
    Route::delete('/pacientes/{paciente}', [ContactoController::class, 'eliminar']);
    //Route::get('/buscar',[ContactoController::class, 'search']);
    Route::post('/pacientes/buscar', function () {
        $nombre = request('name');
        $email = request('email');
        if ($nombre) {
            $contactos = User::where('name', 'like', '%' . $nombre . '%')
                ->orderBy('name', 'asc')
                ->get();
        } elseif ($email) {
            $contactos = User::where('email', 'like', '%' . $email . '%')
                ->get();
        } else {
            $contactos = User::all();
        }
        return view('pacientes.buscar.index')->with('contactos', $contactos);
    });

    // Ruta dentista
    Route::get('/dentistas', [DentistaController::class, 'index']);
    Route::get('/dentistas/crear', [DentistaController::class, 'crear']);
    Route::post('/dentistas', [DentistaController::class, 'store']);
    Route::get('/dentistas/{dentista}/editar', [DentistaController::class, 'editar']);
    Route::put('/dentistas/{dentista}', [DentistaController::class, 'actualizar']);
    Route::delete('/dentistas/{dentista}', [DentistaController::class, 'eliminar']);
    Route::get('/dentistas/buscar', function () {
        $nombre = request('name');
        $email = request('email');
        $dni = request('dni');
        if ($nombre) {
            $dentistas = User::where('name', 'like', '%' . $nombre . '%')
                ->orderBy('name', 'asc')
                ->get();
        } elseif ($email) {
            $dentistas = User::where('email', 'like', '%' . $email . '%')
                ->get();
        } elseif ($dni) {
            $dentistas = User::where('dni', 'like', '%' . $dni . '%')
                ->get();
        } else {
            $dentistas = User::all();
        }
        return view('dentistas.buscar.index')->with('dentistas', $dentistas);
    });
});
//Procederemos a crear un grupo de rutas middleware para el admin
Route::middleware(['auth', 'dentista'])->group(function () {
    // Ruta para el horario
    Route::get('/horario', [HorarioController::class, 'edit']);
    Route::post('/horario', [HorarioController::class, 'store']);
});

//ruta para reservar citas
Route::get('/reservarcita/create', [CitaController::class, 'crear']);
Route::post('/miscitas', [CitaController::class, 'store']);

