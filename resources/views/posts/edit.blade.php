@extends('layouts.layout')
@section('content')

<div>
    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method("PUT")
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{$post->title}}" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        
        <label for="body">Body:</label>
        <input type="text" name="body" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        
        <button type="submit">Edit Post</button>
    </form>
</div>

    
@endsection
    
