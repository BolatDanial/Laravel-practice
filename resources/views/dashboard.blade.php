@extends('templates.app')
@section('title') {{ Auth::user()->name }}@endsection

@section('content')
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <h2>Your email is {{ Auth::user()->email }}</h2>
@endsection
