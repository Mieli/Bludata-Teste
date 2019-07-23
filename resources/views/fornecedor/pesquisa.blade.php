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
                        <th>ID</th>                       
                        <th>Nome</th>                        
                        {{--<th>Rg</th>
                         <th>Cpf</th>  
                        <th>Cnpj</th>--}}               
                        <th>Telefone Celular</th>
                        {{-- <th>Telefone Residencial</th>
                        <th>Telefone Comercial</th>--}}
                        <th> &nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>                        
                    
                </tbody>

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
                { data: 'id', name: 'id' },
                { data: 'nome', name: 'nome' },
                //{ data: 'rg', name: 'rg' },
                // { data: 'cpf', name: 'cpf' },
                //{ data: 'cnpj', name: 'cnpj' },
                { data: 'telefone_celular', name: 'Tel Cel' },  
                // { data: 'telefone_residencial', name: 'Tel Res' },  
                // { data: 'telefone_comercial', name: 'Tel Com' }, 
                { data: 'menu', name: 'menu', orderable: false, searchable: false},
            ],
        });
        
    });
      
    </script>

@endsection





