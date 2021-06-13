<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function benefit()
    {
        return $this->hasMany(Benefits::class, "group_id");
    }

    public function employee()
    {
        return $this->hasMany(Employees::class);
    }
}
