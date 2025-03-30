@extends('templates.app')
@section('title') Forum @endsection

@section('content')
    @foreach($topics as $topic)
        <div class="card my-5">
            <h5 class="card-header">Featured</h5>
            <div class="card-body">
                <h5 class="card-title">{{ $topic->topic }}</h5>
                <p class="card-text">{{ $topic->description }}</p>
                <footer class="blockquote-footer">posted in {{ $topic->created_at }} by <cite title="Source Title">{{ $topic->user_id }}</cite></footer>
                <a href="#" class="btn btn-primary">Details</a>
            </div>
        </div>
    @endforeach
@endsection
