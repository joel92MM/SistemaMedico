@extends('layouts.formulario')

@section('bienvenida')

@endsection

@section('content')
 <!-- Page content -->
 <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-7">
        {{-- autentificarnos con google o nuestro github --}}
        <div class="card bg-secondary shadow border-0">
            <div class="container">
                <div class="header-body text-center">
                  <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                      <h1 class="text-dark">Bienvenido/a a <br/>Clínica dental Casanova</h1>
                    </div>
                  </div>
                </div>
              </div>
          {{-- <div class="card-header bg-transparent pb-5">
            <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
            <div class="btn-wrapper text-center">
              <a href="#" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon"><img src="{{asset('img/icons/common/github.svg')}}"></span>
                <span class="btn-inner--text">Github</span>
              </a>
              <a href="#" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon"><img src="{{asset('img/icons/common/google.svg')}}"></span>
                <span class="btn-inner--text">Google</span>
              </a>
            </div>
          </div> --}}
          <div class="card-body px-lg-5 py-lg-5">
            {{-- agregamos una condicion para que salte un aviso de alerta --}}
            @if ($errors->any())
                {{-- pegamos el codigo de la alerta de bootstrap --}}
                <div class="text-center text-muted mb-2">
                    <h4>Se encontro el siguiente error.</h4>
                </div>
                <div class="alert alert-danger mb-4" role="alert">
                    {{$errors->first()}}
                </div>
            @else
                <div class="text-center text-muted mb-4">
                    <small>Iniciar sesión</small>
                </div>
            @endif

            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" placeholder="Introduce tu correo electrónico" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Introduce tu contraseña" type="password" name="password" required autocomplete="current-password">
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input name="remember" class="custom-control-input" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">
                  <span class="text-muted">Recordar sesión</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Inicar sesión</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-5">
            <a href="{{ route('password.request') }}" class="text-light"><small>¿Olvidaste la contraseña?</small></a>
          </div>
          <div class="col-7 text-right">
            <a href="{{route('register')}}" class="text-light"><small>Crear una nueva cuenta de usuario</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
