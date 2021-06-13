<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function employee()
    {
        return $this->hasMany(Employees::class);
    }
}
