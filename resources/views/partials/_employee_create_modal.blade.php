<!-- Modal -->
<div class="modal fade" id="employee-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('employee.store')}}">
                @csrf
                @if(Request::is('workplace*'))
                    <input type="hidden" name="work_place_id" value="{{$workplace->id}}">
                @else
                    <select class="form-control" name="work_place_id">
                        @foreach(getWorkplaces() as $workplace)
                            <option value="{{$workplace->id}}">{{$workplace->name}}</option>
                        @endforeach
                    </select>
                @endif
                <div class="modal-body">
                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="name" placeholder="First Name">
                        </div>
                        {{--<div class="col-md-4">
                            <input class="form-control" type="text" name="middle_name" placeholder="Middle Name">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                        </div>--}}
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input class="form-control" type="date" name="birthday" placeholder="Birth Date">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="date" name="entryDate" placeholder="Entry Date">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="nationality" placeholder="Nationality">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="contractType" placeholder="Contract Type">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <select class="form-control" type="text" name="gender">
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="department" placeholder="Department">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="jobTitle" placeholder="Job Title">
                        </div>
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

