
<!DOCTYPE html>
<html>
<head>

    @include('template.componentes.header')

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('template.menu.navbar')


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('images/logo-bludata.png') }}" alt="Bludata" class="brand-image img-circle elevation-3 "
           style="opacity: .8">
      <span class="brand-text font-weight-light">Bludata</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     
        @include('template.user.dados-user')

        @include('template.menu.sedebar')

    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
   
    <section class="content">
        
        @yield('content')

    </section>
   
  </div>

  @include('template.componentes.rodape')


</div>
<!-- ./wrapper -->


    @include('template.componentes.js-jquery')
    
         
    @yield('js')
   

</body>
</html>






























{{-- <!DOCTYPE html>
<html lang="pt-br">
<head>
        <link rel="shortcut icon" href="https://www.bludata.com.br/wp-content/uploads/2017/05/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bludata Software</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
   
    

</head>
<body>
    
    @include('template.menu.menu')
   
   

    <div class="container">    

        <div class="row mt-3">
            <div class="col-sm">
                    @include('template.menu.menu-lateral')
            </div>
            <div class="col-10">
            
                    @yield('content')

            
                    
            </div>
        </div>
         

           

    </div>


    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
         @yield('js')
    </script>
    
</body>
</html> --}}