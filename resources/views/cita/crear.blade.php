@extends('layouts.panel')

@section('content')
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Registrar nueva cita</h3>
            </div>
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
                    <label for="especialidad"> Especialidad</label>
                    <select name="" id="" class="form-control">
                        {{-- cargaremos todas las especialidades --}}
                        {{-- @foreach ($especialidades as $especialidad)
                            <option value="{{$especialidad->id}}">{{$especialidad->name}}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectDentista">Dentista</label>
                    <select name="" id="" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label for="direccionDentista"> Fecha</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="ni ni-calendar-grid-58"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control datepicker" placeholder="selecciona la fecha" value="{{date('Y-m-d')}}"
                        data-date-format="yyyy-mm-dd" data-date-start-date="{{date('Y-m-d')}}" data-date-end-date="+30d">
                    </div>
                </div>

                <div class="form-group">
                    <label for="horaAtencion"> Hora de atención</label>
                    <input type="text" name="horaAtencion" class="form-control" placeholder="Introduce el email del paciente" />
                </div>
                <div class="form-group">
                    <label for="tipoConsulta"> Tipo de consulta</label>
                    <input type="text" name="tipoConsulta" class="form-control" placeholder="Introduce la contraseña del dentista" value="{{old('password',Str::random(8))}}"/>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar cita</button>
            </form>
        </div>
      </div>

@endsection
@section('scripts')
    <script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
@endsection
