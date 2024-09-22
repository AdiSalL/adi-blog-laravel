@extends('layouts.layout')
@section('content')
<h1>Moderate Comments</h1>
    <ul>
        @foreach($posts->comments as $comment)
            @if(!$comment->approved)
                <li>
                    {{$comment->body}} - {{$comment->user->name ?? "Anonymous"}}
                    <form action="{{route('comments.approve', $comment->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <button type="submit">Approve</button>
                    </form>

                    <form action="{{route('comments.destroy', $comment->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endif
            
        @endforeach
    </ul>

@endsection