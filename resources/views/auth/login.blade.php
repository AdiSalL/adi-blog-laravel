@extends('layouts.layout')
@section('content')
<h1>Login</h1>
<form action="{{route('login-user')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(Session::has("success"))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{Session::get("success")}}</span>
        </div>
    @endif
    @if (Session::has("fail"))
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{Session::get("fail")}}</span>
        </div>
    @endif
    <label class="input input-bordered flex items-center gap-2" for="email">
        Email
        <input type="text" name="email" class="grow" placeholder="email@email.com" value="{{ old('email') }}"/>
        @error("email")
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{$message}}</span>
        </div>
        @enderror
    </label>

    <label class="input input-bordered flex items-center gap-2" for="password">
        Password
        <input type="password" name="password" class="grow" placeholder="Type Your Password"/>
        @error('password')
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{$message}}</span>
        </div>
        @enderror
    </label>

    <br>
    <div>
        <button type="submit" class="btn btn-wide">Login To Your Account</button>
    </div>
    <br>
    <a href="register">Register Your Account</a>

</form>
@endsection
