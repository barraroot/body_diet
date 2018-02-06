<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'vd', 'kcal', 'kcal_grama', 'carboidrato', 'carboidrato_grama', 'proteina', 'proteina_grama', 'gorduras', 'gorduras_grama', 'liquido', 'liquido_grama', 'sodio', 'sodio_grama', 'category_id', 'pontos', 'emagrecimento', 'gluten', 'lactose', 'show_ini', 'img', 'ativo', 'img_mini',
        'sku'
    ];

    protected $casts = [ 
        'emagrecimento' => 'boolean',
        'gluten' => 'boolean',
        'lactose' => 'boolean',
        'show_ini' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
