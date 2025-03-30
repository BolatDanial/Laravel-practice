@extends('templates.app')
@section('title') Welcome @endsection

@section('content')
    @include('includes.hero')
    <div class="row">
        <div class="col-8">
            <h1>Home page</h1>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias culpa cum eaque eveniet ex impedit labore repellendus repudiandae sequi voluptas? Blanditiis culpa cum dolor eveniet impedit quis vero! Optio, quibusdam.
        </div>
        <div class="col-4">
            <h2>this is additional content</h2>
        </div>
    </div>
@endsection
