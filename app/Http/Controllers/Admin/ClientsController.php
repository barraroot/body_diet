<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;
use App\Client;

class ClientsController extends AppController
{
    public function __construct(\App\Client $model)
    {
        $this->model = $model;
        $this->localView = 'client';
        $this->routerController = 'clients';
    }
}
