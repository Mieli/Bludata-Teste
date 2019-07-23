<a  href="{!! route('fornecedores.show',$id)  !!}" >
        <button class="btn btn-success pull-left" title="Ver detalhes"> <i class="fa fa-search"></i></button>
</a>

<a  href="{!! route('fornecedores.edit',$id)  !!}" >
        <button class="btn btn-warning ml-2 pull-left"  title="Alterar registro"><i class="fa fa-edit"></i></button>
</a>

{!! Form::open(['route' => ['fornecedores.destroy', $id], 'method' => 'delete', 'class' => '']) !!}
    
    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'title' => 'Excluir Registro', 'class' => 'btn btn-danger ml-2' ,'onclick' => "return confirm('Deseja realmente excluir o registro ?');"])  !!}

{!! Form::close() !!}