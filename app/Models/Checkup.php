<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id','work_place_id','workplace_checkup_id','checkupDate','leader','type','status','isChecked'
    ];

    protected $casts = [
        'checkupDate' => 'date'
    ];

    public function workPlace(){
        return $this->belongsTo(WorkPlace::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function checkupReports(){
        return $this->hasMany(CheckupReport::class);
    }

    public function workplaceCheckup(){
        return $this->belongsTo(WorkplaceCheckup::class);
    }
}
