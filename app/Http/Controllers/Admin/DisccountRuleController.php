<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

class DisccountRuleController extends AppController
{
    public function __construct(\App\DisccountRule $model)
    {
        $this->model = $model;
        $this->localView = 'disccountrules';
        $this->routerController = 'diccountrules';
    }

    public function beforeSave(Request $request)
    {
        $this->trataCampoDecimal('valor');
        $this->trataCampoDecimal('diccount_frete');
        $this->trataCampoDecimal('diccount_order');
    }    
}
