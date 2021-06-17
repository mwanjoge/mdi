<!-- Modal -->
<div class="modal fade" id="employee-checkups-create{{$employee->id}}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-stethoscope"></i> Make Checkups on {{$employee->fullName()}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('checkup.store')}}">
                @csrf
                <div class="modal-body px-5">
                    <select name="type" class="form-control" required>
                        <option readonly="true">Type</option>
                        <option readonly="pre-entry">Pre Entry</option>
                        <option readonly="post-entry">Post Entry</option>
                    </select>
                    <input type="hidden" name="employee" value="{{$employee->id}}">
                    <input type="hidden" name="workplace" value="{{$workplace->id}}">

                            {{--Blood Pressure<br>
                            <input type="hidden" value="blood pressure" name="disease[]" class="form-check">
                            <input type="radio"  value="1" name="results[]" class=""> Yes
                            <input type="radio"  value="0" name="results[]" class=""> No
<hr>
                            Aging<br>
                            <input type="hidden" value="aging" name="disease[]" class="form-check">
                            <input type="radio" value="1" name="results[]" class=""> Yes
                            <input type="radio" value="0" name="results[]" class=""> No<hr>

                            Eye Sight<br>
                            <input type="hidden" value="Eye Sight" name="disease[]" class="form-check">
                            <input type="radio" value="1" name="results[]" class=""> Yes
                            <input type="radio" value="0" name="results[]" class=""> No<hr>

                            Deabetes<br>
                            <input type="hidden" value="deabetes" name="disease[]" class="form-check">
                            <input type="radio" value="1" name="results[]" class=""> Yes
                            <input type="radio" value="o" name="results[]" class=""> No--}}

                            <select name="status" class="form-control">
                                <option readonly="true">Fitness Stutus</option>
                                <option value="fit">Fit</option>
                                <option value="not fit">Not Fit</option>
                                <option value="fit with precautions">Fit With Precautions</option>
                            </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
