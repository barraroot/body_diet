<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

class ImageBannerController extends AppController
{
    public function __construct(\App\ImageBanner $model)
    {
        $this->model = $model;
        $this->localView = 'banners';
        $this->routerController = 'imagebanner';
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

        request()->img->move(public_path('images/banner'), $imageName);
    }  
}
