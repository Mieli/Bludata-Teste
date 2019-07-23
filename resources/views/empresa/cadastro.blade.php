@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Gestão de Empresa - Cadastro',

    ])

<div class="card mt-3">
        <div class="card-header">
            <h1>Formulário de Cadastro </h1>
        </div>
    <div class="card-body">

        @include('template.mensagens.mensagem')

        @include('template.mensagens.erro')
       

        {!! Form::open(['route' => 'empresas.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}

            <div class="row">
                <div class="col col-md-4">
                    @include('formulario.select',['label' => '', 
                                                  'select' => 'uf',
                                                  'data' =>  $estados,
                                                  'value' => '',
                                                  'attributes' => [
                                                     'class' => 'form-control', 
                                                     'placeholder' => 'Estado ...'                                   
                                                  ] 
                    ])
                </div>

                <div class="col">
                    @include('formulario.input',['label' => '',
                                                 'input' => 'cnpj',  
                                                 'attributes' => [
                                                    'class' => 'form-control ', 
                                                    'placeholder' => 'CNPJ',
                                                    'onkeypress'  => "$(this).mask('00.000.000/0000-00');",
                                                    'required'
                                                 ] 
                    ])
                </div>

            </div>
            
            

            @include('formulario.input',['label' => '',
                                         'input' => 'nome',  
                                         'attributes' => [
                                            'class' => 'form-control input-lg ', 
                                            'placeholder' => 'Nome da Empresa',
                                            'required'
                                         ] 
            ])
         
        

            @include('formulario.submit', ['name' => 'Cadastrar',
                                           'attributes' => [
                                              'class' => 'btn btn-danger', 
                                           ]
            ])     


        {!! Form::close() !!}
    </div>    
</div>


@endsection