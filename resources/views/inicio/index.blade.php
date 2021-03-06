@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('hero')
    <div class="hero-products">
        <form action="{{route('search.show')}}" class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 search-text">
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
    <div class="container">
        <h2 class="user-title text-uppercase mb-4">Latest Products</h2>
        <div class="owl-carousel owl-theme">
            @foreach ($nuevos as $nuevo)
                    <div class="card">
                     <img src="storage/{{$nuevo->image}}" alt="Product Image" class="card-img-top" height="350">
                        <div class="card-body">
                            <h3>
                                {{ Str::title($nuevo->title)}}
                            </h3>
                            <p>
                            {{ Str::words(strip_tags($nuevo->description), 20)}}
                            </p>
                            <div class="money">
                                <div class="symbol">
                                    $
                                </div>
                                <span class="price-value">
                                    {{$nuevo->price}}
                                </span>
                                <span class="stock-value">
                                    COP
                                </span>
                            </div>
                            <form
                                class="d-inline"
                                method="POST"
                                action="{{ route('products.carts.store', ['product' => $nuevo->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-success mb-3">Add To Cart</button>
                            </form>
                            <a href="{{route('products.show', $nuevo->id)}}" class="btn btn-primary d-block font-weight-bold text-uppercase">Show Product</a>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <h2 class="user-title text-uppercase mb-4 mt-2">All Products</h2>
        <div class="row">
            @foreach ($nuevos as $nuevo)
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="storage/{{$nuevo->image}}" alt="Imagen Producto" class="card-img-top" height="350">
                            <div class="card-body">
                                <h3>
                                    {{ Str::title($nuevo->title)}}
                                </h3>
                                <p>
                                    {{ Str::words(strip_tags($nuevo->description), 20)}}
                                </p>
                                <div class="money">
                                    <div class="symbol">
                                        $
                                    </div>
                                    <span class="price-value">
                                        {{$nuevo->price}}
                                    </span>
                                    <span class="stock-value">
                                        COP
                                    </span>
                                </div>
                                <form
                                    class="d-inline"
                                    method="POST"
                                    action="{{ route('products.carts.store', ['product' => $nuevo->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success mb-3">Add To Cart</button>
                                </form>
                                <a href="{{route('products.show', $nuevo->id)}}" class="btn btn-primary d-block font-weight-bold text-uppercase">Show Products</a>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    <div>
        {{$nuevos->links()}}
    </div>
@endsection