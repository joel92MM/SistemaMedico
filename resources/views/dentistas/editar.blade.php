<?php
use Illuminate\Support\Str;
?>
@extends('layouts.panel')
@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar dentista</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/dentistas') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- definimos una condicion para mostrar los mensajes de los errores --}}
            @if ($errors->all())
                @foreach ($errors->all() as $errores)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Error -> </strong> {{ $errores }}

                    </div>
                @endforeach
            @endif
            <form action="{{ url('/dentistas/' . $dentista->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name"> Nombre</label>
                    <input type="text" name="name"class="form-control" placeholder="Introduce el nombre del dentista"
                        required value="{{ old('name', $dentista->name) }}" />
                </div>
                <div class="form-group">
                    <label for="especialidades">Especialidades</label>
                    <select name="especialidades[]" id="especialidades" class="form-control selectpicker"
                        data-style="btn-primary" title="Seleccionar especialidades" multiple required>
                        @foreach ($especialidades as $datosEspecialidad)
                            <option value="{{ $datosEspecialidad->id }}">{{ $datosEspecialidad->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email"> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Introduce el email del dentista"
                        value="{{ old('email', $dentista->email) }}" />
                </div>
                <div class="form-group">
                    <label for="dni"> DNI</label>
                    <input type="text" name="dni" class="form-control" placeholder="Introduce el dni del dentista"
                        value="{{ old('dni', $dentista->dni) }}" />
                </div>
                <div class="form-group">
                    <label for="telefonoDentista"> Telefono</label>
                    <input type="ttelefonoDentista" name="telefonoDentista" class="form-control"
                        placeholder="Introduce el telefono del dentista"
                        value="{{ old('telefonoDentista', $dentista->telefonoDentista) }}" />
                </div>
                <div class="form-group">
                    <label for="direccionDentista"> Direccion</label>
                    <input type="text" name="direccionDentista" class="form-control"
                        placeholder="Introduce la direccion del dentista"
                        value="{{ old('direccionoDentista', $dentista->direccionDentista) }}" />
                </div>
                <div class="form-group">
                    <label for="password"> Contraseña</label>
                    <input type="pasword" name="password" class="form-control"
                        placeholder="Introduce la contraseña del dentista" />
                    <small class="text-warning">Solo llena el campo si desea cambiar la contraseña</small>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar dentista</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(()=> {});
        $('#especialidades').selectpicker('val',@json($especialidad_id) );
    </script>
@endsection
