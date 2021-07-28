<table class="table table-sm">

    <tbody>
        @foreach($placeCheckup->checkups as $checkup)
        <thead>
            <tr class="alert-info">
                <th colspan="5" >
                    {{$checkup->employee->name}}
                </th>
            </tr>
        </thead>
        @foreach(getDiseaseCategories() as $disease)
            <tr class="alert-success">
                <th colspan="5">
                    {{$disease->category}}
                </th>
            </tr>
            <tr>
                <input type="hidden" name="employee[]" value="{{$checkup->employee->id}}">
                @foreach (getEmployeeCheckupResultsByDiseaseCategory($disease->category,$placeCheckup->id,$checkup->employee_id) as $report)
                    <td>
                        <label>{{$report->disease->name}}</label>
                        <input type="hidden" value="blood pressure" name="disease[]" class="form-check">
                        <input type="checkbox"  value="true" id="{{$report->id}}" data-id="{{$report->id}}" name="results[]" class="disease-check" {{$report->hasIssue ? 'checked':''}}>
                        <input type="text" value="{{$report->results}}" placeholder="Results Particulars" id="report-results{{$report->id}}" data-id="{{$report->id}}" class="form-control report-results" style="display:{{$report->results === null ? 'none':'block'}}">
                        <textarea id="report-desc{{$report->id}}" class="form-control report-description" style="display:{{$report->descriptions === null ? 'none':'block'}}">{{$report->descriptions}}</textarea>
                    </td>
                @endforeach
            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                <select name="status" class="form-control checkup-status" data-id="{{$checkup->id}}" id="{{$checkup->id}}">
                    <option value="">Health Status</option>
                    <option value="fit">Fit</option>
                    <option value="fit">Fit On Followup</option>
                    <option value="not fit">Not Fit</option>
                    <option value="fit with precautions">Fit With Restrictions</option>
                </select>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
