<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
     protected $fillable = [
         'work_place_id','first_name','middle_name','last_name','birthday','entryDate','nationality','phone',
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

     public function fullName(){
         return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
     }
}
