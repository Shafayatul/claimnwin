@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Unfinished Claim #100276</h4>
        </div>
        <div class="form-body">
            <div class="card">
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 widget-shadow">
                                <ul id="myTabs" class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#claim" id="claim-tab" role="tab" data-toggle="tab" aria-controls="claim" aria-expanded="false"> Claim</a></li>
                                    <li role="presentation"><a href="#airline" role="tab" id="airline-tab" data-toggle="tab" aria-controls="airline" aria-expanded="true">Airline Details</a></li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="claim" aria-labelledby="claim-tab">
                                        <div class="row claim_un_view">
                                            <h4>Passenger Details</h4>
                                            <p>Email: <span> dipto@gmail.com </span></p>
                                            <h4>Claim Details</h4>
                                            <p>DEPARTED FROM: <span> Charles de Gaulle International Airport, Paris (CDG)(France) </span></p>
                                            <p>FINAL DESTINATION: <span>Ben Gurion International Airport, Tel-aviv (TLV)(Israel)</span></p>
                                            <p>DID YOU HAVE ANY CONNECTING FLIGHTS?: <span>Yes</span></p>
                                            <p>CONNECTING FLIGHTS: <span>London Heathrow Airport, London (LHR),</span></p>
                                            <p>WHAT HAPPENED TO THE FLIGHT?: <span>Delayed flight</span></p>
                                            <p>WHAT WAS THE TOTAL DELAY ONCE YOU ARRIVED AT Ben Gurion International Airport, Tel-aviv (TLV)?: <span>3-8 hours</span></p>
                                            <p>WHAT DID THE AIRLINE SAY WAS THE REASON?: <span>technical problem</span></p>
                                            <p>AIRLINE: <span>British Airways</span></p>
                                            <p>FLIGHT NO: <span>BA 652</span></p>
                                            <p>DEPARTURE DATE: <span>11/25/2018</span></p>
                                            <p>COMPENSATION AMOUNT: <span>$400</span></p>
                                            <p>DISTANCE: <span>3284.07</span></p>
                                            <p>ADMIN COMMISSION: <span>36%</span></p>
                                            <p>AFFILIATE COMMISSION: <span>3.6%</span></p>
                                            <p>HAVE YOU CONTACTED THE AIRLINE REGARDING THIS CLAIM?: <span>No</span></p>
                                            <p>Additional Details: <span></span></p>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="airline" aria-labelledby="airline-tab">
                                        <div class="row">
                                            <div class="row claim_air_view">
                                                <hr>
                                                <p>NAME: <span>British Airways</span></p>
                                                <p>EMAIL#: <span>info@claimNwin.com</span></p>
                                                <p>PHONE#: <span></span></p>
                                                <p>IATA CODE: <span>BA</span></p>
                                                <p>ICAO CODE: <span>BAW</span></p>
                                                <p>ADDRESS: <span>British Airways Plc,Waterside, PO Box 365,Harmondsworth, UB7 0GB,United Kingdom</span></p>
                                                <p>COUNTRY: <span>United Kingdom</span></p>
                                                <p>AVAILABILITY: <span>Y</span></p>
                                                <p>SUB NAME: <span></span></p>
                                                <p>ONLINE FORM LINK: <span><a href="http://claimwin.ipistisdemo.com/claim-form/" target="_blank"> http://claimwin.ipistisdemo.com/claim-form/</a></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
