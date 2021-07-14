<?php

namespace App\Http\Controllers;

use App\Models\WorkplaceCheckup;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WorplaceCheckupController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function submit(Request $request){
        WorkplaceCheckup::find($request->checkup)->update(['submited_at' => $request->submited_at]);
        Alert::success('Updated','Submitted date set successfully');
        return back();
    }
}
