<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

class CouponController extends AppController
{
    public $relationships = ['orders'];

    public function __construct(\App\Coupon $model)
    {
        $this->model = $model;
        $this->localView = 'coupon';
        $this->routerController = 'coupons';
    }

    public function beforeSave(Request $request)
    {
    	$this->trataCampoDecimal('desconto');
    }      
}
