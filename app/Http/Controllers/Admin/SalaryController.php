<?php

namespace App\Http\Controllers\Admin;

use App\Bonus;
use App\Employees;
use App\Http\Controllers\Controller;
use App\Salary;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.salary.index", [
            'title' => 'Penggajian | Techpolitan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.salary.create", [
            'title' => 'Penggajian | Techpolitan',
            'employees' => Employees::all()
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
            'total' => 'required|numeric',
            'date' => 'date|required',
            'benefit_names' => "array|min:1",
            'benefit_amounts' => "array|min:1",
            'benefit_names.*' => "min:3",
            'benefit_amounts.*' => "numeric",
        ]);

        try {
            DB::beginTransaction();

            $salary = Salary::create([
                'employee_id' => $request->employee_id,
                'month' => $request->date
            ]);

            if (!is_null($request->benefit_names)) {
                $bonuses = array_map(function ($name, $amount) {
                    return new Bonus(["name" => $name, "amount" => $amount]);
                }, $request->benefit_names, $request->benefit_amounts);

                $salary->bonuses()->saveMany($bonuses);
            }

            DB::commit();
        } catch (QueryException $e) {
            dd($e);
            DB::rollBack();
            return redirect()->route('admin.salary.index')->with('danger', 'Data Gagal Ditambah');
        }

        return redirect()->route('admin.salary.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function getEmployeeData(Request $request)
    {
        $employee = Employees::Find($request->id);
        $date = Carbon::parse($request->date);
        // dd($request->date);
        $sick = $employee->attendances()->where([
            [DB::raw("month(time)"), "=", $date->month],
            [DB::raw("year(time)"), "=", $date->year],
            ["description", "=", "sakit"]
        ])->orWhere("description", "izin")->count();
        $attend = $employee->totalAttend($date->month, $date->year);
        $absent = 22 - $attend;
        $late = $employee->totalLate($date->month, $date->year);
        $totalBenefits = array_reduce($employee->group->benefit()->pluck("amount")->toArray(), function ($carry, $item) {
            $carry += $item;
            return $carry;
        });

        $total = (round($attend / 22)) * $employee->salary + $totalBenefits - (($late * 15000));

        return view("admin.salary.create", [
            'title' => 'Penggajian | Techpolitan',
            'employees' => Employees::all(),
            'employee' => $employee,
            'sick' => $sick,
            'late' => $late,
            'absent' => $absent,
            'total' => $total,
            'date' => $request->date
        ]);
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
    public function destroy(Salary $salary)
    {
        try {
            DB::beginTransaction();
            Bonus::where("salary_id", $salary->id)->delete();
            $salary->delete();
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('admin.salary.index')->with('danger', 'Data Gagal Didelete');
        }
        return redirect()->route('admin.salary.index')->with('success', 'Data Berhasil Didelete');
    }
}
