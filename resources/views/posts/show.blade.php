@extends('layouts.app')

@section('content')

    <h1>
        {{ $headerText }}
    </h1>

    <h1>
        {{ $post->title }}
    </h1>

    <small>
        - {{ $post->user->name }}
    </small>

    <p>
        {{ $post->content }}
    </p>
    
@endsection
