<h6 class="navbar-heading text-muted">
  @if(auth()->user()->role == 'admin')
        Gestión
    @else
        Menú
    @endif  
</h6>
<ul class="navbar-nav">
  @if(auth()->user()->role == 'admin')
    <li class="nav-item pb-2 {{ Request::is('home') ? 'active' : '' }}">
      <a class="nav-link  h {{ Request::is('home') ? 'active' : '' }}" href="{{ url('/home') }}">
          <i class="ni ni-tv-2 text-danger"></i> Panel de control
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('especialidades') ? 'active' : '' }}">
        <a class="nav-link h {{ Request::is('especialidades') ? 'active' : '' }}" href="{{ url('/especialidades') }}">
            <i class="ni ni-briefcase-24 text-blue"></i> Categorias
        </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('medicos') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('medicos') ? 'active' : '' }}" href="{{ url('/medicos') }}">
        <i class="fas fa-stethoscope text-info"></i>  Empleados
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('pacientes') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('pacientes') ? 'active' : '' }}" href="{{ url('/pacientes') }}">
        <i class="fas fa-bed text-warning"></i> Áreas
      </a>
    </li>

    @elseif(auth()->user()->role == 'doctor')
    <li class="nav-item pb-2 {{ Request::is('horario') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('horario') ? 'active' : '' }}" href="{{ url('/horario') }}">
        <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar Horario
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('citas') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('citas') ? 'active' : '' }}" href="{{ url('/citas') }}">
        <i class="fas fa-clock text-info"></i> Mis incidencias
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('pacientes') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('pacientes') ? 'active' : '' }}" href="{{ url('/pacientes') }}">
        <i class="fas fa-bed text-danger"></i> Mis escalas
      </a>
    </li>

    @else
    <li class="nav-item pb-2 {{ Request::is('horario') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('horario') ? 'active' : '' }}" href="{{ url('/horario') }}">
        <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar Horario
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('citas') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('citas') ? 'active' : '' }}" href="{{ url('/citas') }}">
        <i class="fas fa-clock text-info"></i> Registrar incidencias
      </a>
    </li>
    @endif

    <li class="nav-item pb-2 ">
      <a class="nav-link h {{ Request::is('#') ? 'active' : '' }}" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="ni ni-button-power text-pink"></i> Cerrar Sesión
      </a>
      <form action="{{route('logout')}}" method="POST" style="display: none" id="formLogout">
        @csrf
    </form>
    </li>
  </ul>
  @if(auth()->user()->role == 'admin')
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Reportes</h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item pb-2 {{ Request::is('citas') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('citas') ? 'active' : '' }}" href="#">
        <i class="ni ni-books text-success"></i> incidencias
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('desempeño') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('desempeño') ? 'active' : '' }}" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
        <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño Empleado
      </a>
    </li>
  </ul>
  @endif
 