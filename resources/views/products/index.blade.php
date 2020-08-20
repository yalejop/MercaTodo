@extends('layouts.app')

@section('botones')

    <a href="{{route('products.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>Back
    </a>
    <a href="{{route('products.create')}}" class="btn btn-outline-success mr-2 text-uppercase font-weight-bold">
        <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>Create New Product
    </a>
    
@endsection

@section('content')
    <form action="" class="form-inline ml-2">
        {{-- <label class="col-sm-2 col-form-label" for="search">Search: </label> --}}
        <input 
            class="form-control mr-sm-2 float-right" type="search" 
            name="search" 
            id="search"
            placeholder="Search your Product"
            aria-label="Search">
        <button 
            class="btn btn-outline-dark my-2 my-sm-0"
            type="submit">
            Search
            <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
    </form>
    <br>
    @include('custom.message')
    <h1 class="user-title  mb-3">
        Products Manager
        <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
    </h1>
    <div class="col-md-12 mx-auto bg-white p-3"> 
        <table class="table">
            <thead class="bg-primary text-light">
              <tr>
                <th scope="col">id</th>
                <th scope="col">Title
                    <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </th>
                <th scope="col">Price
                    <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </th>
                <th scope="col">Stock
                    <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </th>
                <th scope="col">Status
                    <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                </th>
                <th scope="col">Show
                    <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </th>
                <th scope="col">Editar
                    <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td><strong>{{$product->id}}</strong></td>
                    <td>{{$product->title}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>
                        @if ($product->status == 'available')
                            <input class="btn btn-success mb-2 d-block w-100" type="submit" value="Available">
                        @else
                            <input class="btn btn-dark mb-2 d-block w-100" type="submit" value="Unavailable">
                        @endif
                    </td>
                    <td>
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-info mb-2 d-block w-100">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-light mb-2 d-block w-100" href="{{route('products.edit', $product->id)}}">Edit</a>
                    </td>
                  </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $products->links() }}
@endsection
