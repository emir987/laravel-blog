@extends('layouts.app')

@section('content')

    <h1>
        {{ $title }}
    </h1>

    @foreach ($posts as $post)
        <div class="post-listing">
            <a href="{{ url('/posts/' . $post->id) }}">
                {{ $post->title }}
            </a>
            <br>
            <img src="{{ url('/storage/' . $post->featured_image_path) }}">
            <br>
            <small>
                <i class="bi bi-person"></i>
                {{ $post->user->name }}
            </small>
            <br>
            {{-- @foreach ($post->categories as $category)
                <small>{{ $category->name . ", " }}</small> 
            @endforeach --}}

            <i class="bi bi-tags"></i>
            @for ($i = 0; $i < count($post->categories); $i++)
                
                @if ($i != count($post->categories)-1)
                    <small>{{ $post->categories[$i]->name . ', ' }}</small> 
                @else
                    <small>{{ $post->categories[$i]->name }}</small> 
                @endif
            @endfor
            <br><br>
            
            <a class="btn btn-primary" href="{{ url('/posts/' . $post->id) }}">Read more 
                <span class="right-icon">
                    <i class="bi bi-box-arrow-in-right"></i>
                </span>
            </a>

            <a class="btn btn-warning" href="{{ url('/posts/' . $post->id . '/edit') }}"> 
                <span>
                    <i class="bi bi-pencil-square left-icon"></i>Modify
                </span>
            </a>

            <form class="delete-form" action="{{ url('/posts/' . $post->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger"> 
                    <span>
                        <i class="bi bi-trash left-icon"></i>Delete
                    </span>
                </button>
            </form>
            
        </div>
    @endforeach
    
<script>
    let deleteForms = document.getElementsByClassName('delete-form');
    
    // for (let i = 0; i < deleteForms.length; i++) {
    //     let currentForm = deleteForms[i];
    //     currentForm.addEventListener('submit', function(ev){ // ev - event
    //         if (!confirm("Are you sure?")) {
    //             ev.preventDefault(); 
    //         }
    //     });
    // }
    

    Array.from(deleteForms).forEach(currentForm => {
        currentForm.addEventListener('submit', function(ev){ 
        if (!confirm("Are you sure?")) {
                ev.preventDefault(); 
            }
        })
    });

</script>

@endsection
