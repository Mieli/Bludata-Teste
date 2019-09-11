@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Detalhes do Usuário',

    ])


    <div class="row">

        <div class="col-md-12">

            <a href="javascript:history.back()" class="nav-link" title="Voltar"> <i class="fa fa-mail-reply-all"></i> </a>
         
              <div class="callout callout-success">
                
                <h5>Usuário: {!! $usuario[0]->name !!}</h5>

                <p>Email: {!! $usuario[0]->email !!}</p>
              </div>

              
            
          </div>         
        </div>        
    </div>

@endsection


@section('js')
 

@endsection