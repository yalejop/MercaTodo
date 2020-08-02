@extends('layouts.app')

@section('botones')
<a href="{{route('inicio.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
    <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>Back
</a>
@endsection

@section('content')
    <article class="products-content">
        <h1 class=" user-title-main mb-4">
            {{$products->title}}
        </h1>

        <div class="Products-image">
            <img src="/storage/{{$products->image}}" alt="Products Image" class="w-100">
        </div>
        <div class="products-meta mt-2">
            <div class="products">
                <h2 class="my-3 text-primary">Description:
                </h2>
                {!!$products->description!!}
            </div>

            <div class="tags">
                <h2 class="my-3 text-primary">Tags:
                </h2>
                {{$products->tags}}
            </div>

        </div>

    </article>

@endsection