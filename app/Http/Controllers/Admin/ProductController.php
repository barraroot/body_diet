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