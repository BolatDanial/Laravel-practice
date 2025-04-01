@extends('templates.app')
@section('title') Update Profile @endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <form method="POST" action="{{ route('profileRedactionForm') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" value="{{ $user->name }}" name="name" class="form-control" type="text" placeholder="New name">
                </div>
                <div class="form-group">
                    <label for="avatar">Upload profile avatar</label>
                    <input name="avatar" type="file" class="form-control-file" id="avatar">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        <div class="col-4">
            <h1>Update profile</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias culpa cum eaque eveniet ex impedit labore repellendus repudiandae sequi voluptas? Blanditiis culpa cum dolor eveniet impedit quis vero! Optio, quibusdam.</p>
        </div>

    </div>
@endsection
