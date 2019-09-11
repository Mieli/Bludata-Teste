 <!-- TO DO List -->
 <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                {{ $titulo ?? '' }}
            </h3>

            <div class="card-tools">  </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <ul class="todo-list">

            @foreach ($empresas as $empresa)

                <li>
                    <span class="text mr-3">
                        {{ $empresa->created_at }}
                    </span>
                    <a href="{{ route('empresas.show', $empresa->id)}}">
                        <span class="text">{{ $empresa->nome }}</span>
                    </a>
                    
                </li>

            @endforeach

        </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="{{ route('empresas.create') }}">
                <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> Cadastrar Empresa</button>
            </a>    
        </div>
    </div>
    <!-- /.card -->