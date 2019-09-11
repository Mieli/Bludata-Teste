<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [ 
        'name', 'email', 'password',
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     *  Formata a data de cadastro no padrão (dd/mm/YYYY)
     */
    public function getCreatedAtAttribute()
    {   
        // divide a timestamp em um array com 2 posições, (DATA posição 0 e HORA posição 1)
        $createdAt = explode(' ', $this->attributes['created_at']); 
        
        $dataCadastrada = explode('-', $createdAt[0]);

        $dataFormatada = $dataCadastrada[2] .'/'.$dataCadastrada[1] .'/'.$dataCadastrada[0]; 

        return $dataFormatada;
    }
    
}
