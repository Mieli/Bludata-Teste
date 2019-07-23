@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Gestão Fornecedores - Funções',

    ])

<div class="card mt-3">
      
    <div class="card-body">

        @include('template.mensagens.mensagem')

        @include('template.mensagens.erro')
        

        @include('template.menu.opcao', [
            'color'  => 'bg-warning',
            'titulo' => 'Cadastro',
            'texto'  => 'Cadastrar Fornecedor',
            'icone'  => '',
            'acao'   => 'Cadastrar',
            'rota'   => 'fornecedores/create',
        ])

        @include('template.menu.opcao', [
          'color'  => 'bg-warning',
          'titulo' => 'Pesquisar',
          'texto'  => 'Pesquisar Fornecedor',
          'icone'  => '',
          'acao'   => 'Pesquisar',
          'rota'   => 'pesquisar/fornecedores',
        ])
        
        

    </div>    
</div>



@endsection