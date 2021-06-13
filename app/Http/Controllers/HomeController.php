<?php

namespace App\Http\Controllers;

use App\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $attendance_type = Attendance::where("employee_id", 1)->whereDay("time", Carbon::now()->format("d"))->count() > 0 ? "Check Out" : "Check In";
        return view('home', ["attendance_type" => $attendance_type]);
    }
}
