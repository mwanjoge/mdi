<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\CheckupReport;
use App\Models\Disease;
use App\Models\Employee;
use App\Models\WorkPlace;
use App\Models\WorkplaceCheckup;
use App\Services\CheckupServices;
use App\Services\EmployeeServices;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CheckupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkups = CheckupServices::getAllCheckups();
        $employees = EmployeeServices::getAllEmployees();
        return view('checkup.index',compact('checkups','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $checkup = Checkup::create([
            'employee_id' => $request->employee,
            'work_place_id' => $request->workplace,
            'checkupDate' => now(),
            'leader' => auth()->user()->name,
            'status' => $request->status,
            'type' => $request->type,
        ]);
        foreach($request->disease as $index => $disease){
            if(isset($request->results[$index])){
                CheckupReport::create([
                    'checkup_id' => $checkup->id,
                    'employee_id' => $request->employee,
                    'disease' => $disease,
                    'isSick' => $request->results[$index]
                ]);
            }
            else{
                CheckupReport::create([
                    'checkup_id' => $checkup->id,
                    'employee_id' => $request->employee,
                    'disease' => $disease,
                    'isSick' => 0
                ]);
            }
        }
        $employee = Employee::find($request->employee);
        $employee->isChecked = true;
        $employee->save();
        return redirect()->back();
    }

    public function workplaceCheckup(Request $request){
        $workplace = WorkPlace::find($request->workplace);
        $employees = CheckupServices::getUnCheckedEmployeeByTypePlace($request->type,$request->workplace);
        if(count($employees) > 0){
            $workplaceCheck = new WorkplaceCheckup([
                'work_place_id' => $request->workplace,
                'checkup_at' => $request->checkup_at,
                'type' => $request->type,
                'total_employee' => count($workplace->employees),
            ]);
            $workplaceCheck->save();

            foreach($employees as $employee){
                $checkup = Checkup::create([
                    'employee_id' => $employee->id,
                    'work_place_id' => $workplace->id,
                    'workplace_checkup_id' => $workplaceCheck->id,
                    'checkupDate' =>now(),
                    'type' => $request->type,
                    'status' => 'not checked',
                ]);
                foreach(Disease::all() as $disease){
                    CheckupReport::create([
                        'workplace_checkup_id' => $workplaceCheck->id,
                        'employee_id' => $employee->id,
                        'checkup_id' => $checkup->id,
                        'disease_id' => $disease->id,
                    ]);
                }
            }
            $reports = CheckupReport::where('workplace_checkup_id',$workplaceCheck->id)->get();

        Alert::success('Work Place Checkup Created');
        return redirect()->back();
        }
        else{
            Alert::warning('Employee not found','Looks like no new employee to attend on '.$request->tyep.' checkup');
            return redirect()->back();
        }


    }

    public function toggleResults($id){
        $result = CheckupReport::find($id);
        if($result->hasIssue){
            $result->hasIssue = false;
            $result->checkup->status = 'checked';
            $result->checkup->save();
        }
        else{
            $result->hasIssue = true;
            $result->checkup->status = 'checked';
            $result->checkup->save();

        }
        $result->save();
        return $result;
    }

    public function updateStatus($id,$status){
        $checkup = Checkup::find($id);
        //return $checkup->workPlaceCheckup;
        $checkup->status = $status;
        if(!$checkup->isChecked){
            $checkup->isChecked = true;
            $checkup->workplaceCheckup->total_checked +=1;
            $checkup->workplaceCheckup->save();
        }
        $checkup->save();
        return $checkup;
    }
    public function updateResults($id,$results){
        $checkup = CheckupReport::find($id);
        $checkup->results = $results;
        $checkup->save();
        return $checkup;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
