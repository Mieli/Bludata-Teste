@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Pesquisa - Escolha Opção',

    ])

<div class="card mt-3">
      
    <div class="card-body">

        @include('template.mensagens.mensagem')

        @include('template.mensagens.erro')

        @include('template.menu.opcao', [
          'color'  => 'bg-info',
          'titulo' => 'Pesquisar',
          'texto'  => 'Pesquisar Empresa',
          'icone'  => '',
          'acao'   => 'Pesquisar',
          'rota'   => 'pesquisar/empresas',
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