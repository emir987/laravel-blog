@extends('layouts.app')

@section('content')

<form action="{{ url('/posts/' . $post->id) }}" method="POST">

    @csrf <!-- token za forme kako bi forma mogla da salje podatke na server -->
    @method('put')

    <div class="form-group">
        <label>Title: </label>
        <input class="form-control" type="text" name="title" value="{{ $post->title }}" />
    </div>

    <div class="form-group">
        <label>Content: </label>
        <textarea class="form-control" name="content">{{ $post->content }}</textarea>
    </div>

    <button class="btn btn-primary" type="submit">
        <i class="bi bi-upload"></i>
        Save
    </button>
</form>

@endsection