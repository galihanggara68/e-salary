<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employees;
use App\Departments;
use App\Groups;
use App\Positions;
use App\User;
use Auth;
use Carbon\Carbon;
use Error;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware("permission:read employee")->only(["index"]);
        $this->middleware("permission:create employee")->only(["create", "store"]);
        $this->middleware("permission:update employee")->only(["edit", "update"]);
        $this->middleware("permission:delete employee")->only(["destroy"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employee.index', [
            'title' => 'Karyawan | Techpolitan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create', [
            'title' => 'Tambah Karyawan | Techpolitan',
            'positions' => Positions::all(),
            'groups' => Groups::all(),
            'departments' => Departments::all(),
            'roles' => Role::all()
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
            'name' => 'required|min:5',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'position_id' => 'required',
            'group_id' => 'required',
            'department_id' => 'required',
            'status' => 'required',
            'salary' => 'required',
            'norek' => 'required',
            'role' => 'required'
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                "email" => $request->email,
                "name" => $request->name,
                "password" => Hash::make(explode("@", $request->email)[0] . Carbon::now()->format("Y")),
                'email_verified_at' => Carbon::now()->format("Y-m-d H:m:s")
            ]);

            $user->assignRole($request->role);

            $data = [
                'name' => $request->name,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'position_id' => $request->position_id,
                'group_id' => $request->group_id,
                'department_id' => $request->department_id,
                'status' => $request->status,
                'user_id' => $user->id,
                'salary' => $request->salary,
                'norek' => $request->norek
            ];

            Employees::create($data);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('admin.employee.index')->with('danger', 'Data Gagal Ditambahkan' . $e->getMessage());
        }

        return redirect()->route('admin.employee.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employees::Find($id);
        return view('admin.employee.show', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employee)
    {
        return view('admin.employee.edit', [
            'title' => 'Update Karyawan | Techpolitan',
            'employee' => $employee,
            'departments' => Departments::orderBy('name', 'ASC')->get(),
            'positions' => Positions::orderBy('name', 'ASC')->get(),
            'groups' => Groups::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employee)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'position_id' => 'required',
            'group_id' => 'required',
            'department_id' => 'required',
            'status' => 'required',
            'salary' => 'required',
            'norek' => 'required'
        ]);

        try {
            DB::beginTransaction();
            User::Find($employee->user->id)->update([
                "email" => $request->email,
                "name" => $request->name,
            ]);

            $data = [
                'name' => $request->name,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'position_id' => $request->position_id,
                'group_id' => $request->group_id,
                'department_id' => $request->department_id,
                'status' => $request->status,
                'salary' => $request->salary,
                'norek' => $request->norek
            ];

            $employee->update($data);
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('admin.employee.index')->with('danger', 'Data Gagal Diupdate' . $e->getMessage());
        }

        return redirect()->route('admin.employee.index')->with('info', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employee)
    {
        $employee->delete();

        return redirect()->route('admin.employee.index')->with('danger', 'Data Berhasil Dihapus');
    }
}
