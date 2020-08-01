@extends('layouts.app')

@section('botones')
<a href="{{route('role.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
    <svg class="icon-product" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>Back
</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create Roles</h2>
                </div>

                <div class="card-body">

                    @include('custom.message')
                    
                    <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="container">
                        <h3>Required Data</h3>

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Name"
                            name="name"
                            value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="slug" placeholder="Slug"
                            name="slug"
                            value="{{ old('slug') }}">
                        </div>
                          
                        <div class="form-group">
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description"
                            >{{ old('description') }}</textarea>
                        </div>
                        <hr>
                        <h3>Full Access</h3>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                            @if (old('full-access') == "yes")
                                checked
                            @endif
                            
                            >
                            <label class="custom-control-label" for="fullaccessyes">Yes</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" 
                            @if (old('full-access') == "no")
                             checked
                            @endif
                            @if (old('full-access') === null)
                             checked
                            @endif
                            >
                            <label class="custom-control-label" for="fullaccessno">No</label>
                          </div>

                        <hr>

                        <h3>Permission List</h3>

                        @foreach ($permissions as $permission)
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="permission_{{$permission->id}}"
                        value="{{$permission->id}}"
                        name="permission[]"

                        @if (is_array(old('permission')) && in_array("$permission->id", old('permission')))
                                checked
                         @endif
                        >
                            <label class="custom-control-label" for="permission_{{$permission->id}}">{{ $permission->id }}
                            - 
                            {{ $permission->name }}
                            <em>({{$permission->description}})</em>
                            </label>
                        </div>
                        @endforeach
                        <hr>
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
