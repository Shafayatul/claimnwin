@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
            <h4>affiliate: {{$affiliate->id}}</h4>
            </div>

            <div class="form-body">
                <div class="card">

                    <div class="card-body">

                        <a href="{{ url('/affiliates') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                                <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th> Claim Id </th>
                                        <td> {{ $affiliate->claim_id }} </td>
                                    </tr>
                                    <tr>
                                        <th> Commision Amount </th>
                                        <td> {{ $affiliate->commision_amount }} </td>
                                    </tr>

                                    <tr>
                                        <th> Percentage </th>
                                        <td> {{ $affiliate->percentage }} </td>
                                    </tr>

                                    <tr>
                                        <th> Received Amount </th>
                                        <td> {{ $affiliate->received_amount }} </td>
                                    </tr>
                                    <tr>
                                        <th> Payment Method </th>
                                        <td> {{ $affiliate->payment_method }} </td>
                                    </tr>
                                    <tr>
                                        <th> Approved</th>
                                        @if($affiliate->approved == 1)
                                        <td><span style="color: green;">Yes</span></td>
                                        @else
                                        <td><span style="color: red;">No</span></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th> Additional Description </th>
                                        <td> {{ $affiliate->addition_description }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
