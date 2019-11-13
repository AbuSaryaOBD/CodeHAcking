@extends('layouts.admin')

@section('header')
<h1>Categories</h1> 
@endsection

@section('content')

    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
            {{-- @if ($posts) --}}
                {{-- @foreach ($posts as $post) --}}
                    <tr>
                        <td>0</td>
                        <td>Ungategorized</td> 
                    </tr>
                {{-- @endforeach --}}
            {{-- @endif --}}
      </table>
@endsection