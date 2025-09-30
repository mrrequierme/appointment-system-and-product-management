
    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
        aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete <strong>{{ $product->name }}</strong>?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="POST"
                        class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>