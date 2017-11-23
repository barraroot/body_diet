<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $fillable = ['id', 'client_id', 'status', 'total_produtos', 'frete', 'total', 'pontos', 'obs', 'cep', 'endereco', 'numero', 'complemento', 'cidade', 'estado', 'telefone', 'bairro', 'email', 'nome', 'forma_pagamento', 'coupon_id', 'desconto', 'desconto_p'];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }    

    public function coupon()
    {
        return $this->belongsTo('App\Coupon');
    }  
}
