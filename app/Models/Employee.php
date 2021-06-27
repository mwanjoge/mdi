<?php

namespace App\Models;

use App\Services\EmployeeServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
     protected $fillable = [
         'work_place_id','name','birthday','entryDate','nationality','nationalID','phone',
         'email','contractType','jobTitle','department','gender'
     ];

     protected $casts = [
         'birthday' => 'date',
         'entryDate' => 'date'
     ];

     public function checkup(){
         return $this->hasOne(Checkup::class);
     }

     public function workPlace(){
         return $this->belongsTo(WorkPlace::class);
     }

     /*public function fullName(){
         return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
     }*/
     public function isChecked(){
         if(self::check($this->id)){
             return true;
         }
     }

     public function checkInfo(){
         return EmployeeServices::checkInfo($this->id);
     }

     public static function check($employee){
         return EmployeeServices::checkInfo($employee);
     }
}
