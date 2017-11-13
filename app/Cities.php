<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Bootstrapper\Interfaces\TableInterface;

class Cities extends Model
{
    protected $fillable = [
        'city', 'frete', 
    ];
}
