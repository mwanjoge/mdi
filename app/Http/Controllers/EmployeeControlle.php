<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Models\Employee;
use App\Models\UploadReport;
use App\Models\WorkPlace;
use App\Services\EmployeeServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;

class EmployeeControlle extends Controller
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
        $employees = EmployeeServices::getAllEmployees();
        return view('employee',compact('employees'));
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
        Employee::create($request->all());
        Alert::success('Complete', 'Employee Successfully Saved');
        return redirect()->back();
    }

    public function upload(Request $request){
        try {
            $import = new EmployeeImport();
            $import->import($request->upload);
        } catch (NoTypeDetectedException $e) {
            Alert::error("Sorry you are using a wrong format to upload files.");
            return back();
        }

        $issues = UploadReport::all();

        if(Session::has('issue')){
            Alert::warning('Complete With Issues', 'Excel Uploaded with
             some issues it looks like some of employee listed below have been already checked');
            return view('upload.issues',compact('issues'));
        }
        else{
            Alert::success('Complete', 'All Employees Uploaded Successfully');
            return redirect()->back();
        }
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

    public function results($id,$workplaceCheckupId){
        $employee = Employee::find($id);
        $workplace = WorkPlace::find($workplaceCheckupId);
        return view("employee.show_results",compact('workplace','employee'));
    }
}
