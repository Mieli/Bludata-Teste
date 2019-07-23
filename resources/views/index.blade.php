@extends('template.main')

@section('content')

@include('template.componentes.titulo-pagina', [
    'titulo' => 'Budata - Software',

])

<div class="container-fluid">
    <div class="row"> 
        @include('template.menu.opcao', [
            'color'  => 'bg-info',
            'titulo' => 'Empresas',
            'texto'  => 'Gestão de Empresas',
            'icone'  => 'ion ion-bag',
            'acao'   => 'Gestão',
            'rota'   => 'empresas',
        ])
        
        @include('template.menu.opcao', [
            'color'  => 'bg-warning',
            'titulo' => 'Fornecedores',
            'texto'  => 'Gestão de Fornnecedor',
            'icone'  => 'ion ion-person-add',
            'acao'   => 'Cadastrar',
            'rota'   => 'fornecedores',
        ])

        @include('template.menu.opcao', [
            'color'  => 'bg-success',
            'titulo' => 'Pesquisa',
            'texto'  => 'Pesquisar',
            'icone'  => 'ion ion-stats-bars',
            'acao'   => 'Pesquisar',
            'rota'   => 'home',
        ])

        @include('template.menu.opcao', [
            'color'  => 'bg-danger',
            'titulo' => 'Funções',
            'texto'  => 'Funções de Gestão',
            'icone'  => 'ion ion-pie-graph',
            'acao'   => 'Gestão',
            'rota'   => 'home',
        ]) 
    </div>
    



    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 ">
       

            @include('template.componentes.listagem-empresa',[
                'titulo' => 'Empresas Cadastradas',
                'route'  => 'empresas.create',
                'botao'  => 'Cadastrar Empresa' 
            ])

        </section>

        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 ">

                @include('template.componentes.listagem-fornecedor',[
                    'titulo' => 'Fornecedores Cadastrados ',
                    'route'  => 'fornecedores.create',
                    'botao'  => 'Cadastrar Fornecededor' 
                ])
        
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

@endsection

