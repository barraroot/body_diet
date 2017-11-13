<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'nome', 'email', 'telefone', 'cidade', 'assunto', 'mensagem', 'status'
    ];
}
