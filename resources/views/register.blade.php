@extends('templates.app')
@section('title') Welcome @endsection

@section('content')
    <div class="container">

        <form class="mt-5" action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Enter your name</label>
                <input name="name" type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="text" class="form-control" id="email" aria-describedby="email">
                <div id="email" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="text" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="repeat-password" class="form-label">Repeat password</label>
                <input name="repeat-password" type="text" class="form-control" id="repeat-password">
            </div>
            <button aria-describedby="form" type="submit" class="btn btn-success">Submit</button>
            <div id="form" class="form-text">Already have an account? Try to <a href="{{ route('loginForm') }}">log in</a></div>
        </form>
    </div>
@endsection
