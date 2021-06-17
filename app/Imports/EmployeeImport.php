<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\UploadReport;
use App\Models\WorkPlace;
use App\Services\EmployeeServices;
use App\Services\WorkplaceServices;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsOnFailure as OnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class EmployeeImport implements ToCollection, WithHeadingRow, SkipsOnError
{
    use Importable, SkipsErrors;

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            $workplace = WorkplaceServices::getWorkplaceByName(trim($row['workplace']));
            $employee = EmployeeServices::getEmployeeByNames(trim($row['name']));
            if ($employee){
                if($employee->isChecked()){
                    foreach($employee->checkInfo() as $checkup){
                        UploadReport::firstOrCreate(
                            ['checkup_id' => $checkup->id]);

                    }
                    Session::flash('issue', true);
                }
            }
            else{
                if($workplace){
                    Employee::create([
                        'work_place_id' => $workplace->id,
                        'name' => trim($row['name']),
                        'birthday' => trim($row['birthday']),
                        'entryDate' => trim($row['entrydate']),
                        'nationality' => trim($row['nationality']),
                        'phone' => trim($row['phone']),
                        'email' => trim($row['email']),
                        'contractType' => trim($row['contract']),
                        'jobTitle' => trim($row['jobtitle']),
                        'department' => trim($row['department']),
                        'gender' => trim($row['gender'])
                    ]);
                }
                else{
                    $newWorkplace = WorkPlace::create(['name'=>trim($row['workplace']),'status' => 'Not Inspected']);
                    Employee::create([
                        'work_place_id' => $newWorkplace->id,
                        'name' => trim($row['name']),
                        'birthday' => trim($row['birthday']),
                        'entryDate' => trim($row['entrydate']),
                        'nationality' => trim($row['nationality']),
                        'phone' => trim($row['phone']),
                        'email' => trim($row['email']),
                        'contractType' => trim($row['contract']),
                        'jobTitle' => trim($row['jobtitle']),
                        'department' => trim($row['department']),
                        'gender' => trim($row['gender'])
                    ]);
                }
            }
        }
    }
}
