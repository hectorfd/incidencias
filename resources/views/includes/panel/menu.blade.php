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
    <li class="nav-item pb-2 {{ Request::is('facturas') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('facturas') ? 'active' : '' }}" href="{{ url('/facturas') }}">
          <i class="fas fa-credit-card text-cyan"></i> Facturas
      </a>
  </li>
  <li class="nav-item pb-2 {{ Request::is('especialidades') ? 'active' : '' }}">
    <a class="nav-link h {{ Request::is('especialidades') ? 'active' : '' }}" href="{{ url('/especialidades') }}">
        <i class=" 	fas fa-graduation-cap text-danger"></i> Especialidad
    </a>
  </li>
    <li class="nav-item pb-2 {{ Request::is('departamentos') ? 'active' : '' }}">
        <a class="nav-link h {{ Request::is('departamentos') ? 'active' : '' }}" href="{{ url('/departamentos') }}">
            <i class="fas fa-sitemap text-primary"></i> Departamentos
        </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('empleados') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('empleados') ? 'active' : '' }}" href="{{ url('/empleados') }}">
        <i class="fas fa-id-card-alt text-info"></i>  Empleados
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('clientes') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('clientes') ? 'active' : '' }}" href="{{ url('/clientes') }}">
        <i class="ni ni-circle-08 text-orange"></i> Clientes
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('categorias') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('categorias') ? 'active' : '' }}" href="{{ url('/categorias') }}">
        <i class="fas fas fa-paste text-pink"></i> Categoria
      </a>
    </li>
    
    <li class="nav-item pb-2 {{ Request::is('incidencias') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('incidencias') ? 'active' : '' }}" href="{{ url('/incidencias') }}">
        <i class="fas fa-edit text-yellow"></i> Incidencias
      </a>
    </li>
   
    <li class="nav-item pb-2 {{ Request::is('recursos') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('recursos') ? 'active' : '' }}" href="{{ url('/recursos') }}">
        <i class="fas fa-wrench text-ligth"></i> Recursos
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('horario') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('horario') ? 'active' : '' }}" href="{{ url('/horario') }}">
        <i class="ni ni-calendar-grid-58 text-primary"></i> Gestion Horario
      </a>
    </li>

    @elseif(auth()->user()->role == 'empleado')
    
    <li class="nav-item pb-2 {{ Request::is('incidencias') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('incidencias') ? 'active' : '' }}" href="{{ url('/incidencias') }}">
        <i class="fas fa-clock text-info"></i> Incidencias
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('escalas') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('escalas') ? 'active' : '' }}" href="{{ url('/escalas') }}">
        <i class="fas fa-bed text-danger"></i> Escalas
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('horarioVista') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('horarioVista') ? 'active' : '' }}" href="{{ url('/horarioVista') }}">
        <i class="ni ni-calendar-grid-58 text-primary"></i> Mi Horario
      </a>
    </li>

    @else
    <li class="nav-item pb-2 {{ Request::is('horario') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('horario') ? 'active' : '' }}" href="{{ url('/horario') }}">
        <i class="ni ni-calendar-grid-58 text-primary"></i> Gestion Horario
      </a>
    </li>
    <li class="nav-item pb-2 {{ Request::is('incidencias') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('incidencias') ? 'active' : '' }}" href="{{ url('/incidencias') }}">
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
    <li class="nav-item pb-2 {{ Request::is('incidencias') ? 'active' : '' }}">
      <a class="nav-link h {{ Request::is('incidencias') ? 'active' : '' }}" href="#">
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
 