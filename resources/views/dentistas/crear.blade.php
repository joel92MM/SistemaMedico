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
                    <h3 class="mb-0">Nuevo dentista</h3>
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
            <form action="{{ url('/dentistas') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name"> Nombre del dentista</label>
                    <input type="text" name="name"class="form-control" placeholder="Introduce el nombre del dentista"
                        required value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                    <label for="especialidades">Especialidades</label>
                    <select name="especialidades[]" id="especialidades" class="form-control selectpicker"
                        data-style="btn-primary" title="Seleccionar especialidades" multiple required>
                        @foreach ($especialidades as $datosEspecialidad)
                            <option value="{{$datosEspecialidad->id}}">{{$datosEspecialidad->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email"> Email</label>
                    <input type="email" name="email" class="form-control"
                        placeholder="Introduce la descripcion del dentista" value="{{ old('email') }}" />
                </div>
                <div class="form-group">
                    <label for="dni"> DNI</label>
                    <input type="text" name="dni" class="form-control" placeholder="Introduce la fecha del dentista"
                        value="{{ old('dni') }}" />
                </div>
                <div class="form-group">
                    <label for="password"> Contraseña</label>
                    <input type="text" name="password" class="form-control"
                        placeholder="Introduce la contraseña del dentista" value="{{ old('password', Str::random(8)) }}" />
                </div>
                <div class="form-group">
                    <label for="direccionDentista"> Direccion del dentista</label>
                    <input type="text" name="direccionDentista" class="form-control"
                        placeholder="Introduce direccion del dentista" value="{{ old('direccionDentista') }}" />
                </div>
                <div class="form-group">
                    <label for="telefonoDentista"> Telefono del dentista</label>
                    <input type="number" name="telefonoDentista" class="form-control"
                        placeholder="Introduce el telefono del dentista" value="{{ old('telefonoDentista') }}" />
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Crear nuevo dentista</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
