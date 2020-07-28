@extends('layouts.app')

@section('botones')

    <a href="{{route('products.create')}}" class="btn btn-primary mr-2">Create Product</a>
    
@endsection

@section('content')
<body>
    <div class="container">
        <div class="card-header">
            <h1>Products Manager</h1>
        </div>
        <br>
        <form action="" class="form-inline mt-2 ml-2">
            <input 
            class="form-control mr-sm-2 float-right" type="search" 
            name="search" 
            id="search"
            placeholder="Search your Product"
            aria-label="Search">
            <button 
            class="btn btn-outline-dark my-2 my-sm-0"
            type="submit">
            Buscar
            </button>
        </form>
        <br>
        @include('custom.message')

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">price</th>
                <th scope="col">Stock</th>
                <th scope="col">Status</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>
                        <form action="{{route('changeStatus', $product->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            @if ($product->isEnable)
                            <input class="btn btn-success" type="submit" value="Enable">
                            @else
                            <input class="btn btn-dark" type="submit" value="Disable">
                            @endif
                      </form>
                    </td>
                    <td>
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-dark mr-1">Ver</a>
                        <a class="btn btn-light" href="{{route('products.edit', $product->id)}}">Edit</a>
                    </td>
                  </tr> 
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    
</body>
@endsection
