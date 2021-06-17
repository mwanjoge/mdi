<?php


namespace App\Services;


use App\Models\Employee;

class EmployeeServices
{
    public static function getAllEmployees(){
        return Employee::all();
    }
}
