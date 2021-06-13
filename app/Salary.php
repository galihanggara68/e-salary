<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $guarded = [];

    public function bonuses()
    {
        return $this->hasMany(Bonus::class, "salary_id");
    }

    public function employee()
    {
        return $this->belongsTo(Employees::class, "employee_id");
    }
}
