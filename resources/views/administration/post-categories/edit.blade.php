@extends('layouts.admin')

@section('admin-content')

    <h1>
        <i class="fas fa-edit left-icon"></i>
        Edit Post Category
    </h1>

    <a href="{{ url('/administration/post-categories') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i>
        &nbsp; 
        Back To Post Category
    </a>

    <form action="{{ url('/administration/post-categories/' . $postCategory->id) }}" method="POST" class="category-form margin-top-1pct">

        @csrf <!-- token za forme kako bi forma mogla da salje podatke na server -->
        @method('put')

        <div class="form-group">
            <label>Name: </label>
            <input class="form-control" type="text" name="name" value="{{ $postCategory->name }}" />

            <div class="error-message error-message-name">Name is empty!</div>
        </div>

        <div class="form-group">
            <label>Description: </label>
            <textarea class="form-control" name="description">{{ $postCategory->description }}</textarea>
        </div>

        <button class="btn btn-primary" type="submit">
            <i class="fas fa-save"></i>
            &nbsp;
            Save
        </button>

    </form>

    {{-- Link for validations JS - client side --}}
    <script src="{{ asset('js/validations/post-category.js') }}"></script>

    {{-- Link for validations JS - server side --}}
    @if ($errors->has('name'))
        <script src="{{ asset('js/validations/error-messages/show-postcategory-name-error-message.js') }}"></script>
    @endif

@endsection