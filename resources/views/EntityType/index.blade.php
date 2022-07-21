@extends('layouts.layout')

@section('title') Entity Types @endsection

@section('content')
    <div class="container-fluid p-3">
        <button type="button" class="btn btn-success">Add Entity Type</button>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Label</th>
                      <th scope="col">Method</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($entityTypes as $entityType)
                    <tr>
                        <td>{{$entityType->id}}</td>
                        <td>{{$entityType->label}}</td>
                        <td>
                            <button type="button" class="btn btn-danger">Danger</button>
                            <button type="button" class="btn btn-warning">Warning</button>
                        </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
            </table>
          </div>
    </div>
    
@endsection