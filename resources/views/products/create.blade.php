@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
@endsection

@section('botones')

    <a href="{{route('products.index')}}" class="btn btn-primary mr-2">Back</a>
    
@endsection

@section('content')

    <h2 class="text-center mb-5">
        Create New Product
    </h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                        <label for="title">Title Product:</label>
                        <input type="text" name="title" class="form-control @error('title')
                        is-invalid
                    @enderror" id="title"
                        placeholder="Products Title"
                        value="{{old('title')}}">
                    @error('title')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="description">Description:</label>
                    <input type="hidden" name="description" id="description" value="{{old('description')}}">
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
                    <label for="price">Price Product:</label>
                    <input type="text" name="price" class="form-control @error('price')
                    is-invalid
                @enderror" id="price"
                    placeholder="Price Product"
                    value="{{old('price')}}">
                @error('price')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="stock">Stock Product:</label>
                    <input type="number" name="stock" class="form-control @error('stock')
                    is-invalid
                @enderror" id="stock"
                    placeholder="Stock Product"
                    value="{{old('stock')}}">
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
                    @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tags">Tags Product:</label>
                    <input type="text" name="tags" class="form-control @error('tags')
                    is-invalid
                @enderror" id="tags"
                    placeholder="Tags Product"
                    value="{{old('tags')}}">
                @error('tags')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add Product">
                </div>
            </form>
        </div>
    </div>

    @section('scripts')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous"defer></script>
    @endsection

@endsection
