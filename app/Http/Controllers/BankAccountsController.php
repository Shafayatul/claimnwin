<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BankAccount;
use Illuminate\Http\Request;
use Auth;
use App\Currency;

class BankAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $bankaccounts = BankAccount::join('currencies','bank_accounts.currency_of_account','=','currencies.id')
                ->where('bank_accounts.user_id', 'LIKE', "%$keyword%")
                ->orWhere('account_name', 'LIKE', "%$keyword%")
                ->orWhere('bank_name', 'LIKE', "%$keyword%")
                ->orWhere('iban_no', 'LIKE', "%$keyword%")
                ->orWhere('swift_bic_code', 'LIKE', "%$keyword%")
                ->orWhere('currency_of_account', 'LIKE', "%$keyword%")
                ->orWhere('bank_accounts.status', 'LIKE', "%$keyword%")
                ->select('bank_accounts.*','currencies.code')
                ->latest()->paginate($perPage);
        } else {
            $bankaccounts = BankAccount::join('currencies','bank_accounts.currency_of_account','=','currencies.id')
            ->select('bank_accounts.*','currencies.code')
                ->latest()->paginate($perPage);
        }
        return view('bank-accounts.index', compact('bankaccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $currency = Currency::pluck('code','id');
        return view('bank-accounts.create',compact('currency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        BankAccount::create($requestData+ ['user_id' => Auth::user()->id]);

        return redirect('bank-accounts/create')->with('success', 'BankAccount added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $bankaccount = BankAccount::join('currencies','bank_accounts.currency_of_account','=','currencies.id')
        ->select('bank_accounts.*','currencies.code')
        ->findOrFail($id);

        return view('bank-accounts.show', compact('bankaccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $bankaccount = BankAccount::findOrFail($id);
        $currency = Currency::pluck('code','id');
        return view('bank-accounts.edit', compact('bankaccount','currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $bankaccount = BankAccount::findOrFail($id);
        $bankaccount->update($requestData+ ['user_id' => Auth::user()->id]);

        return redirect('bank-accounts')->with('success', 'BankAccount updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        BankAccount::destroy($id);

        return redirect('bank-accounts')->with('success', 'BankAccount deleted!');
    }
}
