@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Detalhes do Fornecedor',

    ])


    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              
              <h3 class="profile-username text-center">{{ $fornecedor[0]->nome }}</h3>


              <p class="description"> </p>
              <p class="description"></p>
              <p class="description"> </p>                  


                <ul class="list-group list-group-unbordered mb-3">
                  
                  <li class="list-group-item">
                      <strong> RG: </strong> {{ $fornecedor[0]->rg ?? '' }} 
                  </li>

                  <li class="list-group-item">
                      <strong> CPF: </strong> {{ $fornecedor[0]->cpf ?? '' }}
                  </li>

                  <li class="list-group-item">
                      <strong> CNPJ: </strong> {{ $fornecedor[0]->cnpj ?? '' }}
                  </li>

                  <li class="list-group-item">
                      <strong> Tel Cel: </strong> {{ $fornecedor[0]->telefone_celular ?? '' }}
                  </li>

                  <li class="list-group-item">
                      <strong> Tel Res: </strong> {{ $fornecedor[0]->telefone_residencial ?? ''  }}
                  </li>

                  <li class="list-group-item">
                      <strong> Tel Com: </strong> {{ $fornecedor[0]->telefone_comercial ?? ''  }}
                  </li>

                  <li class="list-group-item">
                      <strong>Data de Cadastro</strong> 
                      <a class="float-right"> 
                          {!!  Carbon\Carbon::parse($fornecedor[0]->created_at)->format('d/m/Y')  !!}
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
                <li class="nav-item"><a class="nav-link bg-primary" data-toggle="tab">Representante da Empresa</a></li>
              </ul>
            </div><!-- /.card-header -->

            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  
                      <div class="post">

                          <div class="username">
                           Empresa:  <a href="{{ route('empresas.show',$fornecedor[0]->empresa->id) }}">{{ $fornecedor[0]->empresa->nome }}</a>
                                    <a href="{{ route('empresas.show',$fornecedor[0]->empresa->id) }}" class="float-right btn-tool"><i class="fa fa-search"></i></a>
                          </div>
                          <p class="description"> 
                            <p>Estado: {{ $fornecedor[0]->empresa->uf }}</p>
                            <p>CNPJ: {{ $fornecedor[0]->empresa->cnpj }}</p>
                            <p>Data de Cadastro: {{ Carbon\Carbon::parse($fornecedor[0]->empresa->created_at)->format('d/m/Y') }} </p> 
                          </p>
                    
                        
                      </div> <!-- Post -->


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