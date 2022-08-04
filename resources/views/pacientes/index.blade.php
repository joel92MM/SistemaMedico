@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Pacientes</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/pacientes/crear') }}" class="btn btn-big btn-primary">Nueva paciente</a>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <form action="{{ url('/pacientes/buscar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12">
                    <div class="form-group">
                        <label>Buscar por:</label>
                        <select class="form-control" name="select" id="select">
                            <option value="opc1">Nombre</option>
                            <option value="opc2">Email</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="col-xl-6 celula d-inline ">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Texto a buscar" name="name" value="{{ $nombre ?? '' }}">
                    </div>

                    <div class="col-xl-6 cMail d-inline">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Correo a buscar" class="form-control" value="{{ $email ?? '' }}">
                    </div>
                    <div class="col-xl-6 text-right mt-2">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if (session('notificaciones'))
                <div class="alert alert-success" role="alert">
                    {{ session('notificaciones') }}
                </div>
            @endif
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr class=>
                        <th scope="col">Id paciente</th>
                        <th scope="col">Nombre del paciente</th>
                        <th scope="col">Direccion del paciente</th>
                        <th scope="col">Movil del paciente</th>
                        <th scope="col">Email del paciente</th>
                        <th scope="col">DNI del paciente</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $datosPacientes)
                        <tr>
                            <th scope="row">
                                {{ $datosPacientes->id }}
                            </th>
                            <th>
                                {{ $datosPacientes->name }}
                            </th>
                            <td>
                                {{ $datosPacientes->direccionDentista }}
                            </td>
                            <td>
                                {{ $datosPacientes->telefonoDentista }}
                            </td>
                            <td>
                                {{ $datosPacientes->email }}
                            </td>
                            <td>
                                {{ $datosPacientes->dni }}
                            </td>
                            <td>
                                <form action="{{ url('/pacientes/' . $datosPacientes->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/pacientes/' . $datosPacientes->id . '/editar') }}"
                                        class="btn btn-small btn-primary">Editar</a>
                                    <button type="submit" class="btn btn-small btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="btn-group mt-4 " role="group">
        {{ $pacientes->links('pagination::bootstrap-4')}}
      </div>
      <script>
        $('#select').on('change',function(){
        var selectValor = $(this).val();
        //alert (selectValor);

        if (selectValor == 'opc1') {
            $('.cedula').show();
            $('.cMail').hide();
        }else {
          $('.cedula').hide();
          $('.cMail').show();
            //alert('esta es la opcion 2')
        }
    }, false);
      </script>
@endsection
