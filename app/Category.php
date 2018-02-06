<?php

namespace App;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TableInterface
{
    protected $fillable = [
        'category', 'show', 'ordem'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function getTableHeaders()
    {
        return  ['ID', 'Categoria', 'Exibir?'];
    }

    public function getValueForHeader($header)
    {
        switch($header)
        {
            case 'ID':
                return $this->id;
            case 'Categoria':
                return $this->category;
            case 'Exibir?':
                return ($this->show == 1 ? "Sim":"Não");
        }
    }    
}
