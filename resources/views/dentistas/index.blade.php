@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Dentistas</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/dentistas/crear') }}" class="btn btn-md btn-primary">Nuevo dentista</a>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <form action="{{ url('/dentistas/buscar') }}" method="get" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" placeholder="Texto a buscar" name="name"
                            value="{{ $nombre ?? '' }}">
                    </div>
                    <div class="col-xl-6 celula d-inline ">
                        <label>DNI</label>
                        <input type="text" class="form-control" placeholder="DNI a buscar" name="dni"
                            value="{{ $dni ?? '' }}">
                    </div>
                    <div class="col-xl-6 cMail d-inline">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Correo a buscar" class="form-control"
                            value="{{ $email ?? '' }}">
                    </div>
                    <div class="col-xl-6 text-right mt-2">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                </div>
            </form>

            <div class="card-body">
                @if (session('notificaciones'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notificaciones') }}
                    </div>
                @endif
            </div>
            <div class="table-responsive text-center">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID Dentista</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dentista as $datosDentista)
                            <tr>
                                <th scope="row">
                                    {{ $datosDentista->id }}
                                </th>
                                <th>
                                    {{ $datosDentista->name }}
                                </th>
                                <td>
                                    {{ $datosDentista->telefonoDentista }}
                                </td>
                                <td>
                                    {{ $datosDentista->email }}
                                </td>
                                <td>
                                    {{ $datosDentista->dni }}
                                </td>
                                <td>
                                    {{ $datosDentista->direccionDentista }}
                                </td>
                                <td>
                                    <form action="{{ url('/dentistas/' . $datosDentista->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('/dentistas/' . $datosDentista->id . '/editar') }}"
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
    </div>
    <div class="btn-group mt-4 " role="group">
        {{ $dentista->links('pagination::bootstrap-4') }}
    </div>
@endsection
