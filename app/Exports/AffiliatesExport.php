<?php

namespace App\Exports;

use App\Affiliate;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AffiliatesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.affiliates', [
            'affiliates' => Affiliate::all()
        ]);
    }
}
