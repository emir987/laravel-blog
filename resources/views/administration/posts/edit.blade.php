
@extends('layouts.admin')

@section('admin-content')

    {{-- adding link for bootstrap multiselect CSS - CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.14/css/bootstrap-multiselect.css">

    <h1>
        <i class="fas fa-edit left-icon"></i>
        Edit Post
    </h1>

    <a href="{{ url('/administration/posts') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i>
        &nbsp; 
        Back To Posts
    </a>

    <form action="{{ url('/administration/posts/' . $post->id) }}" method="POST" class="post-form margin-top-1pct">

        @csrf <!-- token za forme kako bi forma mogla da salje podatke na server -->
        @method('put')
    
        <div class="form-group">
            <label>Title: </label>
            <input class="form-control" type="text" name="title" value="{{ $post->title }}" />

            <div class="error-message error-message-title">Title is empty!</div>
        </div>

        <div class="form-group">
            <label>Post Category: </label><br>
            <select class="multiselectdropdown" multiple="multiple" name="post-categories[]">
                @foreach ($postCategories as $postCategory)
                    <option value="{{ $postCategory->id }}" 
                            {{-- filtering the array of category IDs for post --}}
                            @if ($post->postCategories->contains('id', $postCategory->id))
                                selected="selected"
                            @endif>
                        {{ $postCategory->name }}
                    </option>
                @endforeach
            </select>

            <div class="error-message error-message-categories">Categories are empty!</div>
        </div>
    
        <div class="form-group">
            <label>Content: </label>
            <textarea class="form-control myckeditor5" name="content">{{ $post->content }}</textarea>

            <div class="error-message error-message-content">Content is empty!</div>
        </div>
    
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-save"></i>
            &nbsp;
            Save
        </button>
    
    </form>


    {{-- jQuery - CDN --}}
    <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>

    {{-- adding CK editor with a link, without the source mode --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> --}}
    
    <script src="{{ asset('js/myckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('js/myckeditor5.js') }}"></script>

    {{-- Link for bootstrap multiselect JS - CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.14/js/bootstrap-multiselect.min.js"></script>
    <script src="{{ asset('js/multiselectdropdowninit.js') }}"></script>

    {{-- Link for validations JS - client side --}}
    <script src="{{ asset('js/validations/post.js') }}"></script>

    {{-- Link for validations JS - server side --}}
    @if ($errors->has('title'))
        <script src="{{ asset('js/validations/error-messages/show-post-title-error-message.js') }}"></script>
    @endif
    @if ($errors->has('post-categories'))
        <script src="{{ asset('js/validations/error-messages/show-post-categories-error-message.js') }}"></script>
    @endif
    @if ($errors->has('content'))
        <script src="{{ asset('js/validations/error-messages/show-post-content-error-message.js') }}"></script>
    @endif

@endsection