<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Disease;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
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

    public function index(){
        $diseases = Disease::latest()->get();
        $categories = Category::latest()->get();
        return view('settings.index',compact('diseases','categories'));
    }

    public function diseaseDelete($id){
        //return 'fine';
        $disease = Disease::find($id);
        $disease->delete();
        Alert::success('Seting Deleted','You have successfuly Delete the Disease');
        return redirect()->back();
    }

    public function diseaseStore(Request $request){
        Disease::create($request->all());
        Alert::success('Disease Created','You have successfuly Store new Disease');
        return redirect()->back();

    }

    public function categoryStore(Request $request){
        Category::create($request->all());
        Alert::success('Disease  Category Created','You have successfuly Store new Disease Category');
        return redirect()->back();

    }
}
