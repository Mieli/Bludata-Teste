<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     *  Formata a data de cadastro no padrão (dd/mm/YYYY)
     */
    public function getCreatedAtAttribute()
    {   
        // capturo apenas a data
        $createdAt = explode(' ', $this->attributes['created_at']); 
        
        $dataCadastrada = explode('-', $createdAt[0]);

        $dataFormatada = $dataCadastrada[2] .'/'.$dataCadastrada[1] .'/'.$dataCadastrada[0]; 

        return $dataFormatada;
    }
    
}
