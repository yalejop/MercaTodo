@extends('layouts.app')


@section('content')
    <article class="products-content">
        <h1 class="text-center mb-4">
            {{$products->title}}
        </h1>

        <div class="Products-image">
            <img src="/storage/{{$products->image}}" alt="Products Image" class="w-100">
        </div>
        <div class="products-meta mt-2">
            <div class="products">
                <h2 class="my-3 text-primary">Description:
                </h2>
                {{$products->description}}
            </div>

            <div class="tags">
                <h2 class="my-3 text-primary">Tags:
                </h2>
                {{$products->tags}}
            </div>

        </div>

    </article>

@endsection