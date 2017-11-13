<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'client_id', 'status', 'total_produtos', 'frete', 'total', 'pontos', 'obs', 'cep', 'endereco', 'numero', 'complemento', 'cidade', 'estado', 'telefone', 'bairro', 'email', 'nome', 'forma_pagamento'
						  ];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }    

}
