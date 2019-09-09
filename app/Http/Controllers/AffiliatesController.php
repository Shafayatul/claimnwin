<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Affiliate;
use App\Exports\AffiliatesExport;
use Carbon\Carbon;
use Excel;

class AffiliatesController extends Controller
{
    public function manageAffiliate()
    {
        $affliates = Affiliate::all();
        return view('affiliate.manage_affiliate',compact('affliates'));
    }

    public function show($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        return view('affiliate.show', compact('affiliate'));
    }

    public function edit($id)
    {
        $affiliate = Affiliate::findorFail($id);
        return view('affiliate.edit',compact('affiliate'));
    }

    public function update(Request $request, $id)
    {
        $affiliate = Affiliate::find($id);
        $affiliate->commision_amount        = $request->commision_amount;
        $affiliate->percentage              = $request->percentage;
        $affiliate->received_amount         = $request->received_amount;
        $affiliate->payment_method          = $request->payment_method;
        $affiliate->addition_description    = $request->addition_description;
        $affiliate->approved                = $request->approved;
        $affiliate->is_payment_done         = $request->is_payment_done;
        $affiliate->save();
        return redirect('/affiliates')->with('success','Affiliate Updated!');
    }

    public function destroy($id)
    {
        Affiliate::destroy($id);
        return redirect('/affiliates')->with('success','Affiliate Deleted!');
    }

    public function exportAffiliate()
    {
        $today = Carbon::now()->format('d-m-Y').'-Affiliate'.'.xlsx';
        return Excel::download(new AffiliatesExport, $today);
    }
}
