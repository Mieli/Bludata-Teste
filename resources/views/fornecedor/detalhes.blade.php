@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Detalhes do Fornecedor',

    ])


    <div class="row">
        <div class="col-md-3">

          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              
              <h3 class="profile-username text-center">{{ $fornecedor[0]->nome }}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  
                    <li class="list-group-item">
                        <strong> Idade: </strong> 
                        <span id="idade">
                            
                          {{ $fornecedor[0]->data_nascimento }}
                        
                        </span>  
                    </li>

                  
                     {!! ($fornecedor[0]->rg) ? '<li class="list-group-item"><strong> RG: </strong> '. $fornecedor[0]->rg .'</li>' : "  " !!}  
                  

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
                          {{  $fornecedor[0]->created_at }}
                      </a>
                  </li>

                </ul>

            </div>
            
          </div>
        
        </div>
       
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a href="javascript:history.back()" class="nav-link btn btn-light" title="Voltar"> <i class="fa fa-mail-reply-all"></i> </a></li>
                <li class="nav-item ml-3"><a class="nav-link bg-primary" data-toggle="tab">Representante da Empresa</a></li>
              </ul>
            </div>

            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  
                      <div class="post">

                          <div class="username">
                           
                            <p>
                              <strong>CNPJ: </strong> {{ $fornecedor[0]->empresa->cnpj }}
                              &nbsp; &nbsp;                                          
                              <strong>Empresa: </strong> <a href="{{ route('empresas.show',$fornecedor[0]->empresa->id) }}" title="Ver Detalhes">{{ $fornecedor[0]->empresa->nome }}</a>
                              &nbsp; &nbsp;
                              <strong>Estado: </strong> {{ $fornecedor[0]->empresa->uf }}
                            </p>

                            <a href="{{ route('empresas.show',$fornecedor[0]->empresa->id) }}" class="float-right btn-tool" title="Ver Detalhes da Empresa {{ $fornecedor[0]->empresa->nome }}"><i class="fa fa-search"></i></a>
                            
                          </div>
                          <p class="description"> 
                           
                            <p> <strong>Data de Cadastro: </strong> {{ $fornecedor[0]->empresa->created_at }} </p>
                            
                          </p>
                    
                      </div>

                </div> 
              </div>              
            </div>

          </div>         
        </div>        
    </div>

@endsection


@section('js')
  {{-- javacript pra calcular idade --}}
  <script src="{{ asset('/js/script.js') }}"></script>

@endsection