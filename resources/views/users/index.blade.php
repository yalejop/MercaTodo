@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="card-header">
            <h1>Lista de Usuarios</h1>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Verified</th>
                <th scope="col">Status</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if ($user->email_verified_at)
                    <td scope="row"><i class="fas fa-check"></i></td>
                    @else
                    <td scope="row"><i class="fas fa-times"></i></td>
                    @endif
                    @if ($user->status)
                        <td><a href="" class="btn btn-primary">Enable</a></td>
                    @else
                      <td><a href="" class="btn btn-secundary">Disable</a></td>   
                    @endif
                    <td>
                    <a href="/users/{{$user->id}}/edit">Edit</a>
                  </td>
                  </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
@endsection
