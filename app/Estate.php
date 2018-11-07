<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estate_code', 'estate_name', 'plantation_id', 'enable', 'created_at', 'updated_at',
    ];
}
