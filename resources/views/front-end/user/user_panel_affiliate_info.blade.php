@extends('front-end.user.user_panel_layout')

@section('user_panel_main_section')
<style>
.affiliate_info_mother_div{
    margin-top: 20px;
}

table thead tr th:first-child {
    width: 0%!important;
}

.show-all{
    float: right;
    color: #337ab7;
    padding: 0px;
    margin: 0px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >

<div class="user_panel_main_section">
  <div class="container">
        <div class="affiliate_info_mother_div">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-6 col-sm-6">
                                <h4>Latest 5 Refferals</h4>
                            </div>
                            <div class="col-md-6 col-xs-6 col-sm-6">
                                @php
                                   $id = auth()->user()->id;
                                @endphp
                                <a href="{{URL::to('/refferal-all/'.$id)}}" class="show-all"><h4>Show All</h4></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>#</th>
                                            <th>DateTime</th>
                                            <th>Claim Id</th>
                                            <th>Commsion Amount</th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach($referral_ids as $referral_id)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{Carbon\Carbon::parse($referral_id->created_at)->format('d-m-Y h:i:s')}}</td>
                                                <td>{{$referral_id->claim_id}}</td>
                                                <td>{{$referral_id->commision_amount}}</td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-xs-6 col-sm-6">
                                    <h4>Latest 5 Pending Payments</h4>
                                </div>
                                <div class="col-md-6 col-xs-6 col-sm-6">

                                    <a href="{{URL::to('/pending-payment/'.$id)}}" class="show-all"><h4>Show All</h4></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <th>#</th>
                                                <th>DateTime</th>
                                                <th>Claim ID</th>
                                                <th>Commsion Amount</th>
                                            </thead>
                                            <tbody>
                                                    @php
                                                    $i = 1;
                                                @endphp
                                                @foreach($pending_payments as $pending_payment)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{Carbon\Carbon::parse($pending_payment->created_at)->format('d-m-Y h:i:s')}}</td>
                                                    <td>{{$pending_payment->claim_id}}</td>
                                                    <td>{{$pending_payment->commision_amount}}</td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel-group">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6 col-sm-6">
                                        <h4>Latest 5 Payments</h4>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <a href="{{URL::to('/payment/'.$id)}}" class="show-all"><h4>Show All</h4></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <th>#</th>
                                                    <th>DateTime</th>
                                                    <th>Claim Name</th>
                                                    <th>Commsion Amount</th>
                                                </thead>
                                                <tbody>
                                                        @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach($payments as $payment)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{Carbon\Carbon::parse($payment->created_at)->format('d-m-Y h:i:s')}}</td>
                                                        <td>{{$payment->claim_id}}</td>
                                                        <td>{{$payment->commision_amount}}</td>
                                                    </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>


@endsection
