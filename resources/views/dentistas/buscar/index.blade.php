@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="col text-right mt-2">
        <a href="{{url('/dentistas')}}" class="btn btn-big btn-success">
          <i class="fas fa-chevron-left"></i>
          Regresar al listado completo</a>
      </div>
    <div class="table-responsive mt-5">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr class=>
                    <th scope="col">Id paciente</th>
                    <th scope="col">Nombre del paciente</th>
                    <th scope="col">Direccion del paciente</th>
                    <th scope="col">Movil del paciente</th>
                    <th scope="col">Email del paciente</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dentistas as $datosDentistas)
                    <tr>
                        <th scope="row">
                            {{ $datosDentistas->id }}
                        </th>
                        <th>
                            {{ $datosDentistas->name }}
                        </th>
                        <td>
                            {{ $datosDentistas->direccionDentista }}
                        </td>
                        <td>
                            {{ $datosDentistas->telefonoDentista }}
                        </td>
                        <td>
                            {{ $datosDentistas->email }}
                        </td>
                        <td>
                            <form action="{{ url('/dentistas/' . $datosDentistas->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('/dentistas/' . $datosDentistas->id . '/editar') }}"
                                    class="btn btn-small btn-primary">Editar</a>
                                <button type="submit" class="btn btn-small btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td>
                        Paciente no encontrado
                    </td>
            </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- <div class="btn-group mt-4 " role="group">
        {{ $pacientes->links('pagination::bootstrap-4')}}
      </div> --}}
      </div>

@endsection

