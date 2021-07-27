<?php

use App\Models\WorkPlace;
use Illuminate\Support\Facades\DB;

function getWorkplaces(){
    return WorkPlace::all();
}
function numberToWords($number){
    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    return $f->format($number);
}
function getEmployeeCheckupResultsByDiseaseCategory($category,$workplaceCheckupId,$employeeId){
    return \App\Services\CheckupServices::getEmployeeCheckupResultsByDiseaseCategory($category,$workplaceCheckupId,$employeeId);
}

function getAllDiseases(){
    return \App\Models\Disease::select('diseases.*')->get();
}

function getDiseaseCategories(){
    return DB::table('diseases')->distinct()
        ->select(DB::raw('MIN(id) as id, category'))
        ->groupBy('category')->get();
}
