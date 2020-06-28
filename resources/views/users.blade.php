@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="card-header">
            Modificacion de Users
        </div>
        <br>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Verified</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->email_verified_at}}</td>
                  </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
@endsection
