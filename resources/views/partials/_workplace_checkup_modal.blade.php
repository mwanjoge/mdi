<!-- Modal -->
<div class="modal fade" id="workplace-checkups-create" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-stethoscope"></i> Make Checkups on {{$workplace->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('workplace.checkup')}}">
                @csrf
                <div class="modal-body px-5">
                    <label>Checkup Type</label>
                    <select name="type" class="form-control" required>
                        <option readonly="true">Type</option>
                        <option value="Pre">Pre</option>
                        <option value="Exit">Exit</option>
                        <option value="Periodic">Periodic</option>
                        <option value="">Special</option>
                    </select>
                    <input type="hidden" name="workplace" value="{{$workplace->id}}">
                    <label>Checkup Date</label>
                    <input type="date" name="checkup_at" class="form-control">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
