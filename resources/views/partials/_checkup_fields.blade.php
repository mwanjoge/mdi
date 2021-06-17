<table class="table table-sm">
    @foreach($employees as $employee)
        <thead>
        <tr>
            <th colspan="5">{{$employee->fullName()}}
                <input type="hidden" name="employee[]" value="{{$employee->id}}">
            </th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    Blood Pressure
                    <input type="hidden" value="blood pressure" name="disease[]" class="form-check">
                    <input type="checkbox"  value="true" name="results[]" class="form-check">
                </td>
                <td>
                    Aging
                    <input type="hidden" value="aging" name="disease[]" class="form-check">
                    <input type="checkbox" value="true" name="results[]" class="form-check">
                </td>
                <td>
                    Arthma
                    <input type="hidden" value="arthma" name="disease[]" class="form-check">
                    <input type="checkbox" value="true" name="results[]" class="form-check">
                </td>
                <td>
                    Deabets
                    <input type="hidden" value="deabetes" name="disease[]" class="form-check">
                    <input type="checkbox" value="true" name="results[]" class="form-check">
                </td>
                <td>
                    <select name="status" class="form-control">
                        <option readonly="true">Fitness Stutus</option>
                        <option value="fit">Fit</option>
                        <option value="not fit">Not Fit</option>
                        <option value="fit with precautions">Fit With Precautions</option>
                    </select>
                </td>
            </tr>
        </tbody>
    @endforeach
</table>
