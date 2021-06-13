<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employees;
use App\Benefits;
use App\Departments;
use App\Salary;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $attendances = Employees::join("attendances AS a", "a.employee_id", "=", "employees.id")
            ->join("attendances AS b", function ($join) {
                $join->on("a.time", "!=", "b.time");
                $join->on("a.employee_id", "=", "b.employee_id");
            })
            ->where([
                [DB::raw("hour(a.time)"), "<", 12],
                [DB::raw("date(a.time)"), "=", DB::raw("date(b.time)")]
            ])->first(DB::raw("COUNT(a.employee_id) as total_day"))->toArray()["total_day"];

        return view('admin.home', [
            'title' => 'Dashboard | Techpolitan',
            'employee' => Employees::count(),
            'salaries' => Salary::count(),
            'attendances' => $attendances
        ]);
    }
}
