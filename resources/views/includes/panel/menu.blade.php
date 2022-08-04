<h6 class="navbar-heading text-muted">
    @if (auth()->user()->role == 'admin')
        Gestion
    @else
    Menu
    @endif
</h6>
<ul class="navbar-nav">
    {{-- creamos una condicion para el acceso de usuarios segun los roles --}}
    @if (auth()->user()->role == 'admin')
        <li class="nav-item  active ">
            <a class="nav-link  active " href="/home">
                <i class="ni ni-tv-2 text-danger"></i> Tablero
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/especialidades') }}">
                <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="/dentistas">
                <i class="fas fa-stethoscope text-info"></i> Dentistas
            </a>
        </li>
        <li class="nav-item">
             <a class="nav-link " href="/pacientes">{{--href="{{ url('/pacientes') }}" --}}
                <i class="fas fa-bed text-warning"></i> Pacientes
            </a>
        </li>
    @elseif (auth()->user()->role == 'dentista')
        <li class="nav-item">
            <a class="nav-link " href="/horario">
                <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar Horario
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="">
                <i class="far fa-clock text-info"></i> Mis citas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="">
                <i class="fas fa-bed text-danger"></i> Mis Pacientes
            </a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link " href="/reservarcita/create">
                <i class="ni ni-calendar-grid-58 text-primary"></i> Reservar cita
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="/miscitas">
                <i class="far fa-clock text-info"></i> Mis citas
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="fas fa-sign-in-alt"></i> Cerrar sesión
        </a>
        <form action="{{ route('logout') }}" method="post" style="display:none;" id="formLogout">
            @csrf
        </form>
    </li>
</ul>
@if (auth()->user()->role == 'admin')
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Informes</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ni ni-books text-default"></i> Citas de pacientes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ni ni-chart-bar-32 text-warning"></i> Evaluacion dentista
            </a>
        </li>
    </ul>
@endif
