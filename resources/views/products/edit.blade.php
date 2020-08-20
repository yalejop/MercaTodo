@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
@endsection

@section('botones')

<a href="{{route('products.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
    <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>Back
</a>
    
@endsection

@section('content')
    <h2 class="text-center mb-3 font-weight-bold">
        Edit Products: {{$products->title}}
    </h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="post" action="{{route('products.update', $products->id)}}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                        <label for="products">
                            Products Title:
                        </label>
                        <input type="text" name="title" class="form-control @error('title')
                        is-invalid
                     @enderror" id="products"
                        placeholder="Products Title"
                        value="{{$products->title}}">
                     @error('title')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                     @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="description">
                        Description:
                    </label>
                    <input type="hidden" name="description" id="description" value="{{$products->description}}">
                    <trix-editor
                    class="form-control @error('description')
                    is-invalid @enderror"
                    input="description"></trix-editor>
                    @error('description')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">
                        Price Product:
                    </label>
                    <input type="text" name="price" class="form-control @error('price')
                    is-invalid
                    @enderror" id="price"
                    placeholder="Price Product"
                    value="{{$products->price}}">
                    @error('price')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stock">
                        Stock Product:
                    </label>
                    <input type="number" name="stock" class="form-control @error('stock')
                    is-invalid
                    @enderror" id="stock"
                    placeholder="Stock Product"
                    value="{{$products->stock}}">
                    @error('stock')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="image">Select an image:</label>
                    <input type="file" src="" alt="image receta" id="image" class="form-control @error('image')
                    is-invalid @enderror" name="image">
                    <div class="mt-4">
                        <p>
                            Current Image:
                        </p>
                        <img src="/storage/{{$products->image}}" alt="Imagen a editar" style="width: 300px">
                    </div>
                    @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="custom-select" name="status" required>
                        <option value="" selected>Select...</option>
                        <option {{ old('status') == 'available' ? 'selected' : '' }} value="available">Available</option>
                        <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Category Product:</label>
                    <select name="category" class="form-control @error('category')
                    is-invalid @enderror" id="category">
                        <option value="">-- Choose One--</option>
                        @foreach ($categories as $category)
                            <option 
                            value="{{$category->id}}"
                            {{ old('category') == $category->id ? 'selected' : ''}}
                            >{{$category->nombre}}
                            </option>    
                        @endforeach
                    </select>
                        @error('category')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>

    @section('scripts')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous" defer></script>
    @endsection

@endsection
