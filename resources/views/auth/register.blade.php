{{-- @extends('layouts.formulario')

@section('content')
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">
                        {{-- <div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div>
            <div class="text-center">
              <a href="#" class="btn btn-neutral btn-icon mr-4">
                <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                <span class="btn-inner--text">Github</span>
              </a>
              <a href="#" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                <span class="btn-inner--text">Google</span>
              </a>
            </div>
          </div> --}}
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="container">
                                <div class="header-body text-center">
                                  <div class="row justify-content-center">
                                    <div class="col-lg-12 col-md-12">
                                      <h1 class="text-dark">Bienvenido/a a <br/>Clínica dental Casanova</h1>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                @if ($errors->any())
                                    {{-- pegamos el codigo de la alerta de bootstrap --}}
                                    <div class="text-center text-muted mb-2">
                                        <h4>Se encontro el siguiente error.</h4>
                                    </div>
                                    <div class="alert alert-danger mb-4" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                @else
                                    <div class="text-center text-muted mb-4">
                                        <small>Registrate con los siguientes datos</small>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Introduce tu nombre y apellidos"
                                            type="text" name="name" value="{{ old('name') }}" required
                                            autocomplete="name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Introduce tu correo electrónico"
                                            type="email" name="email" value="{{ old('email') }}" required
                                            autocomplete="email">
                                    </div>
                                </div>
                                {{-- contraseña --}}
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Introduce la contraseña de usuario"
                                            type="password" name="password" required autocomplete="new-password">
                                    </div>
                                </div>
                                {{-- repetir contraseña --}}
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Repetir la contraseña de usuario"
                                            type="password" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="text-muted font-italic"><small>La contraseña debe de tener minimo 8 caracteres,
                                        entre ellos: <br />
                                        <span class="text-success font-weight-700">Al menos, 1 letra mayuscula,1 letra
                                            miniscula,1 numero, 1 simbolo especial.<br /> Ejemplo:Pepe21?</span></small>
                                </div>
                                <div class="row my-4">
                                    <div class="col-12">
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                            <label class="custom-control-label" for="customCheckRegister">
                                                <span class="text-muted">Estoy de acuerdo con la <a href="#!"> politica
                                                        de privacidad</a></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Registrar usuario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection --}}
