@foreach ($fornecedores as $fornecedor)
<tr>
    <td> {{ $fornecedor->id }} </td>
    <td>
         <a title="Detalhe {!!$fornecedor->nome !!}" href="{!! route('fornecedores.show',$fornecedor->id)  !!}" >
            {{ $fornecedor->nome }} 
        </a> 
    </td>                     
    <td> {{ $fornecedor->telefone_celular }} </td>
    <td> {{ $fornecedor->telefone_residencial }} </td>
    <td> {{ $fornecedor->telefone_comercial }} </td>

    <td>
        
    </td>
    <td> {{ $fornecedor->telefones }} </td>

    
    
     <td>
        <a title="Alterar dados {!!$fornecedor->nome !!}" href="{!! route('fornecedores.edit',$fornecedor->id)  !!}" >
            <button class="btn btn-primary"> Alterar </button>
        </a>
    </td>
    
    <td>
        {!! Form::open(['route' => ['fornecedores.destroy', $fornecedor->id], 'method' => 'delete', 'class' => '']) !!}
            
            @include('formulario.submit', ['name' => 'Excluir',
                                            'attributes' => [                                            
                                                'class'  => 'btn btn-danger',
                                                'onclick' => "return confirm('Deseja realmente excluir $fornecedor->nome ?');"
                                          ]
            ])     
            
        {!! Form::close() !!}
    </td> 

</tr>    
@endforeach