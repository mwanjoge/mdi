<?php


namespace App\Services;


use App\Models\Checkup;
use App\Models\CheckupReport;
use App\Models\WorkplaceCheckup;
use Illuminate\Support\Facades\DB;

class CheckupServices
{
    public $workplaceId;
    public $type;
    public $diseaseCategory;
    public $workplaceCheckupId;
    public $employeeId;
    public $data;
    static $checkupByDiseaseCategory;


    public function getData(){
        return $this->data->get();
    }
	public function setWorkplaceId($workplaceId){
		$this->workplaceId = $workplaceId;
        return $this;
	}

	public function setType($type) {
		$this->type = $type;
        return $this;
	}

	public function setDiseaseCategory($diseaseCategory){
		$this->diseaseCategory = $diseaseCategory;
        return $this;
	}

	public function setWorkplaceCheckupId($workplaceCheckupId) {
		$this->workplaceCheckupId = $workplaceCheckupId;
        return $this;
	}

	public function setEmployeeId($employeeId){
		$this->employeeId = $employeeId;
        return $this;
	}

    public static function getAllCheckups(){
        return Checkup::all();
    }
    public function unCheckedEmployeeByTypePlace(){
        return DB::table('employees')
        ->where('work_place_id',$this->workplaceId)
           ->whereNotExists(function ($query){
               $query->select(DB::raw(1))
                     ->from('checkups')
                     ->whereColumn('checkups.employee_id', 'employees.id')
                     ->where('type',$this->type)
                     ->where('work_place_id',$this->workplaceId);
           });
    }
    public function getUnCheckedEmployeeByTypePlace(){
        return $this->unCheckedEmployeeByTypePlace()->get();
    }
    public function getFemaleEmployeesCount(){
        return $this->unCheckedEmployeeByTypePlace()->where('gender','female')->get();
    }
    public function getMaleEmployeesCount(){
        return $this->unCheckedEmployeeByTypePlace()->where('gender','male')->get();
    }
    public static function getAllWorkplaceCheckups(){
        return WorkplaceCheckup::all();
    }
    public function getCheckupResultsByWorkplaceCheckupId(){
        $this->data = CheckupReport::select('checkup_reports.*')
            //->join('diseases','diseases.id','=','checkup_reports.disease_id')
            ->where('checkup_reports.workplace_checkup_id',$this->workplaceCheckupId);
           // dd($this->data);
            return $this;
    }
    public function getCheckupsByWorkplaceCheckupId(){
        $this->data = Checkup::select('checkups.*')
            ->join('checkup_reports','checkup_reports.checkup_id','=','checkups.id')
            ->join('diseases','diseases.id','=','checkup_reports.disease_id')
            ->where('checkup_reports.workplace_checkup_id',$this->workplaceCheckupId)
            ->where('checkups.workplace_checkup_id',$this->workplaceCheckupId);
            return $this;

    }
    public function getCheckupResultsByType(){
        $this->data = $this->data
            ->where('workplace_checkups.type',$this->type)->get();
            return $this;
    }

    public function getCheckupResultsByDiseaseCategory(){
            $this->data = $this->data
            ->where('category_id',$this->diseaseCategory);
            return $this;
    }

    public function positive(){
        $this->data = $this->data
            ->where('hasIssue',true);
            //->groupBy('checkups.id');
            return $this;
    }

    public function negative(){
        $this->data = $this->data
            //->where('diseases.category',$this->diseaseCategory)
            ->where('hasIssue',false);
            //->distinct('checkup_reports.employee_id')
           // ->unique()->values()->all();
           // ->unique('checkup_reports.employee_id');
            return $this;
    }

    public function getEmployeeCheckupResults(){
        $this->data = $this->data
            ->where('employee_id',$this->employeeId);
            return $this;
    }


}
