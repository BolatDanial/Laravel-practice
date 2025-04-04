@extends('templates.app')
@section('title') Welcome @endsection

@section('content')
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold">Welcome to the site</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
            </div>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="bootstrap-docs.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
            </div>
        </div>
    </div>

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
