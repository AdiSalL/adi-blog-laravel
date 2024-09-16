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

<a href="{{route("dashboard")}}">Back To All Post</a><br>
<a href="{{route("posts.edit", $posts->id)}}">Edit Post</a>
<form action="{{route('posts.destroy', $posts->id)}}" method="POST">
  @csrf
  @method("delete")
  <button type="submit">Delete Post</button>
</form>
@endsection
    

