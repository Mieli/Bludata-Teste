@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Gestão Usuários - Funções',

    ])

<div class="card mt-3">
      
    <div class="card-body">

        @include('template.mensagens.mensagem')

        @include('template.mensagens.erro')
        

        @include('template.menu.opcao', [
            'color'  => 'bg-success',
            'titulo' => 'Cadastro',
            'texto'  => 'Cadastrar Usuário',
            'icone'  => '',
            'acao'   => 'Cadastrar',
            'rota'   => 'usuarios/create',
        ])

        @include('template.menu.opcao', [
          'color'  => 'bg-success',
          'titulo' => 'Pesquisar',
          'texto'  => 'Pesquisar Usuário',
          'icone'  => '',
          'acao'   => 'Pesquisar',
          'rota'   => 'pesquisar/usuarios',
        ])
        
        

    </div>    
</div>



@endsection