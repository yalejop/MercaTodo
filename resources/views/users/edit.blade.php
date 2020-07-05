@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="card-header">
            <h1>User Edit</h1>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="/users">Back</a>    
            </div>    
        </div> 
        <br>
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/users/{{$users->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Type a new name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Type a new email" value="{{ old('email') }}">
                    </div>
                    <button class="btn btn-success" type="submit">Update</button>
                </form>
            </div>
        </div>
           
    </div>
    
</body>
@endsection
