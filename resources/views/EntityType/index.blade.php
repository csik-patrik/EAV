@extends('layouts.layout')

@section('title') Entity Types @endsection

@section('content')
    <div class="container p-3">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Label</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($entityTypes as $entityType)
                    <tr>
                        <td>{{$entityType->id}}</td>
                        <td>{{$entityType->label}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection