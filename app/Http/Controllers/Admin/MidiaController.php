<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;
use App\Midia;

class MidiaController extends AppController
{
    public function __construct(\App\Midia $model)
    {
        $this->model = $model;
        $this->localView = 'midia';
        $this->routerController = 'midia';
        $this->resultView = [];
    }

    public function afterSave(Request $request, $result)
    {
        request()->validate([

            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = $result->id.'.'.request()->img->getClientOriginalExtension();

        $data['id'] = $result->id;
        $data['img'] = $imageName;

        $result->update($data);

        request()->img->move(public_path('images/midia'), $imageName);
    }     
}
