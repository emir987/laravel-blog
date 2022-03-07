@extends('layouts.admin')

@section('admin-content')

    <h1>
        <i class="fas fa-newspaper"></i>
        Posts Archive
    </h1>

    <a href="{{ url('/administration/posts') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i>
        &nbsp; 
        Back To Posts
    </a>

    <div class="margin-top-1pct">
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Delete at</th>
                    <th></th>
                    {{-- <th></th> --}}
                </tr>
            </thead>

            <tbody>
                @for($i = 0; $i < count($postArchive); $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $postArchive[$i]->title }}</td>
                        <td>{{ $postArchive[$i]->category }}</td>
                        <td>{{ date('d/m/Y - H:i', strtotime($postArchive[$i]->created_at)) . 'h' }}</td>
                        <td>{{ date('d/m/Y - H:i', strtotime($postArchive[$i]->deleted_at)) . 'h' }}</td>

                        <td>
                           <form class="restore-form" action="{{ url('/administration/posts/archive/' . $postArchive[$i]->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button class="btn btn-warning"> 
                                    <span>
                                        <i class="fas fa-trash-restore"></i>
                                        &nbsp;
                                        Restore
                                    </span>
                                </button>
                            </form>
                        </td>

                        {{-- <td>
                            <form class="delete-form" action="{{ url('/administration/posts/archive/' . $postArchive[$i]->id) }}" method="POST">
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
                        </td> --}}
                    </tr>
                @endfor
            </tbody>

        </table>
    </div>

    <script>
        let restoreForms = document.getElementsByClassName('restore-form');        
    
        Array.from(restoreForms).forEach(currentForm => {
            currentForm.addEventListener('submit', function(ev){ 
            if (!confirm("Are you sure?")) {
                    ev.preventDefault(); 
                }
            })
        });
    </script>

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