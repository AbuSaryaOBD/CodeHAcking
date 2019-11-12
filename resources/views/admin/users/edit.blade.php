@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{ $user->photo ? $user->photo->file : '/images/aj.png' }}" alt="" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">
            <form method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label for="role_id">Role :</label>
                    <select class="form-control" name="role_id">
                        @foreach ($roles as $role)
                            @if ($role->id == $user->role_id)
                                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @else
                                <option value="{{ $role->id }}">{{ $role->name }}</option>    
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_active">Status :</label>
                    <select class="form-control" name="is_active">
                        @if ($user->is_active == 0)
                            <option value="0" selected>In Active</option>
                            <option value="1">Active</option>
                        @else   
                            <option value="0">In Active</option>
                            <option value="1" selected>Active</option>               
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    {{-- <img src="{{ $user->photo ? $user->photo->file :'/images/aj.png' }}" alt="User Photo" height="50px"> --}}
                    <label for="photo_id" style="display:inline">Change Picture :</label>
                    <input type="file" name="photo_id" style="display:inline">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

            <form action="{{ route('users.destroy',$user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
    @include('includes.form-error')
@endsection