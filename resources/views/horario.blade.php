@extends('layouts.panel')

@section('content')
    <form action="{{ url('/horario') }}" method="post">
        @csrf
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Gestionar horario</h3>
                    </div>
                    <div class="col text-right">
                        <button type="submit" class="btn btn-md btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card-body">
                    @if (session('notificaciones'))
                        <div class="alert alert-success" role="alert">
                            {{ session('notificaciones') }}
                        </div>
                    @endif
                    @if (session('errors'))
                        <div class="alert alert-danger" role="alert">
                            Los cambios se han guardado , pero se encontraron las siguientes correciones:
                            <ul>
                                @foreach (session('errors') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="table-responsive text-center">
                    <!-- Projects table -->
                    <table class="table table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Día</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Turno mañana</th>
                                <th scope="col">Turno tarde</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($horarios as $key => $horario)
                                <tr>
                                    <th scope="row">
                                        {{ $days[$key] }}
                                        {{-- {{ $dia }} --}}
                                    </th>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                name="active[]" value="{{ $key }}"
                                                @if ($horario->active) checked @endif> {{-- checked > --}}
                                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <select name="morning_start[]" id="" class="form-control">
                                                    @for ($i = 8; $i <= 11; $i++)
                                                        <option value="{{ ($i < 10 ? '0' : '') . $i }}:00"
                                                            @if ($i . ':00 AM' == $horario->morning_start) selected @endif>
                                                            {{ $i }}:00 AM</option>
                                                        <option value="{{ ($i < 10 ? '0' : '') . $i }}:30"
                                                            @if ($i . ':30 AM' == $horario->morning_start) selected @endif>
                                                            {{ $i }}:30 AM</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select name="morning_end[]" id="" class="form-control">
                                                    @for ($i = 8; $i <= 11; $i++)
                                                        <option value="{{ ($i < 10 ? '0' : '') . $i }}:00"
                                                            @if ($i . ':00 AM' == $horario->morning_end) selected @endif>
                                                            {{ $i }}:00 AM</option>
                                                        <option value="{{ ($i < 10 ? '0' : '') . $i }}:30"
                                                            @if ($i . ':30 AM' == $horario->morning_end) selected @endif>
                                                            {{ $i }}:30 AM</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- afteernoon --}}
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <select name="afternoon_start[]" id="" class="form-control">
                                                    @for ($i = 2; $i <= 11; $i++)
                                                        <option value="{{ $i + 12 }}:00"
                                                            @if ($i . ':00 PM' == $horario->afternoon_start) selected @endif>
                                                            {{ $i }}:00 PM</option>
                                                        <option value="{{ $i + 12 }}:30"
                                                            @if ($i . ':30 PM' == $horario->afternoon_start) selected @endif>
                                                            {{ $i }}:30 PM</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select name="afternoon_end[]" id="" class="form-control">
                                                    @for ($i = 2; $i <= 11; $i++)
                                                        <option value="{{ $i + 12 }}:00"
                                                            @if ($i . ':00 PM' == $horario->afternoon_end) selected @endif>
                                                            {{ $i }}:00 PM</option>
                                                        <option value="{{ $i + 12 }}:30"
                                                            @if ($i . ':30 PM' == $horario->afternoon_end) selected @endif>
                                                            {{ $i }}:30 PM</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
@endsection
