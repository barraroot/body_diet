<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

class UserController extends AppController
{
    public function __construct(\App\User $model)
    {
        $this->model = $model;
        $this->localView = 'user';
        $this->routerController = 'users';
    }

    public function beforeSave(Request $request)
    {
    	$this->dataForm['password'] = bcrypt($this->dataForm['password']);
    }
}
