<?php

namespace App\Http\Controllers;

use App\Exports\CheckupExport;
use App\Models\Checkup;
use App\Models\WorkPlace;
use App\Services\WorkplaceServices;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
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
        /*$pdf = PDF::loadView('workplace._report_tamplete');
        return $pdf->download('data.pdf');*/
        /*return Excel::download(new CheckupExport, 'checkups.pdf');*/
        $workplace = WorkPlace::find($id);
        $reports = Checkup::where('work_place_id',$id)->get();
        return view('workplace.workplace_report',compact('reports','workplace'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $workplace = WorkplaceServices::getWorkplaceById($id);
        if(!$workplace){
            Alert::warning('Workplace Not Found');
            return redirect()->route('workplace.index');
        }
        //return $workplace->checkupReports;
        return view('workplace.show',compact('workplace'));
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
