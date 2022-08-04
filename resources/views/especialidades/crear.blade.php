@extends('layouts.panel')

@section('content')
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nuevo tratamiento</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/especialidades')}}" class="btn btn-sm btn-success">
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
            <form  method="POST" action="{{url('/especialidades')}}">
                @csrf
                <div class="form-group">
                    <label for="name"> Nombre del tratamiento</label>
                    <input type="text" name="name"class="form-control" placeholder="Introduce el nombre del tratamiento" required  value="{{old('name')}}"/>
                </div>
                <div class="form-group">
                    <label for="descripcion"> Descripcion del tratamiento</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="Introduce la descripcion del tratamiento" value="{{old('descripcion')}}"/>
                </div>
                <div class="form-group">
                    <label for="fecha"> Fecha del tratamiento</label>
                    <input type="date" name="fecha" class="form-control" placeholder="Introduce la fecha del tratamiento" value="{{old('fecha')}}"/>
                </div>
                <div class="form-group">
                    <label for="piezas"> Piezas del producto</label>
                    <input type="number" name="piezas" class="form-control" placeholder="Introduce el numero de piezas del producto" value="{{old('piezas')}}"/>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Crear tratamiento nuevo</button>
            </form>
        </div>
      </div>

@endsection
