@extends('layouts.layout')

@section('title') Entity Types @endsection

@section('scripts')
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')})
    </script>
@endsection

@section('content')
    <div class="container-fluid p-3">
        <div class="row pb-3">
            <div class="col-md-12">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Add Entity Type
                </button>
            </div>
        </div>
        @error('entity_type_label')
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                        <p>{{ $message }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @enderror
        @if ($message = Session::get('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert" >
                        <p>{{ $message }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        @if ($message = Session::get('failed'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                        <p>{{ $message }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        @if (count($entityTypes)!=0)
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
                            <td>{{$entityType->entity_type_label}}</td>
                            <td>
                                <form action="{{ route('entity-type.destroy',$entityType) }}" method="POST">
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Modify</button>
                    
                                    <button type="submit" onclick="return confirm('Delete {{$entityType->label}} entity type?')" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h1 class="display-4 d-flex justify-content-center">There aren't any entity types in the database.</h1>
        @endif
    </div>

    <!-- Create entity type modal -->
    @include('Modals.EntityType.create')

    <!-- Update entity type modal -->
    @include('Modals.EntityType.update')
    
@endsection