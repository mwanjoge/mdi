<?php


namespace App\Services;


use App\Models\Checkup;
use App\Models\WorkplaceCheckup;
use Illuminate\Support\Facades\DB;

class CheckupServices
{
    public static function getAllCheckups(){
        return Checkup::all();
    }
    public static function getUnCheckedEmployeeByTypePlace($type,$place){
        return DB::table('employees')
           ->whereNotExists(function ($query) use ($type,$place){
               $query->select(DB::raw(1))
                     ->from('checkups')
                     ->whereColumn('checkups.employee_id', 'employees.id')
                     ->where('type',$type)
                     ->where('work_place_id',$place);
           })
           ->get();
    }
    public static function getAllWorkplaceCheckups(){
        return WorkplaceCheckup::all();
    }

}
