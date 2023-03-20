@extends('layouts.layout')

@section('title') Attributes @endsection

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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#insertAttributeModal">
                    Add Attribute
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
        @if (count($attributes)!=0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Label</th>
                            <th scope="col">EnityType</th>
                            <th scope="col">Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributes as $attribute)
                        <tr>
                            <td>{{$attribute->id}}</td>
                            <td>{{$attribute->attribute_label}}</td>
                            <td>{{$attribute->entityType->entity_type_label}}</td>
                            <td>
                                <form action="{{ route('attribute.destroy',$attribute->id) }}" method="POST">
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="button" class="btn btn-warning">Modify</button>
                    
                                    <button type="submit" onclick="return confirm('Delete {{$attribute->attribute_label}} attribute?')" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h1 class="display-4 d-flex justify-content-center">There aren't any attributes in the database.</h1>
        @endif
    </div>

    <!-- Create attribute modal -->
    @include('Modals.Attribute.create');
    
@endsection