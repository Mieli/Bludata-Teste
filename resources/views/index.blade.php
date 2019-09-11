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
            'icone'  => 'ion ion-home',
            'acao'   => 'Gestão',
            'rota'   => 'empresas',
        ])
        
        @include('template.menu.opcao', [
            'color'  => 'bg-warning',
            'titulo' => 'Fornecedores',
            'texto'  => 'Gestão de Fornnecedor',
            'icone'  => 'ion ion-person-add',
            'acao'   => 'Cadastrar ',
            'rota'   => 'fornecedores',
        ])

        @include('template.menu.opcao', [
            'color'  => 'bg-success',
            'titulo' => 'Usuários',
            'texto'  => 'Gestão de Usuários',
            'icone'  => 'fa fa-users',
            'acao'   => 'Cadastrar ',
            'rota'   => 'usuarios',
        ])

        @include('template.menu.opcao', [
            'color'  => 'bg-danger',
            'titulo' => 'Pesquisa',
            'texto'  => 'Pesquisar',
            'icone'  => 'ion ion-clipboard',
            'acao'   => 'Pesquisar ',
            'rota'   => 'home/pesquisa',
        ])

        
    </div>
    



   
    <div class="row">
       
        <section class="col-lg-6 ">
       

            @include('template.componentes.listagem-empresa',[
                'titulo' => '(05) Últimas Empresas Cadastradas',
                'route'  => 'empresas.create',
                'botao'  => 'Cadastrar Empresa' 
            ])

        </section>

        
        <section class="col-lg-6 ">

                @include('template.componentes.listagem-fornecedor',[
                    'titulo' => '(05) Últimos Fornecedores Cadastrados ',
                    'route'  => 'fornecedores.create',
                    'botao'  => 'Cadastrar Fornecededor' 
                ])
        
        </section>
        
    </div>
    
    </div>

@endsection

