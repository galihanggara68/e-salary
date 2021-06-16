<?php

namespace App\Http\Controllers\Admin;

use App\Complain;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ComplainController extends Controller
{

    public function __construct()
    {
        $this->middleware("permission:create complain")->only(["create", "store"]);
        $this->middleware("permission:read complain")->only(["index"]);
        $this->middleware("permission:update complain")->only(["edit", "update"]);
        $this->middleware("permission:delete complain")->only(["destroy"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.complain.index', [
            'title' => 'Laporan | Weecom'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.complain.create', [
            'title' => 'Buat Complain | Techpolitan'
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

        $this->validate($request, [
            'complain' => 'required'
        ]);
        Complain::create([
            "employee_id" => auth()->user()->employee->id,
            "complain" => $request->complain
        ]);

        return redirect()->route('admin.complain.index')->with('success', 'Data Berhasil Ditambahkan');
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
        Complain::destroy($id);

        return redirect()->route('admin.complain.index')->with('success', 'Data Berhasil Dihapus');
    }
}
