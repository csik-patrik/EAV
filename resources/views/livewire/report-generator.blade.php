<div class="container p-3">
    @if($values == null)
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <strong class="mt-3 mb-3">Entity type:</strong>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <select wire:model="selectedEntityTypeId"
                        wire:change="change"
                        name="type_id"
                        class="form-control mt-3">
                    @foreach($entityTypes as $type)
                        <option value="{{$type->id}}">{{$type->entity_type_label}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-lg-12 col-md-12 col-sm-12">
                @if(is_null($attributes))
                    <strong class="mt-3 mb-3">Select entity type first!</strong>
                @else
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <strong class="mt-3 mb-3">Attributes:</strong>
                        </div>
                    </div>
                    @foreach($attributes as $attribute)
                        <div class="form-check form-switch">
                            <input checked class="form-check-input"
                                   type="checkbox"
                                   id="{{$attribute->id}}"
                                   value="{{$attribute->id}}"
                                   wire:model="selectedAttributes">
                            <label class="form-check-label"
                                   for="{{$attribute->id}}">{{$attribute->attribute_label}}</label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success" wire:click="generate">Generate report</button>
            </div>
        </div>
    @endif

    <!-- Generated report-->
    @if($values != null)
        @include('livewire.report')
    @endif
</div>