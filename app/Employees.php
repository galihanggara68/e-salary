<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employees extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo(Departments::class, "department_id");
    }

    public function position()
    {
        return $this->belongsTo(Positions::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, "employee_id");
    }

    public function group()
    {
        return $this->belongsTo(Groups::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function complains()
    {
        return $this->hasMany(Complain::class);
    }

    public function totalAttend($month, $year)
    {
        return $this::join("attendances AS a", "a.employee_id", "=", "employees.id")
            ->join("attendances AS b", function ($join) {
                $join->on("a.time", "!=", "b.time");
                $join->on("a.employee_id", "=", "b.employee_id");
            })
            ->where([
                [DB::raw("hour(a.time)"), "<", 12],
                [DB::raw("date(a.time)"), "=", DB::raw("date(b.time)")],
                ["a.employee_id", "=", $this->id],
                [DB::raw("month(a.time)"), "=", $month],
                [DB::raw("year(a.time)"), "=", $year]
            ])->first(DB::raw("COUNT(a.employee_id) as total_day"))->toArray()["total_day"];
    }

    public function totalLate($month, $year)
    {
        return $this::join("attendances AS a", "a.employee_id", "=", "employees.id")->whereTime('time', '>=', \Carbon\Carbon::parse('08:31'))
            ->whereTime('time', '<=', \Carbon\Carbon::parse('12:00'))->where([
                [DB::raw("month(a.time)"), "=", $month],
                [DB::raw("year(a.time)"), "=", $year]
            ])->first(DB::raw("COUNT(a.employee_id) as total_day"))->toArray()["total_day"];
    }
}
