<div wire:ignore.self class="modal fade" id="insertValueModal" tabindex="-1" role="dialog" aria-labelledby="insertValueModalLabel" aria-hidden="true">
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
                    <select wire:model="selectedEntityTypeId" wire:change="change" name="type_id" class="form-control mt-3">
                        @for ($i = 0; $i < count($entityTypes); $i++)
                            <option value="{{$entityTypes[$i]->id}}">{{$entityTypes[$i]->entity_type_label}}</option>
                        @endfor
                    </select>
                    <strong class="mt-3 mb-3">Entity:</strong>
                    @if(is_null($entities))
                        <select name="entity_id" class="form-control mt-3">
                            <option disabled value="999">Select entity type first!</option>
                        </select>
                    @else
                        <select name="entity_id" class="form-control mt-3">
                            @for ($i = 0; $i < count($entities); $i++)
                                <option value="{{$entities[$i]->id}}">{{$entities[$i]->id}}</option>
                            @endfor
                        </select>
                    @endif

                    <strong class="mt-3 mb-3">Attribute:</strong>
                    @if(is_null($attributes))
                        <select name="attribute_id" class="form-control mt-3">
                            <option disabled value="999">Select entity type first!</option>
                        </select>
                    @else
                        <select name="attribute_id" class="form-control mt-3">
                            @for ($i = 0; $i < count($attributes); $i++)
                                <option value="{{$attributes[$i]->id}}">{{$attributes[$i]->attribute_label}}</option>
                            @endfor
                        </select>
                    @endif

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
