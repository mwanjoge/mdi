<table class="table table-sm">

        <tbody>
            @foreach($workplaceCheckup->workPlace->employees as $employee)
            <tr>
                <th colspan="5">
                    {{$employee->name}}
                </th>
            </tr>
            <tr>
                <input type="hidden" name="employee[]" value="{{$employee->id}}">
                @foreach ($workplaceCheckup->checkupReports->where('employee_id',$employee->id) as $report)
                <td>
                    <label>{{$report->disease->name}}</label>
                    <input type="hidden" value="blood pressure" name="disease[]" class="form-check">
                    <input type="checkbox"  value="true" id="{{$report->id}}" data-id="{{$report->id}}" name="results[]" class="disease-check" {{$report->hasIssue ? 'checked':''}}>
                    <input type="text" value="{{$report->results}}" placeholder="Results Particulars" id="report-results{{$report->id}}" data-id="{{$report->id}}" class="form-control report-results" style="display:{{$report->results === null ? 'none':'block'}}">
                    <textarea id="report-desc{{$report->id}}" class="form-control report-description" style="display:{{$report->descriptions === null ? 'none':'block'}}">{{$report->descriptions}}</textarea>
                </td>
                @endforeach
                <td>
                    <select name="status" class="form-control checkup-status" data-id="{{$report->checkup->id}}" id="{{$report->checkup->id}}">
                        <option value="{{$report->checkup->status}}">{{$report->checkup->status}}</option>
                        <option value="fit">Fit</option>
                        <option value="not fit">Not Fit</option>
                        <option value="fit with precautions">Fit With Precautions</option>
                    </select>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
