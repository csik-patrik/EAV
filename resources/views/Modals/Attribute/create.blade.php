<div class="modal fade" id="insertAttributeModal" tabindex="-1" role="dialog" aria-labelledby="insertAttributeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertAttributeModalLabel">Add attribute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('attribute.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <strong class="mt-3 mb-3">Attribute type:</strong>
                        <select name="type_id" class="form-control mt-3">
                            @foreach ($entityTypes as $entityType)
                                <option value="{{$entityType->id}}">{{$entityType->entity_type_label}}</option>
                            @endforeach
                        </select>

                        <strong>Attribute label:</strong>
                        <input type="text" name="attribute_label" class="form-control mt-3" placeholder="Label">
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>