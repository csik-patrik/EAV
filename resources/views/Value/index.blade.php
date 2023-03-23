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
            <div class="div-lg-12">
                <h3 class="pl-3">Filters:</h3>
            </div>
            <div class="col-lg-12">
                @for ($i = 0; $i < count($entityTypes); $i++)
                    <a class="btn btn-primary m-1" href="{{ route('value.show',$entityTypes[$i]->id) }}">{{$entityTypes[$i]->entity_type_label}}</a>
                @endfor
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-lg-12">
                <button type="button" class=" btn btn-success" data-toggle="modal" data-target="#insertValueModal">
                    Assign attribute value to entity
                </button>
            </div>
        </div>
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
                    @foreach($values as $value)
                        <tr>
                            <td>{{$value->entity_id}}</td>
                            <td>{{$value->entityType->entity_type_label}}</td>
                            <td>{{$value->attribute->attribute_label}}</td>
                            <td>{{$value->value}}</td>
                            <td>
                                <form action="{{ route('value.destroy', $value->id) }}" method="POST">
    
                                    @csrf
                                    @method('DELETE')
    
                                    <a href="{{ route('value.edit', $value->id) }}" class="btn btn-warning">Modify</a>
                    
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
    @livewire('eav')
    
@endsection