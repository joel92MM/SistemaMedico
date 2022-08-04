@extends('layouts.panel')

@section('content')
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            {{-- <div class="col">
              <h3 class="mb-0">Nuevo paciente</h3>
            </div> --}}
            <div class="col text-right">
              <a href="{{url('/pacientes')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
        </div>
        <div class="card-body">
            {{-- definimos una condicion para mostrar los mensajes de los errores--}}
            @if ($errors->all())
                @foreach ($errors->all() as $errores)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Error -> </strong> {{$errores}}

                    </div>
                @endforeach
            @endif
            <form method="POST" action="{{url('/pacientes')}}">
                @csrf
                <div class="form-group">
                    <label for="name"> Nombre del paciente</label>
                    <input type="text" name="name"class="form-control" placeholder="Introduce el nombre del tratamiento" required  />
                </div>
                <div class="form-group">
                    <label for="direccionDentista"> Direccion del paciente</label>
                    <input type="text" name="direccionDentista" class="form-control" placeholder="Introduce la direccion del paciente" />
                </div>
                <div class="form-group">
                    <label for="telefonoDentista">Movil del paciente</label>
                    <input type="string" name="telefonoDentista" class="form-control" placeholder="Introduce el telefono del paciente" />
                </div>
                <div class="form-group">
                    <label for="email"> Email del paciente</label>
                    <input type="email" name="email" class="form-control" placeholder="Introduce el email del paciente" />
                </div>
                <div class="form-group">
                    <label for="password"> Contraseña</label>
                    <input type="text" name="password" class="form-control" placeholder="Introduce la contraseña del dentista" value="{{old('password',Str::random(8))}}"/>
                </div>
                <div class="form-group">
                    <label for="dni"> DNI</label>
                    <input type="text" name="dni" class="form-control" placeholder="Introduce la fecha del dentista" />
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Crear paciente nuevo</button>
            </form>
        </div>
      </div>

@endsection
