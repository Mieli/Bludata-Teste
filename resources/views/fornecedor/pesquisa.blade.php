@extends('template.main')

@section('content')

@include('template.componentes.titulo-pagina', [
    'titulo' => 'Gestão de Fornecedor - Pesquisa',

])

<div class="spinner-border"></div>

<div class="card mt-3">

    @include('template.mensagens.mensagem')

    <div class="card-body">
        

        <table id="fornecedores" class="table table-hover" >
            
                <thead class="thead-dark"> 
                    <tr>                   
                        <th>Nome</th>  
                        <th>CPF</th>
                        <th>CNPJ</th>
                        <th>Empresa</th>
                        <th>Data Cadastro</th>
                        <th style="width: 16%"> &nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>  </tbody>

            </table>
    </div>
</div>


@endsection

@section('js')

<script>

    $(function () {

        $('#fornecedores').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('ajax.fornecedores') !!}',
            columns: [
                { data: 'nome', name: 'nome' },
                { data: 'cpf', name: 'cpf' },
                { data: 'cnpj', name: 'cnpj'},  
                { data: 'empresa.nome', name: 'empresa.nome', orderable: false, searchable: false }, 
                { data: 'created_at', name: 'created_at'},
                { data: 'menu', name: 'menu', orderable: false, searchable: false},
            ],
        });
        
    });
      
    </script>

@endsection





