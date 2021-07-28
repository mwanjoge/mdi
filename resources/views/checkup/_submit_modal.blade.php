<div class="modal fade" id="submit-checkup-{{$placeCheckup->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$placeCheckup->workPlace->name.' checkup of '. $placeCheckup->checkup_at->format('d M Y')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('workplace.checkup.submit')}}">
                <div class="modal-body">
                    @csrf
                    <input type="date" name="submited_at" class="form-control">
                    <label>Checkup Conclusion</label>
                    <textarea name="letter_conclusion" class="form-control mt-1"></textarea>
                    <input type="hidden" name="checkup" class="form-control" value="{{$placeCheckup->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
