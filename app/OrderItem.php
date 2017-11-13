<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

	protected $fillable = ['order_id', 'product_id', 'preco', 'qtde', 'total', 'pontos'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    } 

    public function product()
    {
        return $this->belongsTo('App\Product');
    }        
}
