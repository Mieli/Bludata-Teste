<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as IlluminateAuth;

class LoginController extends Controller
{
    
    public function autenticar(Request $request){

        $data = $request->all();

        $remember = ($request['remember']) ? true : false;

        $acesso = Auth::attempt(['email' => $data['email'], 'password' => $data['password'] ], $remember);

        if(!$acesso){            
            $erro = "Credenciais Inválidas";            
            return view('authenticate.login', compact('erro'));
        } 
        return redirect()->route('home');

    }

    public function sair(){
       
        Auth::logout();          
   
        return redirect()->route('login');

    }

}
