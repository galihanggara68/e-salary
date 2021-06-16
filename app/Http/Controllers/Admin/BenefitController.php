<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Benefits;
use App\Employees;
use App\Groups;
use Facade\FlareClient\Http\Response;

class BenefitController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:create group")->only(["create", "store"]);
        $this->middleware("permission:read group")->only(["index"]);
        $this->middleware("permission:update group")->only(["edit", "update", "updateAjax"]);
        $this->middleware("permission:delete group")->only(["destroy", "deleteAjax"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.benefit.index', [
            'title' => 'Gaji & Tunjangan | Weecom'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.benefit.create', [
            'title' => 'Tambah Gaji & Tunjangan | Weecom',
            'employees' => Employees::orderBy('name', 'ASC')->get(),
            'groups' => Groups::orderBy('name', 'ASC')->get()
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
            'employee_id' => 'required',
            'categorie_id' => 'required',
            'nominal' => 'required',
            'status' => 'required'
        ]);

        Benefits::create([
            'employee_id' => $request->employee_id,
            'categorie_id' => $request->categorie_id,
            'nominal' => $request->nominal,
            'status' => $request->status
        ]);

        return redirect()->route('admin.benefit.index')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(Benefits $benefit)
    {
        return view('admin.benefit.edit', [
            'title' => 'Update Gaji | Weecom',
            'benefit' => $benefit,
            'employees' => Employees::orderBy('name', 'ASC')->get(),
            'categories' => Categories::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Benefits $benefit)
    {
        $benefit->update([
            'employee_id' => $request->employee_id,
            'categorie_id' => $request->categorie_id,
            'nominal' => $request->nominal,
            'status' => $request->status
        ]);

        return redirect()->route('admin.benefit.index')->with('info', 'Data Berhasil Diupdate');
    }

    public function updateAjax(Request $request, $id)
    {
        Benefits::Find($id)->update([
            "name" => $request->name,
            "amount" => $request->amount
        ]);

        return response()->json(["msg" => "success"], 200);
    }

    public function deleteAjax($id)
    {
        Benefits::Find($id)->delete();

        return response()->json(["msg" => "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Benefits $benefit)
    {
        $benefit->delete();

        return redirect()->route('admin.benefit.index')->with('danger', 'Data Berhasil Dihapus');
    }
}
