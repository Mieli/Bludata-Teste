@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Detalhes da Empresa',

    ])


    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-danger card-outline">
            <div class="card-body box-profile">
              {{-- <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="../../dist/img/user4-128x128.jpg"
                     alt="User profile picture">
              </div> --}}

            <h3 class="profile-username text-center">{{ $empresa[0]->nome }}</h3>

            <p class="text-muted text-center">{{ $empresa[0]->cnpj }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                
                <li class="list-group-item">
                  <b>Fornecedores</b> <a class="float-right"> 
                    {{ count($empresa[0]->fornecedores) }} 
                  </a>
                </li>

                <li class="list-group-item">
                    <b>Data de Cadastro</b> 
                    <a class="float-right"> 
                        {!!  Carbon\Carbon::parse($empresa[0]->created_at)->format('d/m/Y')  !!}
                    </a>
                </li>

              </ul>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link bg-danger" data-toggle="tab">Fornecedores da Empresa</a></li>
              </ul>
            </div><!-- /.card-header -->

            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <div class="row">
                      
                      @foreach ($empresa[0]->fornecedores as $fornecedor)    
                 
                      
                      <!-- /.col -->
                      <div class="col-12 col-sm-12 col-md-4">
                        <div class="info-box">
                          <span class="info-box-icon bg-danger elevation-1 col-md-2"><i class="fa fa-user"></i></span>
            
                          <div class="info-box-content ">
                            <span class="info-box-text">
                                <a href="{{ route('fornecedores.show',$fornecedor->id) }}">{{ $fornecedor->nome }}</a>
                            </span>
                            <span class="info-box-text">
                                <p>Dt Cad: {{ Carbon\Carbon::parse($fornecedor->created_at)->format('d/m/Y') }}</p>
                            </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->


                      @endforeach 

                  </div>
                  <!-- /.row -->








{{-- 
                      <div class="post">

                          <div class="username">
                            <a href="{{ route('fornecedores.show',$fornecedor->id) }}">{{ $fornecedor->nome }}</a>
                              <a href="{{ url('fornecedores') }}" class="float-right btn-tool"><i class="fa fa-search"></i></a>
                          </div>
                          <span class="description"> 
                            <p>Data de Cadastro: {{ Carbon\Carbon::parse($fornecedor->created_at)->format('d/m/Y') }} </p> 
                          </span>

                          <span class="description">CNPJ: {{ $fornecedor->cnpj ?? '' }} </span>
                          <span class="description">RG: {{ $fornecedor->rg ?? '' }} </span>
                          <span class="description">CPF: {{ $fornecedor->cpf ?? '' }} </span>                  
                        
                      </div> <!-- Post -->

                    @endforeach --}}

                </div> 
              </div>              
            </div><!-- /.card-body -->

          </div>         
        </div>        
    </div>











{{-- 
<div class="card mt-3">
   
    
    <div class="card-body">
        <h1>Nome: {{ $empresa[0]->nome}}</h1>

        <h4>CNPJ: {{ $empresa[0]->cnpj}}</h4>

        <span class="description">Estado: {{ $empresa[0]->uf}}</span>

        <span class="description">Data Cadastro: {!!  Carbon\Carbon::parse($empresa[0]->created_at)->format('d/m/Y')  !!}</span>

    </div>

</div>
 --}}


@endsection