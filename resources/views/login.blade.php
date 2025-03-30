@extends('templates.app')
@section('title') Login @endsection

@section('content')

    <form class="mt-5" action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="text" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="text" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <div id="form" class="form-text">Don't have an account? Try to <a href="{{ route('registerForm') }}">sign in</a></div>
    </form>
@endsection
