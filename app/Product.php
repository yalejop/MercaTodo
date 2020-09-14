<?php

namespace App;

use App\Cart;
use App\Order;
use App\CategoriaProducto;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'stock', 'image', 'categoria_id', 'status',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
