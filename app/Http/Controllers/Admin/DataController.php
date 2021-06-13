<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departments;
use App\Positions;
use App\Employees;
use App\Benefits;
use App\Complain;
use App\Groups;
use App\Salary;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function departments()
    {
        $department = Departments::orderBy('name', 'ASC');

        return datatables()->of($department)
            ->addColumn('action', 'admin.department.action')
            ->addIndexColumn()
            ->toJson();
    }

    public function positions()
    {
        $position = Positions::orderBy('id', 'ASC');

        return datatables()->of($position)
            ->addColumn('action', 'admin.position.action')
            ->addIndexColumn()
            // ->rawColumn(['action'])
            ->toJson();
    }

    public function groups()
    {
        $groups = Groups::orderBy('name', 'ASC');
        return datatables()->of($groups)
            ->addColumn('action', 'admin.group.action')
            ->addColumn('benefits', function (Groups $model) {
                $benefits = "";
                foreach ($model->benefit as $ben) {
                    $amount = preg_replace("/(\d)(?=(\d{3})+(?!\d))/", "$1.", $ben->amount);
                    $benefits .= "<span data-bs-toggle='tooltip' data-bs-placement='top' title='Rp $amount'>$ben->name</span>" . ", ";
                }
                return trim($benefits, ", ");
            })
            ->addIndexColumn()
            ->rawColumns(["benefits", "action"])
            ->toJson();
    }

    public function employees()
    {
        $employee = Employees::orderBy('name', 'ASC');
        return datatables()->of($employee)
            ->addColumn('action', 'admin.employee.action')
            ->addColumn('department', function (Employees $model) {
                return $model->department->name;
            })
            ->addColumn('position', function (Employees $model) {
                return $model->position->name;
            })
            ->addColumn('salary', function (Employees $model) {
                return $model->salary;
            })
            ->addColumn('benefit', function (Employees $model) {
                return $model->group->benefit()->selectRaw("benefits.group_id, sum(benefits.amount) as total")->groupBy("benefits.group_id")->first()->total;
            })
            ->addIndexColumn()
            ->toJson();
    }

    public function attendances()
    {
        $test = Employees::from("employees AS e")
            ->join("attendances AS a", "a.employee_id", "=", "e.id")
            ->join("attendances AS b", function ($join) {
                $join->on("a.time", "!=", "b.time");
                $join->on("a.employee_id", "=", "b.employee_id");
            })
            ->where([
                [DB::raw("hour(a.time)"), "<", 12],
                [DB::raw("date(a.time)"), "=", DB::raw("date(b.time)")]
            ])->get(["a.employee_id", "e.name", "a.time AS IN", "b.time AS OUT", "a.description"]);
        return datatables()->of($test)
            ->addColumn('total', function ($model) {
                $in = Carbon::parse($model->IN);
                $out = Carbon::parse($model->OUT);
                return round($out->floatDiffInHours($in), 2);
            })
            ->addColumn('date', function ($model) {
                $in = Carbon::parse($model->IN);
                $in->setLocale("id");
                return $in->isoFormat("dddd, D MMMM Y");
            })
            ->addIndexColumn()
            ->toJson();
    }

    public function users()
    {
        $users = User::orderBy('name', 'ASC');

        return datatables()->of($users)
            ->addColumn('action', 'admin.user.action')
            ->addIndexColumn()
            ->toJson();
    }

    public function complains()
    {
        $complains = Complain::orderBy('created_at', 'ASC');

        return datatables()->of($complains)
            ->addColumn('action', 'admin.complain.action')
            ->addColumn('employee', function (Complain $model) {
                return $model->employee->name;
            })
            ->addIndexColumn()
            ->toJson();
    }

    public function benefits()
    {
        $benefit = Benefits::orderBy('nominal', 'ASC');
        return datatables()->of($benefit)
            ->addColumn('action', 'admin.benefit.action')
            ->addColumn('employee_id', function (Benefits $model) {
                return $model->employee->name;
            })
            ->addColumn('group_id', function (Benefits $model) {
                return $model->group->name;
            })
            ->addIndexColumn()
            ->toJson();
    }

    public function salaries()
    {
        $salaries = Salary::orderBy("month", "ASC");
        return datatables()->of($salaries)
            ->addColumn('action', 'admin.salary.action')
            ->addColumn('employee', function (Salary $model) {
                return $model->employee->name;
            })
            ->addColumn('norek', function (Salary $model) {
                return $model->employee->norek;
            })
            ->addColumn('month', function (Salary $model) {
                $month = Carbon::parse($model->month);
                $month->setLocale("id");
                return $month->isoFormat("MMMM Y");
            })
            ->addIndexColumn()
            ->toJson();
    }
}
