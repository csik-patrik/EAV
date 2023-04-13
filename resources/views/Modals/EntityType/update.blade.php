<div class="modal fade" id="updateEntityTypeModal" tabindex="-1" role="dialog" aria-labelledby="updateEntityTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateEntityTypeModalLabel">Modify</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('entity-type.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <strong>Entity type label:</strong>
                        <input type="text" name="entity_type_label" class="form-control mt-3" placeholder="Label">
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>