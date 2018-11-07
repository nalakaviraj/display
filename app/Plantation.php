<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plantation_id', 'plantation_name',  'created_at', 'updated_at', 'enable',
    ];
}
