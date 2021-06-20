<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WorkplaceServices;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    public function logout() {
        Auth::logout();
        return redirect('/login');
      }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $workplaces = WorkplaceServices::getAllWorkplaces();
        return view('home',compact('workplaces'));
    }
}
