@extends('templates.app')
@section('title') Create Topic @endsection

@section('content')
    <div class="row">
        <div class="col-4">
            <h1>Create your discussion</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias culpa cum eaque eveniet ex impedit labore repellendus repudiandae sequi voluptas? Blanditiis culpa cum dolor eveniet impedit quis vero! Optio, quibusdam.</p>
        </div>

        <div class="col-8">
            <form method="POST" action="{{ route('createTopic') }}">
                @csrf
                <div class="form-group">
                    <label for="topic">Topic</label>
                    <input id="topic" name="topic" class="form-control" type="text" placeholder="Enter discussion topic">
                </div>
                <div class="form-group">
                    <label for="description">Short preview description</label>
                    <input id="description" name="description" class="form-control" type="text" placeholder="Enter discussion description">
                </div>
                <div class="form-group">
                    <label for="content">Enter main content</label>
                    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
