@extends('template.main')

@section('content')

@include('template.componentes.titulo-pagina', [
    'titulo' => 'Gestão de Empresa - Pesquisa',

])


<div class="card mt-3">

    @include('template.mensagens.mensagem')
        
    <div class="card-body">
   
        <table id="empresas" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>UF</th>
                    <th>CNPJ</th>
                    <th>Nome</th>
                    <th> &nbsp; </th>
                   
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

    $( function () {

        $('#empresas').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('ajax.empresas') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'uf', name: 'uf' },
                { data: 'cnpj', name: 'cnpj' },
                { data: 'nome', name: 'nome' },
                { data: 'menu', name: 'menu', orderable: false, searchable: false},
            ],

        });        

    });
        
</script>

@endsection





