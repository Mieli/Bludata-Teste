@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Detalhes da Empresa',

    ])


    <div class="row">
        <div class="col-md-3">

         
          <div class="card card-danger card-outline">
            <div class="card-body box-profile">
            
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
                          {{ $empresa[0]->created_at }}
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
                  <li class="nav-item"><a href="javascript:history.back()" class="nav-link" title="Voltar"> <i class="fa fa-mail-reply-all"></i> </a></li>
                <li class="nav-item ml-3"><a class="nav-link bg-danger" data-toggle="tab">Fornecedores da Empresa</a></li>
              </ul>
            </div>

            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <div class="row">

                      @if ( count($empresa[0]->fornecedores) > 0 )
                                              
                        @foreach ($empresa[0]->fornecedores as $fornecedor)    
                  
                                <div class="col-12 col-sm-12 col-md-4">
                                  <div class="info-box">
                                    <span class="info-box-icon bg-danger elevation-1 col-md-2"><i class="fa fa-user"></i></span>
                      
                                    <div class="info-box-content ">
                                      <span class="info-box-text">
                                          <a href="{{ route('fornecedores.show',$fornecedor->id) }}">
                                            {!! Str::limit( $fornecedor->nome , 25, ' ...') !!}
                                          </a>
                                          <p> Tel Cel: {{ $fornecedor->telefone_celular }} </p>
                                      </span>
                                      
                                    </div>
                                  
                                  </div>
                                
                                </div>

                        @endforeach 
                        
                      @else
                          <p>Nenhum Fornecedor cadastrado na Empresa</p>
                      @endif
                  </div>                 

                </div> 
              </div>              
            </div>

          </div>         
        </div>        
    </div>

@endsection

@section('js')

<script src="{{ asset('/js/script.js') }}"></script>
    
@endsection