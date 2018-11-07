<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblCounter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rotation_count',
    ];

    public $timestamps = false;
}
