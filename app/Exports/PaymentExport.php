<?php

namespace App\Exports;

use Auth;
use App\Affiliate;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PaymentExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $id=Auth::user()->id;
        return view('exports.pending_payment', [
            'payment' => Affiliate::where('affiliate_user_id',$id)->where('approved',1)->get()
        ]);
    }
}
