@extends('templates.app')
@section('title') Update Topic @endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <form method="POST" action="{{ route('updateTopic', ['id' => $topic->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="topic">Topic</label>
                    <input id="topic" value="{{  $topic->topic }}" name="topic" class="form-control" type="text" placeholder="Enter discussion topic">
                </div>
                <div class="form-group">
                    <label for="description">Short preview description</label>
                    <input id="description" value="{{  $topic->description }}" name="description" class="form-control" type="text" placeholder="Enter discussion description">
                </div>
                <div class="form-group">
                    <label for="content">Enter main content</label>
                    <textarea class="form-control"  name="content" id="content" rows="3">{{  $topic->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        <div class="col-4">
            <h1>Update your discussion</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias culpa cum eaque eveniet ex impedit labore repellendus repudiandae sequi voluptas? Blanditiis culpa cum dolor eveniet impedit quis vero! Optio, quibusdam.</p>
        </div>

    </div>
@endsection
