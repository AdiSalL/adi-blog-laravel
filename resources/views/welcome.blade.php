@extends('layouts.layout')
@section('content')

    <h1>Welcome to my blog</h1>

<div>
    <h1 class="text-2xl font-bold">Here are my thought</h1>
    <ul class="mx-auto">
        @foreach ($posts as $post)
            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>



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
    

