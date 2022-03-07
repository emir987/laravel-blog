@extends('layouts.admin')

@section('admin-content')

    <h1>
        <i class="fas fa-tags left-icon"></i>
        Add New Post Category
    </h1>

    <a href="{{ url('/administration/post-categories') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i>
        &nbsp; 
        Back To Post Category
    </a>

    <form action="{{ url('/administration/post-categories') }}" method="POST" class="category-form margin-top-1pct">
        @csrf
        <div class="form-group">
            <label>Name: </label>
            <input type="text" name="name" class="form-control">

            <div class="error-message error-message-name">Name is empty!</div>
        </div>
        <div class="form-group">
            <label>Description: </label>
            <input type="text" name="description" class="form-control">
        </div>

        <button class="btn btn-primary">
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