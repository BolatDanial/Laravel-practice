@extends('templates.app')
@section('title') Forum @endsection

@section('content')
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold">Welcome to the Forum</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Here you can read and participate in any topic that you find interesting in all collection, or even create your own discussion</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <a href="{{ route('createTopicForm') }}"><button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Create discussion</button></a>
            </div>
        </div>
    </div>

    @foreach($topics as $topic)
        <div class="card my-5">
            <h5 class="card-header">Featured</h5>
            <div class="card-body">
                <h5 class="card-title">{{ $topic->topic }}</h5>
                <p class="card-text">{{ $topic->description }}</p>
                <footer class="blockquote-footer">posted in {{ $topic->created_at }} by <cite title="Source Title">{{ $topic->user->name ?? 'Unknown' }}</cite></footer>
                <a href="{{ route('forumTopic', ['id' => $topic->id]) }}" class="btn btn-primary">Details</a>
            </div>
        </div>
    @endforeach
@endsection
