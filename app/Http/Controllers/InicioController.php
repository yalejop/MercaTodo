<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        //obtener las productos mas recientes
        $nuevos = Product::orderBy('created_at')->paginate(9);
        //nuevos = Product::latest()->take(10)->get();

        return view('inicio.index', compact('nuevos'));
    }
}

