<?php


namespace App\Services;


use App\Models\Checkup;
use App\Models\CheckupReport;
use App\Models\WorkplaceCheckup;
use Illuminate\Support\Facades\DB;

class CheckupServices
{
    public static function getAllCheckups(){
        return Checkup::all();
    }
    public static function unCheckedEmployeeByTypePlace($type,$place){
        return DB::table('employees')
           ->whereNotExists(function ($query) use ($type,$place){
               $query->select(DB::raw(1))
                     ->from('checkups')
                     ->whereColumn('checkups.employee_id', 'employees.id')
                     ->where('type',$type)
                     ->where('work_place_id',$place);
           });
    }
    public static function getUnCheckedEmployeeByTypePlace($type,$place){
        return self::unCheckedEmployeeByTypePlace($type,$place)->get();
    }
    public static function getFemaleEmployeesCount($type,$place){
        return self::unCheckedEmployeeByTypePlace($type,$place)->where('gender','female')->get();
    }
    public static function getMaleEmployeesCount($type,$place){
        return self::unCheckedEmployeeByTypePlace($type,$place)->where('gender','male')->get();
    }
    public static function getAllWorkplaceCheckups(){
        return WorkplaceCheckup::all();
    }
    public static function getCheckupResultsByWorkplaceCheckupId($workplaceCheckupId){
        return CheckupReport::select('checkup_reports.*')
            ->join('workplace_checkups','checkup_reports.workplace_checkup_id','=','workplace_checkups.id')
            ->join('diseases','diseases.id','=','checkup_reports.disease_id')
            ->where('workplace_checkup_id',$workplaceCheckupId);
    }
    public static function getCheckupResultsByType($type,$workplaceCheckupId){
        return self::getCheckupResultsByWorkplaceCheckupId($workplaceCheckupId)
            ->where('workplace_checkups.type',$type)->get();
    }
    public static function getCheckupResultsByDiseaseCategory($diseaseCategory,$workplaceCheckupId){
        return self::getCheckupResultsByWorkplaceCheckupId($workplaceCheckupId)
            ->where('diseases.category',$diseaseCategory)->get();
    }
    public static function getEmployeeCheckupResultsByDiseaseCategory($diseaseCategory,$workplaceCheckupId,$employeeId){
        return self::getCheckupResultsByWorkplaceCheckupId($workplaceCheckupId)
            ->where('diseases.category',$diseaseCategory)
            ->where('checkup_reports.employee_id',$employeeId)->get();
    }

}
