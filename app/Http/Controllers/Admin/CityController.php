<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;
use App\Cities;

class CityController extends AppController
{
    public function __construct(\App\Cities $model)
    {
        $this->model = $model;
        $this->localView = 'city';
        $this->routerController = 'cities';
        $this->defaultOrder = 'city';
    }

    public function beforeSave(Request $request)
    {
        $this->trataCampoDecimal('frete');
        $this->trataCampoDecimal('valor_minimo');
    }    
}
