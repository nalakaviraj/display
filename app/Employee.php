<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_name', 'plantation_id', 'estate_id', 'user_type_id', 'employee_image_path_name', 'enable', 'created_at', 'updated_at',
    ];


    // public function employeeBestProfitPerHect()
    // {
    // 	return $this->hasOne('App\BestProfitPerHect');
    // }
    
    public static function  namecrop($name){
        $emp_name = strlen($name); 
        
        if($emp_name > 15){
            $first_name = substr($name,0,13);
            $last_name = substr($name,13,15);
            
            $full_name = $first_name." <br>".$last_name;
            
            if(strlen($full_name) > 32){
                return $first_name." - <br>".$last_name."..";
            }else{
                return  $first_name." - <br>".$last_name;
            }
        }else{
            return $name;
        }
        
    }

}
