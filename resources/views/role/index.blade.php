@extends('layouts.app')

@section('botones')

  <a href="{{route('inicio.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>Back
  </a>
  <a href="{{route('role.create')}}" class="btn btn-outline-success mr-2 text-uppercase font-weight-bold">
        <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>Create New Role
  </a>
    
@endsection

@section('content')

  <h1 class="user-title mb-2 mt-4">
  Roles List
  <svg class="icon-nav" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
  </h1>
  

  <div class="col-md-12 mx-auto bg-white p-3">               
    <table class="table table-hover">
      <thead class="bg-primary text-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name
            <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          </th>
          <th scope="col">Slug</th>
          <th scope="col">Description
            <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
          </th>
          <th scope="col">Full-access
            <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
          </th>
          <th scope="col">Show
            <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
          </th>
          <th scope="col">Edit
            <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
          </th>
          <th scope="col">Delete
            <svg class="icon-user" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
          </th>
          <th colspan="3"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $role)
          <tr>
            <th scope="row">{{ $role->id }}</th>
            <td>{{ $role->name }}</td>
            <td>{{ $role->slug }}</td>
            <td>{{ $role->description }}</td>
            <td>{{ $role['full-access'] }}</td>
            <td>
              <a href="{{route('role.show', $role->id)}}" class="btn btn-info mb-2 d-block w-100">Show</a>
            </td>
            <td>
              <a href="{{route('role.edit', $role->id)}}" class="btn btn-dark mb-2 d-block w-100">Edit</a>
            </td>
            <td>
              <form action="{{route('role.destroy', $role->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mb-2 d-block w-100" type="submit">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $roles->links() }}
  </div>
@endsection
