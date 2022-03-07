@extends('layouts.admin')

@section('admin-content')

    <h1>
        <i class="fas fa-tags"></i>
        Post Categories Archive
    </h1>

    <a href="{{ url('/administration/post-categories') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i>
        &nbsp; 
        Back To Post Categories
    </a>

    <div class="margin-top-1pct">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Delete at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($categoryArchive); $i++)

                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $categoryArchive[$i]->name }}</td>
                    <td>{{ $categoryArchive[$i]->description }}</td>
                    <td>{{ date('d/m/Y - H:i', strtotime($categoryArchive[$i]->created_at)) . 'h' }}</td>
                    <td>{{ date('d/m/Y - H:i', strtotime($categoryArchive[$i]->deleted_at)) . 'h' }}</td>
                    <td>
                        <form class="restore-form" action="{{ url('/administration/post-categories/archive/' . $categoryArchive[$i]->id) }}" method="POST">
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
    
@endsection