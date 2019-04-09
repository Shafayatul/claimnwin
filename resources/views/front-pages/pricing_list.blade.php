@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/pricing_list.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">Pricing List</h1>
  </div>
@endsection

@section('content')
<div class="container">
    <div class="first_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>1. DEFINITIONS</h1>
                </div>
                <div class="first_row_p no_padding_bottom">
                    <p>
                        Our Price List should be read in conjunction with our Terms, where you will find all the defined terms used in our Price List.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="second_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>2. FREE SERVICES</h1>
                </div>
                <div class="second_row_p">
                    <p>
                        ClaimWin does not charge anything for its delivery of Eligibility Service, ClaimWin Connect, Information Service and unsuccessful Justice as a Service.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="third_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>3. FREE SERVICES</h1>
                </div>
                <div class="third_row_p">
                    <p>
                        If ClaimWin is successful with providing Justice as a Service and the Client receives Flight Compensation, ClaimWin is entitled to its Service Fee, which will be deducted
                        from Flight Compensation.
                    </p>
                </div>
                <div class="third_row_p">
                    <p>
                        For EC 261 Claims, the Service Fee is as follows:
                    </p>
                </div>
                <div class="third_row_p">
                    <p>
                        In case of all flights of 1,500 km or less, where the Client is entitled to a compensation of 250 EUR, the Client will pay a Service Fee of 63 EUR, including applicable VAT.
                    </p>
                    <p>
                        In case of all intra-Community flights of more than 1,500 km and for all flights between 1,500 km and 3,500 km, where the Client is entitled to a compensation of <br> 400 EUR,
                        the Client will pay a Service Fee of 100 EUR, including applicable VAT.
                    </p>
                    <p>
                        In case of all flights not described above, where the Client is entitled to a compensation of 600 EUR, the Client will pay a Service Fee of 150 EUR,<br> including applicable VAT.
                    </p>
                    <p>
                        In case of a flight as described above, where the Client is not entitled to EUR 250, EUR 400 or EUR 600, the Client shall pay a Service Fee of 25% of received Flight
                        Compensation, including applicable VAT.
                    </p>
                </div>
                <div class="third_row_p">
                    <p>
                        For other Claims than EC 261 Claims, the Service Fee is as follows:
                    </p>
                </div>
                <div class="third_row_p">
                    <p>
                        In case the Client receives Flight Compensation of 100 EUR or less, the Client will pay a Service Fee of 25 EUR, including applicable VAT.<br>
                        In case the Client receives Flight Compensation of 101-200 EUR, the Client will pay a Service Fee of 40 EUR, including applicable VAT.<br>
                        In case the Client receives Flight Compensation of 201-300 EUR, the Client will pay a Service Fee of 65 EUR, including applicable VAT.<br>
                        In case the Client receives Flight Compensation of 301-400 EUR, the Client will pay a Service Fee of 90 EUR, including applicable VAT.<br>
                        In case the Client receives Flight Compensation of 401-500 EUR, the Client will pay a Service Fee of 120 EUR, including applicable VAT.<br>
                        In case the Client receives Flight Compensation of 501-600 EUR, the Client will pay a Service Fee of 150 EUR, including applicable VAT.<br>
                        In case the Client receives Flight Compensation of 601-800 EUR, the Client will pay a Service Fee of 200 EUR, including applicable VAT.<br>
                        In case the Client receives Flight Compensation of 801-1,000 EUR, the Client will pay a Service Fee of 250 EUR, including applicable VAT
                    </p>
                </div>
                <div class="third_row_p">
                    <p>
                        The lock-step of an extra 50 EUR in fee for each increase of 200 EUR in Flight Compensation applies to all amounts above 1,000 EUR. As an example, if the Flight
                        Compensation is EUR 2,000, the Client will pay a Service Fee of 500 EUR, including applicable VAT.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="fourth_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>4. LEGAL ACTION FEE</h1>
                </div>
                <div class="fourth_row_p">
                    <p>
                        The Legal Action Fee is only charged, if Legal Action was necessary to provide successful Justice as a Service and will be deducted from your Flight Compensation in
                        addition to the Service Fee.
                    </p>
                </div>
                <div class="fourth_row_p">
                    <p>
                        The Legal Action Fee is only applicable to EC 261 Claims, where it is as follows:
                    </p>
                </div>
                <div class="fourth_row_p">
                    <p>
                        In case of all flights of 1,500 km or less, where the Client is entitled to a compensation of 250 EUR, the Client will pay a Legal Action Fee of 63 EUR, including applicable VAT.
                    </p>
                    <p>
                        In case of all intra-Community flights of more than 1,500 km and for all flights between 1,500 km and 3,500 km, where the Client is entitled to a compensation of 400 EUR,
                        the Client will pay a Legal Action Fee of 100 EUR, including applicable VAT.
                    </p>
                    <p>
                        In case of all flights not described above, where the Client is entitled to a compensation of 600 EUR, the Client will pay a Legal Action Fee of 150 EUR, including applicable VAT.
                    </p>
                    <p>
                        In case of a flight as described above, where the Client is not entitled to 250, 400 or 600 EUR, the Client shall pay a Legal Action Fee of 25% of received Flight Compensation,
                        including applicable VAT.
                    </p>
                </div>
                <div class="fourth_row_p">
                    <p>
                        The Legal Action Fee is not applicable to Claims that are covered by a booking connected with an ClaimWin+ purchase.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="five_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>5. CUSTOMERS FROM TRAVEL AGENCIES AND OTHER CORPORATE AGREEMENTS</h1>
                </div>
                <div class="five_row_p">
                    <p>
                        If you have entered into an Agreement with ClaimWin via a travel agency or another corporate agreement, the fee structure, payout options, currency conversion and
                        similar might be different depending on the specific level of services provided and individual terms agreed upon. However, in no event will the combined total of the
                        Service Fee and the Legal Action Fee that applies to you exceed the combined total of the Service Fee and the Legal Action Fee as described above.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="six_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>6. FLIGHT COMPENSATION AMOUNT GUARANTEE</h1>
                </div>
                <div class="six_row_p">
                    <p>
                        ClaimWin guarantees that the Client will always get the correct amount of compensation. If the Clients claim is filed in accordance with EC261, the Client is guaranteed
                        the correct amount in EUR. If the Clients claim is filed in accordance with other Air Passenger Rights Regulation, the Client is guaranteed the correct amount in the
                        applicable currency.
                    </p>
                </div>
                <div class="six_row_p">
                    <p>
                        This applies despite that ClaimWin might be paid in another currency by the airlines and incur fees and FX cost related to receiving the funds. ClaimWin will therefore
                        never reduce the correct amount of compensation with potential FX cost and bank charges related to receiving funds.
                    </p>
                </div>
                <div class="six_row_p">
                    <p>
                        All compensation is therefore always paid in EUR for EC261 claims and the applicable currency for other Air Passenger Rights claims, unless otherwise specifically
                        requested by the Client and accepted by ClaimWin.
                    </p>
                </div>
                <div class="six_row_p no_bottom_padding">
                    <p>
                        This gives the Client transparency on the compensation paid out and the ability to always be able to check that ClaimWin has transferred the correct amount in
                        accordance with EC261 or the applicable Air Passenger Rights Regulation.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="seven_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>7. FREE INTERNATIONAL BANK TRANSFER</h1>
                </div>
                <div class="seven_row_p">
                    <p>
                        ClaimWin offers free international bank transfers via its commercial partner. There will not be any transaction charges/fees of any type charged by neither ClaimWin
                        nor the commercial partner. All transaction fees/costs related to the sending bank will be fully covered by ClaimWin. However, ClaimWin will not cover any additional
                        fees/costs related to Intermediaries/beneficiary banks.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="eight_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>8. FREE CHECK PAYMENTS IN USD</h1>
                </div>
                <div class="eight_row_p">
                    <p>
                        ClaimWin offers check payments in USD as a payout method only if you are a resident of the USA. There will not be any charges/fees of any type charged by ClaimWin.
                        All fees/costs related to issuing checks will be fully covered by ClaimWin. However, ClaimWin will not cover any additional fees/costs related to the cashing of the checks.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="nine_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>9. VALUE ADDED TAX (VAT)</h1>
                </div>
                <div class="nine_row_p">
                    <p>
                        All fees and charges stated in this Price List include applicable VAT, unless otherwise specified.
                    </p>
                </div>
                <div class="nine_row_p no_bottom_padding">
                    <p>
                        Published: 2019.04.09
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
