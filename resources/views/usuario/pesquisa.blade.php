@extends('template.main')

@section('content')

    @include('template.componentes.titulo-pagina', [
        'titulo' => 'Gestão de Usuários - Pesquisa',

    ])


    <div class="card mt-3">

        @include('template.mensagens.mensagem')
            
        <div class="card-body">
    
            <table id="usuarios" class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Dt Cadastro</th>
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

        $('#usuarios').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('ajax.usuarios') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at', orderable: false, searchable: false },
                { data: 'menu', name: 'menu', orderable: false, searchable: false},
            ],

        });        

    });
        
</script>

@endsection





