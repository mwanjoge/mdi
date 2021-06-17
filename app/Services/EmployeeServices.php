<?php


namespace App\Services;


use App\Models\Checkup;
use App\Models\Employee;

class EmployeeServices
{
    public static function getAllEmployees(){
        return Employee::all();
    }

    public static function getEmployeeByNames($name){
        return Employee::where([
            ['name',$name]
        ])->get()->first();
    }

    public static  function checkInfo($employee){
        return Checkup::where('employee_id',$employee)->get();
    }
}
