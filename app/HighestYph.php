<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighestYph extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id','plantation_id','estate_id','division_id','manager_id','division_manager_id','position', 'enable',
    ];

    public static function getAddedEmployeeId($id)
    {
    	return HighestYph::where('employee_id',$id)->count();
    }
}
