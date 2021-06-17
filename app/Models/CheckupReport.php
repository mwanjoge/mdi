<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckupReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkup_id','employee_id','disease','isSick'
    ];

    public function checkup(){
        return $this->belongsTo(Checkup::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
