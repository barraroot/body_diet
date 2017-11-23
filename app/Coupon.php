<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['name', 'validade', 'desconto'];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }    
}
