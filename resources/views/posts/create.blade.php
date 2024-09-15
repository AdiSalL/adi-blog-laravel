@extends('layouts.layout')
@section('content')

<div>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        
        <label for="body">Body:</label>
        <input type="text" name="body" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        
        <button type="submit">Add Post</button>
    </form>
</div>

    
@endsection
    
