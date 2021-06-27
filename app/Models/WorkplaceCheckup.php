<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkplaceCheckup extends Model
{
    use HasFactory;
    protected $fillable = [
        'work_place_id','checkup_at','submited_at','type','total_employee','total_checked'
    ];

    protected $casts = [
        'checkup_at' => 'date'
    ];

    public function workPlace(){
        return $this->belongsTo(WorkPlace::class);
    }

    public function checkupReports(){
        return $this->hasMany(CheckupReport::class);
    }
}
