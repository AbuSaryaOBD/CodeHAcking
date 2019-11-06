@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>
    <form method="POST" action="{{ action('AdminUserController@store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
        </div>
        <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
            <label for="role_id">Role :</label>
            <select class="form-control" name="role_id">
                @foreach ($roles as $role)
                @if ($role->id == 2)
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
                <option value="0" selected>In Active</option>
                <option value="1">Active</option>
            </select>
        </div>
        <div class="form-group">
            <label for="photo_id">Upload :</label>
            <input type="file" name="photo_id">
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>

    @include('includes.form-error')
@endsection