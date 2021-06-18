<?php

namespace App\Exports;

use App\Models\Checkup;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CheckupExport implements FromView
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view():View
    {
        return view('workplace.workplace_report');
    }
}
