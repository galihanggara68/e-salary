<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Attendance;
use App\Employees;
use App\User;

class AttendanceController extends Controller
{

    public function __construct()
    {
        $this->middleware("permission:create attendance")->only(["create", "store"]);
        $this->middleware("permission:read attendance")->only(["index"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.attendance.index', [
            'title' => 'Absen | Techpolitan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attendance.create', [
            'title' => 'Absen | Techpolitan',
            'employee_id' => Employees::orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Attendance::create([
            'employee_id' => User::Find(auth()->id)->employee->id,
            'description' => $request->description,
            'time' => $request->time
        ]);

        return redirect()->route('/home')->with("success", "Berhasil " . $request->att_type);
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
