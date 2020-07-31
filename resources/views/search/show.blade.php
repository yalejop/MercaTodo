@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mb-4">
            Product Searched: {{$search}}
        </h2>

        <div class="row">
            @foreach ($products as $product)
            <div class="card">
                <img src="/storage/{{$product->image}}" alt="Imagen Receta" class="card-img-top">

                <div class="card-body">
                    <h3>{{ Str::title($product->title)}}</h3>

                    <p>
                        {{ Str::words(strip_tags($product->description), 20)}}
                    </p>

                    <a href="{{route('products.show', $product->id)}}" class="btn btn-primary d-block font-weight-bold text-uppercase">Show Product</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{$products->links()}}
        </div>
    </div>
@endsection