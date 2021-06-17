<?php


namespace App\Services;


use App\Models\Checkup;

class CheckupServices
{
    public static function getAllCheckups(){
        return Checkup::all();
    }

}
