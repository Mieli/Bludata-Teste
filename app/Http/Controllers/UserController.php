<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Exception;

class UserController extends Controller
{

    private $repository;


    public function __construct( UserRepository $repository)
    {
        $this->repository = $repository;
    }



    public function index()
    { 
        return view('usuario.home');
    }




    public function pesquisarUsuarios()
    {
        return view('usuario.pesquisa');
    }




    // metodo para preencher o Datatable da tela de pesquisa.
    public function ajax()
    {
        return datatables()->eloquent($this->repository->query())
                    ->addIndexColumn()
                    ->addColumn('menu', 'usuario.actions') // mostrar os botões no dataTable
                    ->rawColumns(['menu'])
                    ->make(true);
    }




    public function show($id)
    {
        $user = $this->repository->getId($id);
        
        if(count($user) != 0){

            return view('usuario.detalhes', [
                'usuario' => $user,
            ]);

        }else{
           
            return redirect()->route('usuarios.index')
                             ->with('mensagem-danger', 'Usuários não cadastrada no sistema!  ');

        }        
        
    }




    public function create()
    {
        return view('usuario.cadastro');
    }





    public function edit($id)
    {
        $user = $this->repository->getId($id);
        
        return view('usuario.editar',[
            'usuario' => $user,
        ]);
    }





    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'email|required',
            'password'  => 'required',
        ]);

        $request['password'] = bcrypt($request->password);

        try{
            $this->repository->create($request->all());
            
            return redirect()->route('usuarios.create')
                             ->with('mensagem-success', 'Cadastrado realizado com sucesso!'); 

        }catch( Exception $e ){
            return redirect()->route('usuarios.create')
            ->with('mensagem-danger', 'Houve um Problema: '. $e);

        }
       

    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'email|required'
        ]);

        try{

            $this->repository->update($id, $request->all());
            
            return redirect()->route('usuarios.index')
                             ->with('mensagem-success', 'Atualização realizada com sucesso!'); 

        }catch( Exception $e ){

            return redirect()->route('usuarios.index')
                             ->with('mensagem-danger', 'Houve um Problema: '. $e);
                             
        }
    }






    public function destroy($id)
    {
       try{

            $this->repository->delete($id);
            return redirect()->route('pesquisar.usuarios')
                         ->with('mensagem-danger', 'Exclusão realizada com sucesso!');

       }catch( Exception $e ){

            return redirect()->route('usuarios.index')
                             ->with('mensagem-danger', 'Houve um Problema: '. $e);

       }
    }



}
