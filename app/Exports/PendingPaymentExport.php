<?php

namespace App\Exports;

use Auth;
use App\Affiliate;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PendingPaymentExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
        public function view(): View
    {
        $id=Auth::user()->id;
        return view('exports.pending_payment', [
            'pending' => Affiliate::where('affiliate_user_id',$id)->where('approved',0)->get()
        ]);
    }
}
