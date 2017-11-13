<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

class FailureController extends AppController
{
    public function __construct(\App\Failures $model)
    {
        $this->model = $model;
        $this->localView = 'failure';
        $this->routerController = 'failure';
    }
}
