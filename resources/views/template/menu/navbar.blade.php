<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ url('home') }}" class="nav-link">Home</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('empresas')}}" class="nav-link">Empresas</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('fornecedores')}}" class="nav-link">Fornecedores</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('usuarios')}}" class="nav-link">Usuários</a>
        </li>
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('sair') }}"> 
          <i class="fa fa-power-off"></i>
          Sair do Sistema 
        </a>
       
      </li>
  
    </ul>
  </nav>
  <!-- /.navbar -->
