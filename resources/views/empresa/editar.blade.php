@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Gestão de Empresa ',

    ])

<div class="card mt-3">  
    
    <div class="card-header">
        <h1>Formulário de Alteração </h1>
    </div>

    <div class="card-body">
       

        {!! Form::model($empresa[0], ['route' => ['empresas.update', $empresa[0]->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

            <div class="row">
                <div class="col col-md-4">
                    @include('formulario.select',['label' => '', 
                                                  'select' => 'uf',
                                                  'data' =>  $estados,
                                                  'value' => $empresa[0]->uf,
                                                  'attributes' => [
                                                     'class' => 'form-control', 
                                                     'placeholder' => ''                                   
                                                  ]
                    ]) 
                </div>

                <div class="col">
                    @include('formulario.input',['label' => '', 
                                                 'input' => 'cnpj',  
                                                 'attributes' => [
                                                    'class' => 'form-control input-lg', 
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
         
        

            @include('formulario.submit', ['name' => 'Alterar',
                    'attributes' => [
                        'class' => 'btn btn-success', 
                    ]
            ])     


        {!! Form::close() !!}
    </div>    
</div>



@endsection