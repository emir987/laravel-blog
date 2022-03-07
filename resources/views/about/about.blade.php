@extends('layouts.app')

@section('content')

    <h1>About Laravel Blog</h1>

    @if (isset($services))
        <h3>Our services</h3>
        
        <ul>
            @foreach ($services as $service)
                <li>{{$service}}</li>
            @endforeach
        </ul>

    @else
        <h3>No services provided</h3>
    @endif
    
@endsection
