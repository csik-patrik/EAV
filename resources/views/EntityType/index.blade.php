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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Entity Type
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
                            <form action="{{ route('entity-type.destroy',$entityType) }}" method="POST">

                                @csrf
                                @method('DELETE')
    
                                <button type="button" class="btn btn-warning">Modify</button>
                
                                <button type="submit" onclick="return confirm('Delete {{$entityType->label}} entity type?')" class="btn btn-danger">Delete</button>
                                
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
          </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new entity type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('entity-type.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <strong>Entity type label:</strong>
                            <input type="text" name="label" class="form-control mt-3" placeholder="Label">
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection