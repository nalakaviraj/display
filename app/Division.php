<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'division_id', 'estate_id', 'division_code', 'division_name', 'manager_id', 'enable',
    ];
}
