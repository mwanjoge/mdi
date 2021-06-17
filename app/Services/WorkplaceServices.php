<?php


namespace App\Services;


use App\Models\WorkPlace;

class WorkplaceServices
{
    public static function getAllWorkplaces(){
        return WorkPlace::all();
    }

    public static function getWorkplaceById($workPlaceId){
        return WorkPlace::find($workPlaceId);
    }
}
