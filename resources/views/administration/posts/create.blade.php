@extends('layouts.admin')

@section('admin-content')
    {{-- adding link for bootstrap multiselect CSS - CDN --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.14/css/bootstrap-multiselect.css">
    <link href="{{ asset('froala-editor/css/froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css" />

    <h1>
        <i class="fas fa-newspaper"></i>
        Add New Post
    </h1 <a href="{{ url('/administration/posts') }}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i>
    &nbsp;
    Back To Posts
    </a>

    <form action="{{ url('/administration/posts') }}" method="POST" class="post-form margin-top-1pct"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title: </label>

            <input type="text" name="title" class="form-control"> {{-- value="{{ old('title') }}" returns iput text from server side validation --}}


            <div class="error-message error-message-title">Title is empty!</div>
        </div>

        <div class="form-group">
            <label>Featured image: </label><br>
            <input type="file" name="featured-image" />
        </div>

        <div class="form-group">
            <label>Category: </label><br>
            <select class="multiselectdropdown" multiple="multiple" name="post-categories[]">
                @foreach ($postCategories as $postCategory)
                    <option value="{{ $postCategory->id }}"> {{-- {{ collect(old('post-categories'))->contains($postCategory->id) ? 'selected' : '' }} --}}
                        {{ $postCategory->name }}
                    </option>
                @endforeach
            </select>

            <div class="error-message error-message-categories">Categories are empty!</div>
        </div>

        <div class="form-group">
            <label>Content: </label>

            <div id="example"></div>

            <div class="error-message error-message-content">Content is empty!</div>
        </div>

        <button class="btn btn-primary">
            <i class="fas fa-save"></i>
            &nbsp;
            Save
        </button>
    </form>

    {{-- jQuery - CDN --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- adding CK editor with a link, without the source mode --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> --}}



    {{-- Link for bootstrap multiselect JS - CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.14/js/bootstrap-multiselect.min.js">
    </script>
    <script src="{{ asset('js/multiselectdropdowninit.js') }}"></script>

    {{-- Link for validations JS - client side --}}
    <script src="{{ asset('js/validations/post.js') }}"></script>

    <script src="{{ asset('froala-editor/js/froala_editor.min.js') }}"></script>
    <script src="{{ asset('froala-editor/js/plugins/file.min.js') }}"></script>
    <script src="{{ asset('froala-editor/js/plugins/image.min.js') }}"></script>
    <script src="{{ asset('froala-editor/js/plugins/link.min.js') }}"></script>


    <script>
        $(document).ready(function() {

            new FroalaEditor('#example', {

                toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript',
                    'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle',
                    'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL',
                    'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo',
                    'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR',
                    'selectAll', 'clearFormatting', '|', 'print', 'help', 'html', '|', 'undo', 'redo',
                    'trackChanges', 'markdown'
                ],

                // Set the file upload parameter.
                fileUploadParam: 'file',

                // Set the file upload URL.
                fileUploadURL: '/file',

                // Additional upload params.
                fileUploadParams: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                // Set request type.
                fileUploadMethod: 'POST',

                // Set max file size to 20MB.
                fileMaxSize: 20 * 1024 * 1024,

                // Allow to upload any file.
                fileAllowedTypes: ['*'],

                events: {
                    'file.beforeUpload': function(files) {
                        console.log('before')
                        // Return false if you want to stop the file upload.
                    },
                    'file.uploaded': function(response) {
                        console.log('uploaded')
                        // File was uploaded to the server.
                    },
                    'file.inserted': function($file, response) {
                        console.log('inserted');
                        // File was inserted in the editor.
                    },
                    'file.error': function(error, response) {
                        // Bad link.
                        if (error.code == 1) {}

                        // No link in upload response.
                        else if (error.code == 2) {}

                        // Error during file upload.
                        else if (error.code == 3) {}

                        // Parsing response failed.
                        else if (error.code == 4) {

                        }

                        // File too text-large.
                        else if (error.code == 5) {

                        }

                        // Invalid file type.
                        else if (error.code == 6) {

                        }

                        // File can be uploaded only to same domain in IE 8 and IE 9.
                        else if (error.code == 7) {

                        }

                        console.log('kraj');

                        console.log(response, error)

                        // Response contains the original server response to the request if available.
                    }
                }
            });

        });
    </script>

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
