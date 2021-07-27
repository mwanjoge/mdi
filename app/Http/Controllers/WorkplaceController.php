<?php

namespace App\Http\Controllers;

use App\Exports\CheckupExport;
use App\Models\Checkup;
use App\Models\Employee;
use App\Models\WorkPlace;
use App\Models\WorkplaceCheckup;
use App\Services\WorkplaceServices;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class WorkplaceController extends Controller
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
        $workplaces = WorkplaceServices::getAllWorkplaces();
        return view('home',compact('workplaces'));
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
        WorkPlace::create($request->all());
        Alert::success('Complete', 'Workplace Successfully Saved');
        return redirect()->back();
    }

    public function report($id){
        $workplace = WorkplaceCheckup::find($id);
        $reports = Checkup::where('workplace_checkup_id',$id)->get();
        return view('workplace.workplace_report',compact('reports','workplace'));
    }
    public function reportLater($id){
        /*$pdf = PDF::loadView('workplace._report_tamplete');
        return $pdf->download('data.pdf');*/
        /*return Excel::download(new CheckupExport, 'checkups.pdf');*/
        $workplace = WorkplaceCheckup::with('workPlace')->find($id);
        //return $workplace;
        $reportsData = Checkup::select('checkups.*')
            ->join('checkup_reports','checkup_reports.checkup_id','checkups.id')
            ->join('employees','employees.id','=','checkup_reports.employee_id')
            ->where('checkups.workplace_checkup_id',$id)
            ->where('checkup_reports.workplace_checkup_id',$id);
        $reports = $reportsData->get();
        //return Employee::where('birthday', '<' , date('Y-m-d', strtotime('-60 years')))->get();
        $greaterThanSixty = count($reportsData->where('employees.birthday','<' , date('Y-m-d h:m:s', strtotime('-60 years')))->get());
        return $greaterThanSixty;
        return view('workplace.workplace_report_leter',compact('reports','workplace'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id,$workplaceCheckupId = null)
    {
        return $this->workPlaceQuery($id,$workplaceCheckupId );
    }

    public function getWorkplaceCheckup($id,$workplaceCheckupId){
        return $this->workPlaceQuery($id,$workplaceCheckupId );
    }

    public function workPlaceQuery($id,$workplaceCheckupId ){
        //return $id;
        $workplace = WorkplaceServices::getWorkplaceById($id);
        $workplaceCheckups = null;
        if(!$workplace){
            Alert::warning('Workplace Not Found');
            return back();
        }
        if($workplaceCheckupId === null){
            $workplaceCheckup = $workplace->workplaceCheckups->last();
            if($workplaceCheckup){
                $workplaceCheckups = Checkup::where('workplace_checkup_id',$workplaceCheckup->id)->get();
            }
        }
        else{
            $workplaceCheckup = WorkplaceCheckup::find($workplaceCheckupId);
            $workplaceCheckups = Checkup::where('workplace_checkup_id',$workplaceCheckupId)->get();
        }
        //return $workplaceCheckups;
        return view('workplace.show',compact('workplace','workplaceCheckups','workplaceCheckup'));
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
