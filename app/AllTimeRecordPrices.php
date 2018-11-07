<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllTimeRecordPrices extends Model
{
  protected $fillable = [
    'id','plantation_id','region','estate_id','manager_id','position','created_at'
  ];
}
