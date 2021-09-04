<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckupReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkup_id','employee_id','category_id','disease_id','hasIssue','results','descriptions','workplace_checkup_id'
    ];

    public function checkup(){
        return $this->belongsTo(Checkup::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function disease(){
        return $this->belongsTo(Disease::class);
    }
}
