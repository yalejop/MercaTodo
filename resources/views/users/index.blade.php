@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="card-header">
            <h1>Users List</h1>
        </div>
        <br>

        @include('custom.message')
        
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Verified</th>
                <th scope="col">Role</th>
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
                    <td>
                      @isset($user->roles[0]->name)
                        {{ $user->roles[0]->name }}
                      @endisset
                    </td>
                    <td>
                      <form action="{{route('changeStatus', $user->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            @if ($user->isEnable)
                            <input class="btn btn-success" type="submit" value="Enable">
                            @else
                            <input class="btn btn-dark" type="submit" value="Disable">
                            @endif
                      </form>
                  </td>
                    <td>
                    <a class="btn btn-light" href="/users/{{$user->id}}/edit">Edit</a>
                    </td>
                  </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
@endsection
