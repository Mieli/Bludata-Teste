@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Gestão Empresa - Funções',

    ])

<div class="card mt-3">
      
    <div class="card-body">

        @include('template.mensagens.mensagem')

        @include('template.mensagens.erro')
        

        @include('template.menu.opcao', [
            'color'  => 'bg-info',
            'titulo' => 'Cadastro',
            'texto'  => 'Cadastrar Empresa',
            'icone'  => '',
            'acao'   => 'Cadastrar',
            'rota'   => 'empresas/create',
        ])

        @include('template.menu.opcao', [
          'color'  => 'bg-info',
          'titulo' => 'Pesquisar',
          'texto'  => 'Pesquisar Empresa',
          'icone'  => '',
          'acao'   => 'Pesquisar',
          'rota'   => 'pesquisar/empresas',
        ])
           

    </div>    
</div>

@endsection