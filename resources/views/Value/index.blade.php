@extends('layouts.layout')

@section('title') Values @endsection

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertValueModal">
                    Assign attribute value to entity
                </button>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert" >
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        @if (count($values)!=0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Entity Id</th>
                            <th scope="col">Entity Type</th>
                            <th scope="col">Attribute</th>
                            <th scope="col">Value</th>
                            <th scope="col">Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($values as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->entity_id}}</td>
                            <td>{{$value->entityType->label}}</td>
                            <td>{{$value->attribute->label}}</td>
                            <td>{{$value->value}}</td>
                            <td>
                                <form action="{{ route('value.destroy',$value) }}" method="POST">
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="button" class="btn btn-warning">Modify</button>
                    
                                    <button type="submit" onclick="return confirm('Delete value attribute?')" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h1 class="display-4 d-flex justify-content-center">There aren't any values in the database.</h1>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="insertValueModal" tabindex="-1" role="dialog" aria-labelledby="insertValueModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="insertValueModalLabel">Assign value to Entity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('value.store') }}" method="POST">
                        @csrf
                        
                        <strong class="mt-3 mb-3">Entity type:</strong>
                        <select name="type_id" class="form-control mt-3">
                            @foreach ($entityTypes as $entityType)
                                <option value="{{$entityType->id}}">{{$entityType->label}}</option>
                            @endforeach
                        </select>

                        <strong class="mt-3 mb-3">Entity:</strong>
                        <select name="entity_id" class="form-control mt-3">
                            @foreach ($entities as $entity)
                                <option value="{{$entity->id}}">{{$entity->id}}</option>
                            @endforeach
                        </select>

                        <strong class="mt-3 mb-3">Attribute:</strong>
                        <select name="attribute_id" class="form-control mt-3">
                            @foreach ($attributes as $attribute)
                                <option value="{{$attribute->id}}">{{$attribute->label}}</option>
                            @endforeach
                        </select>

                        <strong>Value:</strong>
                            <input type="text" name="value" class="form-control mt-3" placeholder="Value">

                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection