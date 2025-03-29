@extends('templates.app')
@section('title') Welcome @endsection

@section('content')
    @include('includes.messages')

    <form class="mt-5" action="{{ route('login-submit') }}" method="POST">
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
    </form>
@endsection
