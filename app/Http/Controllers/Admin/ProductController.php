<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

class ProductController extends AppController
{
    public function __construct(\App\Product $model)
    {
        $this->model = $model;
        $this->localView = 'product';
        $this->routerController = 'products';
        $this->listBox = ['category' => [\App\Category::class, 'id', 'category']];
        $this->resultView = [];
    }

    public function beforeSave(Request $request)
    {
        $this->trataCampoDecimal('price');
        $this->trataCampoDecimal('kcal');
        $this->trataCampoDecimal('kcal_grama');
        $this->trataCampoDecimal('carboidrato');
        $this->trataCampoDecimal('carboidrato_grama');
        $this->trataCampoDecimal('proteina');
        $this->trataCampoDecimal('proteina_grama');
        $this->trataCampoDecimal('gorduras');
        $this->trataCampoDecimal('gorduras_grama');
        $this->trataCampoDecimal('liquido');
        $this->trataCampoDecimal('liquido_grama');
        $this->trataCampoDecimal('sodio');
        $this->trataCampoDecimal('sodio_grama');
    }

    public function afterSave(Request $request, $result)
    {
        request()->validate([

            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = $result->id .'.'. request()->foto->getClientOriginalExtension();

        $data['id'] = $result->id;
        $data['img'] = $imageName;

        $result->update($data);

        request()->foto->move(public_path('images/produtos'), $imageName);
    }     
}