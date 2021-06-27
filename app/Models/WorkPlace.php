<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkPlace extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','location','address','status'];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function bills(){
        return $this->hasMany(Bill::class);
    }
    public function checkups(){
        return $this->hasMany(Checkup::class);
    }
    public function workplaceCheckups(){
        return $this->hasMany(WorkplaceCheckup::class);
    }
}
