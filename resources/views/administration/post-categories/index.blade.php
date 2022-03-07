@extends('layouts.admin')

@section('admin-content')
    <h1>
        <i class="fas fa-tags"></i>
        Post Categories
    </h1>

    <a href="{{ url('/administration/post-categories/create') }}" class="btn btn-primary">
        Add New Post Category
        &nbsp;
        <i class="fas fa-plus"></i>
    </a>

    <a href="{{ url('/administration/post-categories/archive') }}" class="btn btn-primary float-right">
        <i class="fas fa-tags"></i>
        &nbsp; 
        Post Categories Archive
    </a>
    
    <div class="margin-top-1pct">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($postCategories); $i++)

                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $postCategories[$i]->name }}</td>
                        <td>{{ $postCategories[$i]->description }}</td>
                        <td>{{ date('d/m/Y - H:i', strtotime($postCategories[$i]->created_at)) . 'h' }}</td>
                        <td>
                            <a href="{{ url('/administration/post-categories/' . $postCategories[$i]->id . '/edit') }}" class="btn btn-warning right-icon">
                                <i class="fas fa-edit"></i>
                                &nbsp;
                                Edit
                            </a>
                        </td>
                        <td>
                            <form class="delete-form" action="{{ url('/administration/post-categories/' . $postCategories[$i]->id) }}" method="POST">
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