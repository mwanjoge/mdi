<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkup_id'
    ];

    public function checkup(){
        return $this->belongsTo(Checkup::class);
    }
}
