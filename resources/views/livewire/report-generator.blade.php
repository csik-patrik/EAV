<div class="container p-3 wire:ignore.self">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <strong class="mt-3 mb-3">Entity type:</strong>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <select wire:model="selectedEntityTypeId" wire:change="change" name="type_id" class="form-control mt-3">
                @for ($i = 0; $i < count($entityTypes); $i++)
                    <option value="{{$entityTypes[$i]->id}}">{{$entityTypes[$i]->entity_type_label}}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <strong class="mt-3 mb-3">Attributes:</strong>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @if(is_null($attributes))
                <strong class="mt-3 mb-3">Select entity type first!</strong>
            @else
                <div class="overflow-auto">
                    @for ($i = 0; $i < count($attributes); $i++)
                        <div class="form-check form-switch">
                            <input checked class="form-check-input" type="checkbox" id="{{$attributes[$i]->id}}">
                            <label class="form-check-label" for="{{$attributes[$i]->id}}">{{$attributes[$i]->attribute_label}}</label>
                        </div>
                    @endfor
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-success">Generate report</button>
    </div>
</div>