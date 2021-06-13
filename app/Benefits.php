<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefits extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo(Categories::class);
    }
}
