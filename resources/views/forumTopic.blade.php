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

    <hr>

    <div class="comments">
        <h2>Comments ({{ $commentCount }})</h2>

        <div class="container bootdey">
            <div class="col-md-12 bootstrap snippets">
                <div class="panel">
                    <form method="POST" action="{{ route('createComment', ['id' => $topic->id]) }}" class="panel-body">
                        @csrf
                        <textarea name="content" class="form-control" rows="2" placeholder="What are you thinking?"></textarea>
                        <div class="mar-top clearfix">
                            <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
                        </div>
                    </form>
                </div>
                <div class="panel">
                    @foreach($comments as $comment)
                        <div class="panel-body">
                            <div class="media-block">
                                <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                                <div class="media-body">
                                    <div class="mar-btm">
                                        <a href="#" class="btn-link text-semibold media-heading box-inline">{{ $comment->user->name }}</a>
                                        <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - at {{ $comment->created_at }}</p>
                                    </div>
                                    <p> {{ $comment->content }}</p>
                                    <div class="pad-ver">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up">Like</i></a>
                                            <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down">Dislike</i></a>
                                        </div>
                                        <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
