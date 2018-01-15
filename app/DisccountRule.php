<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisccountRule extends Model
{
    protected $fillable = ['title', 'valido', 'valor', 'diccount_frete', 'diccount_order'];
}
