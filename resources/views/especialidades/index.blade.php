@extends('layouts.panel')

@section('content')
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Tratamientos</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/especialidades/crear')}}" class="btn btn-sm btn-primary">Nueva tratamiento</a>
            </div>
          </div>
        </div>
        <div class="card-body">
            @if (session('notificaciones'))
                <div class="alert alert-success" role="alert">
                    {{session('notificaciones')}}
                </div>
            @endif
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr class=>
                <th scope="col">ID Tratamiento</th>
                <th scope="col">Nombre del tratamiento</th>
                <th scope="col">Descripción del tratamiento</th>
                <th scope="col">Fecha</th>
                <th scope="col">Piezas</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($especialidades as $datosEspecialidades)
              <tr>
                <th scope="row">
                    {{$datosEspecialidades->id}}
                  </th>
                <th>
                  {{$datosEspecialidades->name}}
                </th>
                <td>
                    {{$datosEspecialidades->descripcion}}
                </td>
                <td>
                    {{$datosEspecialidades->fecha}}
                  </td>
                  <td>
                    {{$datosEspecialidades->piezas}}
                  </td>
                <td>
                    <form action="{{url('/especialidades/'.$datosEspecialidades->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{url('/especialidades/'.$datosEspecialidades->id.'/editar')}}" class="btn btn-small btn-primary">Editar</a>
                        <button type="submit" class="btn btn-small btn-danger">Eliminar</button>
                    </form>

                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>
      </div>

@endsection
