@extends('layouts.app')

@section('styles')
    

@endsection

@section('content')
    
    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mt-2 mb-4">Latest Products</h2>
        <div class="row">
            @foreach ($nuevos as $nuevo)
            <div class="col-md-6 mb-2">
                <div class="card">
                    <img src="/storage/{{$nuevo->image}}" alt="Imagen Producto" class="card-img-top">

                    <div class="card-body">
                        <h3>{{ Str::title($nuevo->title)}}</h3>

                        <p>
                            {{ Str::words(strip_tags($nuevo->description), 20)}}
                        </p>
                        <p class="item-price">${{$nuevo->price}}</p>
                        <p>Stock:  {{$nuevo->stock}}</p>

                        <a href="{{route('products.show', $nuevo->id)}}" class="btn btn-primary d-block font-weight-bold text-uppercase">Show Products</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection