@extends('layouts.admin')

@section('header')
<h1>Update Post</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-3 ">
        <img src="{{$post->photo ? $post->photo->file:'/images/icon-pad.png'}}" alt="No Picture" width="100%">
    </div>
    <div class="col-sm-9">
        <form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $id => $name)
                        @if ($post->category_id == $id)
                            <option value="{{ $id }}" selected>{{ $name }}</option>
                        @else
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endif 
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
                <textarea name="body" class="form-control" rows="5">{{ $post->body }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Post</button>
            </div>
        </form>
        <form action="{{ route('posts.destroy',$post->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
    @include('includes.form-error')
@endsection