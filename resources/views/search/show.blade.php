@extends('layouts.app')

@section('botones')
<a href="{{route('inicio.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
    <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>Back
</a>
@endsection
    
@section('content')
    <div class="mb-4 mt-2">
        <h2 class="user-title text-uppercase mb-4">
            Product Searched: {{$search}}
        </h2>

        <div class="col-md-6 mb-2">
            @foreach ($products as $product)
            <div class="card">
                <img src="/storage/{{$product->image}}" alt="Product Image" class="card-img-top">

                <div class="card-body">
                    <h3>{{ Str::title($product->title)}}</h3>

                    <p>
                        {{ Str::words(strip_tags($product->description), 20)}}
                    </p>
                    <div class="money">
                        <div class="symbol">
                            $
                        </div>
                        <span class="price-value">
                            {{$product->price}}
                        </span>
                        <span class="stock-value">
                            COP
                        </span>
                    </div>
                    <div class="stock mb-2">
                        Stock:
                        <span class="stock-value">
                            {{$product->stock}}
                        </span>
                    </div>

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