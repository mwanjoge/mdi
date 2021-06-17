<!-- Modal -->
<div class="modal fade" id="work-place-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create A Workplace</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('workplace.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="text" name="name" placeholder="Workplace Name">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="location" placeholder="Workplace Location">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="address" placeholder="Workplace Address">
                    </div>
                    <div class="mb-3">
                        <select class="form-control" type="text" name="status">
                            <option value="Inspected">Inspected</option>
                            <option value="Not Inspected">Not Inspected</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
