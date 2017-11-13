<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Midia extends Model
{
    protected $fillable = ['title', 'img', 'link', 'type'];
}
