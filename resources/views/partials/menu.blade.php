<div class="mb-3">
    @if(Request::is('workplace*'))
        <a class="btn {{Request::is('workplace*')? 'btn-primary':'btn-secondary'}}" href="/">
            <i class="fa fa-city"></i>
            Work Places
        </a>
    @else
        <a class="btn {{Request::is('/')? 'btn-primary':'btn-secondary'}}" href="/">
            <i class="fa fa-city"></i> Work Places
        </a>
    @endif
    <a class="btn {{Request::is('employee*')? 'btn-primary':'btn-secondary'}}" href="{{route('employee.index')}}">
        <i class="fa fa-user-friends"></i>
        Employees</a>
    <a class="btn {{Request::is('checkup*')? 'btn-primary':'btn-secondary'}}" href="{{route('checkup.index')}}">
        <i class="fa fa-medkit"></i>
        Checkups
    </a>
    <a class="btn {{Request::is('bill*')? 'btn-primary':'btn-secondary'}}" href="{{route('bill.index')}}">
        <i class="fa fa-money-check-alt"></i>
        Bills
    </a>
    <a class="btn {{Request::is('settings*')? 'btn-primary':'btn-secondary'}}" href="{{route('settings.index')}}">
        <i class="fa fa-cogs"></i>
        Settings
    </a>
</div>
