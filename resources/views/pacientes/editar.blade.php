<?php
    use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar pacientes</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/pacientes')}}" class="btn btn-sm btn-success">
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
                        <strong>Error -> </strong> {{$errores}}

                    </div>
                @endforeach
            @endif
            <form action="{{url('/pacientes/'.$paciente->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name"> Nombre</label>
                    <input type="text" name="name"class="form-control" placeholder="Introduce el nombre del paciente" required  value="{{old('name',$paciente->name)}}"/>
                </div>
                <div class="form-group">
                    <label for="email"> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Introduce el email del paciente" value="{{old('email',$paciente->email)}}"/>
                </div>
                <div class="form-group">
                    <label for="dni"> DNI</label>
                    <input type="text" name="dni" class="form-control" placeholder="Introduce el dni del paciente" value="{{old('dni',$paciente->dni)}}"/>
                </div>
                <div class="form-group">
                    <label for="telefonoDentista"> Telefono</label>
                    <input type="ttelefonoDentista" name="telefonoDentista" class="form-control" placeholder="Introduce el telefono del paciente" value="{{old('telefonoDentista',$paciente->telefonoDentista)}}"/>
                </div>
                <div class="form-group">
                    <label for="direccionPaciente"> Direccion</label>
                    <input type="text" name="direccionPaciente" class="form-control" placeholder="Introduce la direccion del paciente" value="{{old('direccionPaciente',$paciente->direccionDentista)}}"/>
                </div>
                <div class="form-group">
                    <label for="password"> Contraseña</label>
                    <input type="pasword" name="password" class="form-control" placeholder="Introduce la contraseña del paciente"/>
                    <small class="text-warning">Solo llena el campo si desea cambiar la contraseña</small>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar paciente</button>
            </form>
        </div>
      </div>
@endsection
