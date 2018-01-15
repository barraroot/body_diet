<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AppController;

class ContactController extends AppController
{
    public function __construct(\App\Contact $model)
    {
        $this->model = $model;
        $this->localView = 'contacts';
        $this->routerController = 'contacts';
        $this->defaultOrderPosition = 'desc';
    }

    public function visto($id)
    {
    	$contact = \App\Contact::findOrFail($id);
    	$contact->update(['status' => 'Visto']);

    	return redirect()->route('admincontacts.show', $id);
    }
}
