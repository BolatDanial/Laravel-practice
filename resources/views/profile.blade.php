@extends('templates.app')
@section('title') {{ Auth::user()->name }}@endsection

@section('content')
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold">Welcome, {{ Auth::user()->name }}</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Your email is {{ Auth::user()->email }}</p>
        </div>
    </div>

    <div class="topics">
        <h1>Here is list of your discussions that you created</h1>

        @foreach($topics as $topic)
            <div class="card my-5">
                <h5 class="card-header">Featured</h5>
                <div class="card-body">
                    <h5 class="card-title">{{ $topic->topic }}</h5>
                    <p class="card-text">{{ $topic->description }}</p>
                    <footer class="blockquote-footer">posted in {{ $topic->created_at }} </cite></footer>
                    <div class="row">
                        <div class="col-1">
                        <a href="{{ route('forumTopic', ['id' => $topic->id]) }}" class="btn btn-primary">Details</a>
                        </div>
                        <div class="col-1">
                            <form action="{{ route('deleteTopic', ['id' => $topic->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <div class="col-1">
                            <a href="{{ route('updateTopicForm', ['id' => $topic->id]) }}" class="btn btn-warning">Redact</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
