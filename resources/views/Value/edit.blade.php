@extends('layouts.layout')

@section('title') Edit value @endsection

@section('content')
    <div class="container p-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Value Assignment</h3>
            </div>
        </div>
        <form action="{{ route('value.update', $value) }}" method="POST">
            @csrf
            
            <strong class="mt-3 mb-3">Entity type:</strong>
            <select name="type_id" class="form-control mt-3">
                @for ($i = 0; $i < count($entityTypes); $i++)
                    @if($entityTypes[$i]->id==$value->type_id)
                        <option selected value="{{$entityTypes[$i]->id}}">{{$entityTypes[$i]->entity_type_label}}</option>
                    @else
                        <option value="{{$entityTypes[$i]->id}}">{{$entityTypes[$i]->entity_type_label}}</option>
                    @endif
                @endfor
            </select>

            <strong class="mt-3 mb-3">Attribute:</strong>
            <select name="attribute_id" class="form-control mt-3">
                @for ($i = 0; $i < count($attributes); $i++)
                    @if($attributes[$i]->attribute_id==$value->attribute_id)
                        <option selected value="{{$attributes[$i]->attribute_id}}">{{$attributes[$i]->attribute_label}}</option>
                    @else
                        <option value="{{$attributes[$i]->attribute_id}}">{{$attributes[$i]->attribute_label}}</option>
                    @endif
                @endfor
            </select>

            <strong>Value:</strong>
                <input type="text" name="value" class="form-control mt-3" placeholder="Value" value="{{$value->value}}">

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Modify</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
            </div>
            
        </form>
    </div>
@endsection