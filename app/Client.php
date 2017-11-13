<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nome', 'email', 'senha', 'cpf', 'cep', 'endereco', 'numero', 'complemento', 'cidade', 'estado', 'telefone', 'celular', 'bairro', 'nascimento',
    ];
}
