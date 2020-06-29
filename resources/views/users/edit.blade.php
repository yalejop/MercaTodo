@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="card-header">
            <h1>Users Edit</h1>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <a class="btn btn-secondary" href="/users">Back</a>    
            </div>    
        </div> 
        <br>
        <div class="row">
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
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
           
    </div>
    
</body>
@endsection
