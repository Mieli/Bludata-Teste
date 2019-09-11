<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository 
{
    private $user;

    public function __construct( User $user )
    {
        $this->user = $user;
    }

    public function pesquisarTodos()
    {
        return $this->user->all();
    }

    public function getId($id)
    {
        return $this->user->where('id', $id)->get();
    }

    /**
     *  Metodo que retorna solicitação do DataTable
     */
    public function query()
    {   
        return User::query();
    }


    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);
        $user->name     = $data['name'];
        $user->email    = $data['email'];

        return $user->save();
    }

    public function delete($id)
    {
        $user = User::find($id);
        return $user->delete();
    }

}