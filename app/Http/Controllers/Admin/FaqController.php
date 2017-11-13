<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;
use App\Fags;

class FaqController extends AppController
{
    public function __construct(\App\Faqs $model)
    {
        $this->model = $model;
        $this->localView = 'faqs';
        $this->routerController = 'faq';
    }
}
