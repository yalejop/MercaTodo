<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        //obtener las productos mas recientes
        //$nuevos = Product::orderBy('created_at', 'ASC')->get();
        $nuevos = Product::latest()->take(10)->get();

        return view('inicio.index', compact('nuevos'));
    }
}

