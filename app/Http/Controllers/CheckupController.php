<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\CheckupReport;
use App\Models\Employee;
use App\Services\CheckupServices;
use App\Services\EmployeeServices;
use Illuminate\Http\Request;

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
        /*foreach($request->disease as $index => $disease){
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
        }*/
        $employee = Employee::find($request->employee);
        $employee->isChecked = true;
        $employee->save();
        return redirect()->back();
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
