@extends('layouts.admin')

@section('admin-content')

    <h1>
        <i class="fas fa-newspaper"></i>
        Posts
    </h1>

    <a href="{{ url('/administration/posts/create') }}" class="btn btn-primary">
        Add New Post
        &nbsp;
        <i class="fas fa-plus"></i>
    </a>

    <a href="{{ url('/administration/posts/archive') }}" class="btn btn-primary float-right">
        <i class="fas fa-newspaper"></i>
        &nbsp; 
        Posts Archive
    </a>

    <div class="margin-top-1pct">
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @for($i = 0; $i < count($posts); $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $posts[$i]->title }}</td>
                        <td>
                            @foreach ($posts[$i]->postCategories as $postCategory)
                                <span class="badge badge-primary padding-5">{{ $postCategory->name }}</span>
                            @endforeach
                        </td>
                        <td>{{ date('d/m/Y - H:i', strtotime($posts[$i]->created_at)) . 'h' }}</td>
                        <td>
                            <a href="{{ url('/administration/posts/' . $posts[$i]->id . '/edit') }}" class="btn btn-warning right-icon">
                                <i class="fas fa-edit"></i>
                                &nbsp;
                                Edit
                            </a>
                        </td>
                        <td>
                            <form class="delete-form" action="{{ url('/administration/posts/' . $posts[$i]->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"> 
                                    <span>
                                        <i class="fas fa-trash left-icon"></i>
                                        &nbsp;
                                        Delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endfor
            </tbody>

        </table>
    </div>

    <script>
        let deleteForms = document.getElementsByClassName('delete-form');        
    
        Array.from(deleteForms).forEach(currentForm => {
            currentForm.addEventListener('submit', function(ev){ 
            if (!confirm("Are you sure?")) {
                    ev.preventDefault(); 
                }
            })
        });
    </script>

@endsection