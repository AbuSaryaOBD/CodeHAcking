@extends('layouts.admin')

@section('header')
<h1>Create Post</h1>
@endsection

@section('content')
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            {{-- <p>{{ print_r($jar) }}</p> --}}
        </div>
        <div class="form-group">
            <label for="photo_id">File :</label>
            <input type="file" name="photo_id">
        </div>
        <div class="form-group">
            <label for="body">Description :</label>
            <textarea name="body" class="form-control" rows="5"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Post</button>
        </div>
    </form>

    @include('includes.form-error')
@endsection