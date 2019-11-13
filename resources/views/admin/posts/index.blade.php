@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>   

    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img src="{{$post->photo ? $post->photo->file:'/images/icon-pad.png'}}" alt="No Picture" height="50px"></td>
                        <td> <a href="{{ route('posts.edit',$post->id) }}">{{$post->user->name}}</a></td>
                        <td>{{ $post->category ? $post->category->name : 'Uncategorized'}}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->body,10) }}</td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            @endif
      </table>
@endsection