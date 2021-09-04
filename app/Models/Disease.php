<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','name'
    ];

    public function checkupReports(){
        return $this->hasMany(CheckupReport::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function($disease){
            $disease->checkupReports->each(function ($report){
                $report->delete();
            });
        });
    }

}
