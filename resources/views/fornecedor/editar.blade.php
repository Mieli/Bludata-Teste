@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Gestão de Fornecedores - Alterar',

    ])

<div class="card mt-3">
       
    <div class="card-body">

        @include('template.mensagens.mensagem')

        @include('template.mensagens.erro')
       

        {!! Form::model($fornecedor[0], ['route' => ['fornecedores.update', $fornecedor[0]->id], 'method' => 'put', 'class' => 'form-horizontal', 'onsubmit' => 'checarIdade($this)']) !!}

            <div class="row ">
                <div class="form-check form-check-inline ml-2">

                    @include('formulario.radio',['label' => 'Pessoa Jurírica', 'input'  => 'tipoPessoa',  'value'  => 'J',                                 
                                'attributes' => [
                                    'id'    => 'tipoPessoa',
                                    'class' => 'form-check-input',
                                ] 
                    ])
                </div>
                <div class="form-check form-check-inline ml-5">    
                    @include('formulario.radio',['label' => 'Pessoa Física', 'input'  => 'tipoPessoa', 'value'  => 'F',
                                'attributes' => [
                                    'id'    => 'tipoPessoa',
                                    'class' => 'form-check-input',
                                ] 
                    ])
                </div>    
            </div>    
            <div class="row">

                 <div class="col col-md-3">

                    @include('formulario.select',['label' => '', 'select' => 'empresa_id', 'data'  =>  $empresas, 'value' =>  $fornecedor[0]->empresa->id,
                                    'attributes' => [
                                        'class'       => 'form-control', 
                                        'placeholder' => ''                                   
                                    ] 
                    ])
                </div>
                
                <div class="col col-md-9">
                    
                    @include('formulario.input',['label' => '', 'input' => 'nome',  
                                    'attributes' => [
                                        'class'       => 'form-control input-lg ', 
                                        'placeholder' => 'NOME DO FORNECEDOR',
                                        'required'
                                    ] 
                    ])

                </div>                             

            </div>
            
            <div class="row">

                <div class="col" id="campoCpf">
                    @include('formulario.input',['label' => '', 'input' => 'cpf',  
                                    'attributes' => [
                                        'minlength'   => '14',
                                        'maxlength'   => '14',
                                        'class'       => 'form-control ', 
                                        'placeholder' => 'CPF',
                                        'onkeypress'  => "$(this).mask('000.000.000-00');",
                                    ] 
                    ])
                </div>

                <div class="col" id="campoCnpj">
                    @include('formulario.input',['label' => '', 'input' => 'cnpj',  
                                    'attributes' => [
                                        'minlength'   => '18',
                                        'maxlength'   => '18',
                                        'class'       => 'form-control ', 
                                        'placeholder' => 'CNPJ',
                                        'onkeypress'  => "$(this).mask('00.000.000/0000-00');",
                                ] 
                    ])
                </div>

                <div class="col" id="campoRg">
                        @include('formulario.input',['label' => '', 'input' => 'rg',  
                                        'attributes' => [
                                            'minlength'   => '12',
                                            'maxlength'   => '12',
                                            'class'       => 'form-control ', 
                                            'placeholder' => 'RG',
                                            'onkeypress'  => "$(this).mask('00.000.000-0');",
                                    ] 
                        ])
                </div>  

                <div class="col col-md-3" id="campoDataNascimento">

                        @include('formulario.date',['label' => '', 'input'  => 'data_nascimento',  
                                        'attributes' => [
                                            'id'          => 'data_nascimento',
                                            'class'       => 'form-control input-lg ', 
                                            'placeholder' => '',                                            
                                        ] 
                        ])
                </div>
            
            </div>

            <div class="row">
                <div class="col col col-md-3">  
                    @include('formulario.input',['label' => '', 'input' => 'telefone_celular',  
                                    'attributes' => [
                                        'id'          => 'telefone',
                                        'minlength'   => '14',
                                        'maxlength'   => '14',
                                        'class'       => 'form-control  ', 
                                        'placeholder' => 'Tel Celular',
                                        'onkeypress'  => "$(this).mask('(00) 00000-0000');",
                                    ] 
                    ])

                </div>

                <div class="col col col-md-3">  

                    @include('formulario.input',['label' => '', 'input' => 'telefone_residencial',  
                                    'attributes' => [
                                        'id'          => 'telefone',
                                        'minlength'   => '14',
                                        'maxlength'   => '14',
                                        'class'       => 'form-control  ', 
                                        'placeholder' => 'Tel Residencial',
                                        'onkeypress'  => "$(this).mask('(00) 00000-0000');",
                                    ] 
                    ])
                </div>

                <div class="col col col-md-3">  
                    @include('formulario.input',['label' => '', 'input' => 'telefone_comercial',  
                                    'attributes' => [
                                        'id'          => 'telefone',
                                        'minlength'   => '14',
                                        'maxlength'   => '14',
                                        'class'       => 'form-control  ', 
                                        'placeholder' => 'Tel Comercial',
                                        'onkeypress'  => "$(this).mask('(00) 00000-0000');",
                                    ] 
                    ])
   
                </div>

            </div>        
        
            <div class="row mt-5">
                @include('formulario.submit', ['name' => 'Alterar',
                                'attributes' => [
                                    'class' => 'btn btn-danger', 
                                ]
                ])     
            </div>

        {!! Form::close() !!}
    </div>    
</div>


@endsection

@section('js')

<script>

$(document).ready( function () {

    $('input:radio[name="tipoPessoa"]').change( function() {
        if ($(this).is(':checked') && $(this).val() == 'J') {
    
            $('#campoRg').hide();
            $('#campoDataNascimento').hide();

        }else{
           
            $('#campoRg').show();
            $('#campoDataNascimento').show();

        }
    });  
    
});

</script>

@endsection