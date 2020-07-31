@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

@endsection

@section('hero')
    <div class="hero-categorias">
        <form action="{{route('search.show')}}" class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">
                        Find your Products for you next Purchase
                    </p>
                    <input type="search" name="search" id="search" class="form-control" placeholder="Find Products">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    
    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mb-4">Latest Products</h2>
        <div class="owl-carousel owl-theme">
            @foreach ($nuevos as $nuevo)
                <div class="card">
                    <img src="/storage/{{$nuevo->image}}" alt="Imagen Receta" class="card-img-top">

                    <div class="card-body">
                        <h3>{{ Str::title($nuevo->title)}}</h3>

                        <p>
                            {{ Str::words(strip_tags($nuevo->description), 20)}}
                        </p>

                        <a href="{{route('products.show', $nuevo->id)}}" class="btn btn-primary d-block font-weight-bold text-uppercase">Show Product</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mb-4 mt-4">All Products</h2>
        <div class="row">
            @foreach ($nuevos as $nuevo)
            <div class="col-md-4 mb-2">
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