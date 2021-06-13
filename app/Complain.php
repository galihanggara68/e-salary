<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employees::class, "employee_id");
    }
}
