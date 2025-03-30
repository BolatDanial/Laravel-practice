@extends('templates.app')
@section('title') Forum @endsection

@section('content')
    <div class="card my-5">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <h5 class="card-title">{{ $topic->topic ?? 'No topic' }}</h5>
            <p class="card-text">{{ $topic->description ?? 'No description' }}</p>
            <p class="card-text">{{ $topic->content ?? 'No content' }}</p>
        </div>
    </div>
@endsection
