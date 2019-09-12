@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Gestão de Usuários - Cadastro',

    ])

<div class="card mt-3">
    
    <div class="card-body">

        @include('template.mensagens.mensagem')

        @include('template.mensagens.erro')
       

        {!! Form::open(['route' => 'usuarios.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}

             
            <div class="row">

                <div class="col col-md-12">
                    
                    @include('formulario.input',['label' => '', 'input' => 'name',  
                                    'attributes' => [
                                        'class'       => 'form-control input-lg ', 
                                        'placeholder' => 'Nome',
                                        'required'
                                    ] 
                    ])

                </div>                             

            </div>
            
            <div class="row">

                <div class="col" id="campoEmail">
                    @include('formulario.input',['label' => '', 'input'  => 'email',  
                                    'attributes' => [
                                        'class'       => 'form-control ', 
                                        'placeholder' => 'Email',
                                    ] 
                    ])
                </div>

                <div class="col" id="campoSenha">
                    @include('formulario.password',['label' => '', 'input' => 'password',  
                                    'attributes' => [
                                        'class'       => 'form-control ', 
                                        'placeholder' => 'Senha',
                                ] 
                    ])
                </div>

               
            </div>        
        
            <div class="row mt-5">
                @include('formulario.submit', ['name' => 'Cadastrar',
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

   
});

</script>

@endsection