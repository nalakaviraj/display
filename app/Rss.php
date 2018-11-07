<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rss extends Model
{
  protected $fillable = [
    'id','isapi','news','created_by','shadule','startdate','enddate'
  ];
}
