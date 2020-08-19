<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'stock', 'image', 'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaProduct::class);
    }
}
