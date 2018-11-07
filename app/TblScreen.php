<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblScreen extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'screen_name', 'enable',
    ];
}
