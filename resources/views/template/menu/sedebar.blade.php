<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
    <li class="nav-item has-treeview menu-open">
        <a href="{{ url('home') }}" class="nav-link active">
        <i class="nav-icon fa fa-tasks"></i>
        <p>  Menu  </p>
      </a>
      <ul class="nav nav-treeview">

        <li class="nav-item">
          <a href="{{ url('empresas') }}" class="nav-link ">
            <i class="fa fa-bank mr-1"></i>
            <p>Empresas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('fornecedores') }}" class="nav-link ">
            <i class="fa fa-address-book mr-1"></i>
            <p>Fornecedores</p>
          </a>
        </li>
               
      </ul>
    </li>
          
  </ul>
</nav>
      <!-- /.sidebar-menu -->