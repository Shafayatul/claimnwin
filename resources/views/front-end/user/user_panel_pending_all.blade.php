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
                                <h4>All Pending Payments</h4>
                            </div>
                            <div class="col-md-6 col-xs-6 col-sm-6">
                                @if(count($pending_payments) > 0)
                                    <a href="{{URL::to('/pending-payment-all-export')}}" class="btn btn-success btn-sm" style="float: right;">Export CSV</a>
                                @endif
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
                                            @foreach($pending_payments as $item)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:i:s')}}</td>
                                                <td>{{$item->claim_id}}</td>
                                                <td>{{$item->commision_amount}}</td>
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
