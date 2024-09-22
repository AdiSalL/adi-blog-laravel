@extends('layouts.layout')
@section('content')

@if(session("success"))
<div role="alert" class="alert alert-success">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-6 w-6 shrink-0 stroke-current"
      fill="none"
      viewBox="0 0 24 24">
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span> {{ session('success') }}</span>
  </div>
@endif

<ul>
    <li>{{$posts->title}}</li>
    <li>{{$posts->body}}</li>
    <li>{{$posts->category->name}}</li>
</ul>

@if(Auth::check())
  <form action="{{route('comments.store', $posts->id)}}" method="POST">
    @csrf
    <label for="body">Leave a comment:</label>
    <textarea name="body" id="body" cols="30" rows="10"></textarea>
    <button type="submit">Submit</button>
  </form>
@endif
<h3>Comments</h3>
@if($posts->comments->isEmpty())
<p>No Comments</p>
@endif
<ul>
  @foreach ($posts->comments as $comment)
      @if($comment->approved)
        <li>{{$comment->body}} - <strong>{{$comment->user->name ?? "Anonymous"}}</strong></li>
      @else
        <li>This comment is waiting for approval</li>
      @endif
  @endforeach
</ul>




<a href="{{route("dashboard")}}">Back To All Post</a><br>
<a href="{{route("admin.panel", $posts->id)}}">Admin Panel</a><br>
<a href="{{route("posts.edit", $posts->id)}}">Edit Post</a>
<form action="{{route('posts.destroy', $posts->id)}}" method="POST">
  @csrf
  @method("delete")
  <button type="submit">Delete Post</button>
</form>
@endsection
    

