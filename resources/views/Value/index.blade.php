@extends('layouts.layout')

@section('title') Values @endsection

@section('links')
    <link href="https://unpkg.com/jquery-resizable-columns@0.2.3/dist/jquery.resizableColumns.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')})
    </script>

    <script src="https://unpkg.com/jquery-resizable-columns@0.2.3/dist/jquery.resizableColumns.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/resizable/bootstrap-table-resizable.min.js"></script>

    <script>
        $(function() {
          $('#table').bootstrapTable()
        })
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
        <div class="container-fluid p-3">
            <table id="table" 
                data-show-columns="true"
                data-search="true"
                data-show-toggle="true"
                data-pagination="true"
                data-resizable="true">
                <thead>
                        <tr>
                            <th data-sortable="true">Entity Id</th>
                            <th data-sortable="true">Entity Type</th>
                            <th data-sortable="true">Attribute</th>
                            <th data-sortable="true">Value</th>
                            <th data-sortable="false">Method</th>
                        </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($values); $i++)
                        <tr>
                            <td>{{$values[$i]->entity_id}}</td>
                            <td>{{$values[$i]->entity_type_label}}</td>
                            <td>{{$values[$i]->attribute_label}}</td>
                            <td>{{$values[$i]->value}}</td>
                            <td>
                                <form action="{{ route('value.destroy', $values[$i]->id) }}" method="POST">
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="button" class="btn btn-warning">Modify</button>
                    
                                    <button type="submit" onclick="return confirm('Delete value attribute?')" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endfor 
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
                            @for ($i = 0; $i < count($entityTypes); $i++)
                                <option value="{{$entityTypes[$i]->id}}">{{$entityTypes[$i]->entity_type_label}}</option>
                            @endfor
                        </select>

                        <strong class="mt-3 mb-3">Entity:</strong>
                        <select name="entity_id" class="form-control mt-3">
                            @for ($i = 0; $i < count($entities); $i++)
                                <option value="{{$entities[$i]->id}}">{{$entities[$i]->id}}</option>
                            @endfor
                        </select>

                        <strong class="mt-3 mb-3">Attribute:</strong>
                        <select name="attribute_id" class="form-control mt-3">
                            @for ($i = 0; $i < count($attributes); $i++)
                                <option value="{{$attributes[$i]->attribute_id}}">{{$attributes[$i]->attribute_label}}</option>
                            @endfor
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