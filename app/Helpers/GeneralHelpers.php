<?php

use App\Models\WorkPlace;
use Illuminate\Support\Facades\DB;

function getWorkplaces(){
    return WorkPlace::all();
}

function getPercentage($value,$total){
	if($total > 0){
        $percent = ($value/$total)*100;
        return $percent;
    }
}

function getPercentageStatusColor($value){
    if($value <= 25){
        return 'danger';
    }
    elseif ($value > 25 && $value <= 50){
        return 'warning';
    }
    elseif ($value > 50 && $value <= 75){
        return 'success';
    }
    else{
        return 'info';
    }
}

function numberToWords($num){
    $num = str_replace(array(',', ' '), '', trim($num));
        if (!$num) {
            return false;
        }
        $num = (int)$num;
        $words = array();
        $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
            'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        );
        $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
        $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
            'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
            'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
        );
        $num_length = strlen($num);
        $levels = (int)(($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);
        for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int)($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ($hundreds == 1 ? '' : 's') . ' ' : '');
            $tens = (int)($num_levels[$i] % 100);
            $singles = '';
            if ($tens < 20) {
                $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '');
            } else {
                $tens = (int)($tens / 10);
                $tens = ' ' . $list2[$tens] . ' ';
                $singles = (int)($num_levels[$i] % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . (($levels && ( int )($num_levels[$i])) ? ' ' . $list3[$levels] . ' ' : '');
        } //end for loop
        $commas = count($words);
        if ($commas > 1) {
            $commas = $commas - 1;
        }
        return implode(' ', $words);
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
