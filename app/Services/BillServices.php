<?php
namespace App\Services;

use App\Models\Bill;

class BillServices{

    public static function getBills(){
        return Bill::all();
    }

    public static function saveBill($prop){
        return Bill::create($prop);
    }

    public static function getBillsByWorkshop(){
        
    }
}
