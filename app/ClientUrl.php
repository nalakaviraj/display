<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientUrl extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_name', 'url', 'enable', 'created_at', 'updated_at',
    ];
}
