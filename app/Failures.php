<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Failures extends Model
{
    protected $fillable = ['nome', 'email', 'telefone', 'status'];
}
