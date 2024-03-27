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
          <i class="ni ni-tv-2 text-teal"></i> Panel de control
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('especialidades') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('especialidades') ? 'active' : '' }}" href="{{ url('/especialidades') }}">
          <i class="fas fa-credit-card text-cyan"></i> Facturas
      </a>
  </li>
    <li class="nav-item pb-2 {{ Request::is('especialidades') ? 'active' : '' }}">
        <a class="nav-link h {{ Request::is('especialidades') ? 'active' : '' }}" href="{{ url('/especialidades') }}">
            <i class="fas fa-sitemap text-primary"></i> Áreas
        </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('medicos') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('medicos') ? 'active' : '' }}" href="{{ url('/medicos') }}">
        <i class="fas fa-id-card-alt text-info"></i>  Empleados
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('pacientes') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('pacientes') ? 'active' : '' }}" href="{{ url('/pacientes') }}">
        <i class="ni ni-circle-08 text-warning"></i> Clientes
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('pacientes') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('pacientes') ? 'active' : '' }}" href="{{ url('/pacientes') }}">
        <i class="fas fa-address-book text-pink"></i> Agenda
      </a>
    </li>
    
    <li class="nav-item pb-2 {{ Request::is('citas') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('citas') ? 'active' : '' }}" href="{{ url('/citas') }}">
        <i class="fas fa-edit text-yellow"></i> Incidencias
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('citas') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('citas') ? 'active' : '' }}" href="{{ url('/citas') }}">
        <i class="ni ni-laptop text-success"></i> Equipos
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('citas') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('citas') ? 'active' : '' }}" href="{{ url('/citas') }}">
        <i class="fas fa-wrench text-ligth"></i> Recursos
      </a>
    </li>

    @elseif(auth()->user()->role == 'empleado')
    <li class="nav-item pb-2 {{ Request::is('horario') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('horario') ? 'active' : '' }}" href="{{ url('/horario') }}">
        <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar Horario
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('citas') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('citas') ? 'active' : '' }}" href="{{ url('/citas') }}">
        <i class="fas fa-clock text-info"></i> Incidencias
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('pacientes') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('pacientes') ? 'active' : '' }}" href="{{ url('/pacientes') }}">
        <i class="fas fa-bed text-danger"></i> Escalas
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
        <i class="fas fa-clock text-info"></i> Reportar incidencias
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
        <i class="ni ni-books text-success"></i> Reporte incidencias
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('desempeño') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('desempeño') ? 'active' : '' }}" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
        <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño Empleado
      </a>
    </li>
  </ul>
  @endif
 