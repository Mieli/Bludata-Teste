<a  href="{!! route('empresas.show',$id)  !!}" >
        <button class="btn btn-success pull-left" title="Ver detalhes"> <i class="fa fa-search"></i></button>
</a>

<a  href="{!! route('empresas.edit',$id)  !!}" >
        <button class="btn btn-info pull-left ml-2"  title="Alterar registro"><i class="fa fa-edit"></i></button>
</a>

{!! Form::open(['route' => ['empresas.destroy', $id], 'method' => 'delete', 'class' => '']) !!}
       
        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'title' => 'Excluir Registro', 'class' => 'btn btn-danger ml-2' ,'onclick' => "return confirm('Deseja realmente excluir o registro ?');"])  !!}
        
{!! Form::close() !!}