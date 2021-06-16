<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departments;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware("permission:create department")->only(["create", "store"]);
        $this->middleware("permission:read department")->only(["index"]);
        $this->middleware("permission:update department")->only(["edit", "update"]);
        $this->middleware("permission:delete department")->only(["destroy"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.department.index', [
            'title' => 'Departemen | Techpolitan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create', [
            'title' => 'Tambah Departemen | Techpolitan'
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
            'name' => 'required|min:10',
            'status' => 'required'
        ]);

        Departments::create($request->only('name', 'status'));

        return redirect()->route('admin.department.index')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(Departments $department)
    {
        return view('admin.department.edit', [
            'title' => 'Update Departemen | Teachpolitan',
            'department' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $department)
    {
        $department->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return redirect()->route('admin.department.index')->with('info', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departments $department)
    {
        $department->delete();

        return redirect()->route('admin.department.index')->with('danger', 'Data Berhasil Dihapus');
    }
}
