@extends('layouts.app')

@section('botones')
  <a href="{{route('inicio.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>Back
  </a>
@endsection

@section('content')
 
  @include('custom.message')
  <h1 class="user-title mb-4 mt-4">
    Manage your Users
    <svg class="icon-nav" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
  </h1>
  <div class="col-md-12 mx-auto bg-white p-2">     
    <table class="table">
      <thead class="bg-primary text-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre
              <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </th>
            <th scope="col">Email
              <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </th>
            <th scope="col">Verified
              <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
            </th>
            <th scope="col">Role
              <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </th>
            <th scope="col">Status
              <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
            </th>
            <th scope="col">Editar
              <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
            </th>
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
                @method('PUT')
                @if ($user->isEnable)
                <input class="btn btn-success mb-2 d-block w-100" type="submit" value="Enable">
                @else
                <input class="btn btn-dark mb-2 d-block w-100" type="submit" value="Disable">
                @endif
              </form>
            </td>
            <td>
              <a class="btn btn-info mb-2 d-block w-100" href="{{route('users.edit',$user->id)}}">
                Edit
              </a>
            </td>
          </tr> 
        @endforeach
      </tbody>
    </table>
    <div class="col-12 mt-4 justify-content-center d-flex">
      {{$users->links()}}
  </div>
 </div>

@endsection
