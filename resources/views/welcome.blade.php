@extends('layouts.layout')
@section('content')

    <h1>Dashboard</h1>
    @auth
        <p>{{Auth::user()->name}}</p>
        <p>{{Auth::user()->email}}</p>
        <a href="logout" class="btn btn-ghost">Log Out</a>
    @else
        <a href="login" class="btn btn-ghost">Log In</a>
    @endauth
<div>
    <h1>Example Blog Post</h1>
    <ul class="mx-auto">
        @foreach ($posts as $post)
            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('posts.create') }}">Create New Post</a>

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
    
@endsection
    

