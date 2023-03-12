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
                    Add Entity
                </button>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            </div>
        </div>
        @endif
        @if (count($entities)!=0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entities as $entity)
                        <tr>
                            <td>{{$entity->id}}</td>
                            <td>{{$entity->EntityType->entity_type_label}}</td>
                            <td>
                                <form action="{{ route('entity.destroy',$entity) }}" method="POST">
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="button" class="btn btn-warning">Modify</button>
                    
                                    <button type="submit" onclick="return confirm('Delete entity?')" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h1 class="display-4 d-flex justify-content-center">There aren't any entities in the database.</h1>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new entity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('entity.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <strong class="mt-3 mb-3">Entity type:</strong>
                            <select name="type_id" class="form-control mt-3">
                                @foreach ($entityTypes as $entityType)
                                    <option value="{{$entityType->id}}">{{$entityType->entity_type_label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection