<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

class CategoryController extends AppController
{
    public function __construct(\App\Category $model)
    {
        $this->model = $model;
        $this->localView = 'category';
        $this->routerController = 'categories';
    }
}
