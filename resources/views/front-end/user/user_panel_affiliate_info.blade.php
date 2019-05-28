@extends('layouts.front_layout')

@section('content')
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
<link rel="stylesheet" href="{{asset('front_asset/user_panel/css/new_affiliate_info.css')}}">

<div class="affiliate_info_body">
  <div class="container">
    <div class="affilite_info_total_div">
      <div class="row">
        <div class="col-md-8">
          <div class="content_div">
            <p>Hello Ayumi Hamasaki,</br></br>Welcome to your affiliate control panel. Please manage your accounts via the left hand menu. To view the menu click the hamburger icon above. Please keep your contact/payment details up to date and we recommend you change your password from time to time for security.</br></br>To get started, view the product section for promotional materials and commission information.</br></br>Any problems, please let us know.</p>
          </div>
          <div class="content_div">
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
                <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">DateTime</th>
                      <th scope="col" class="text-center">Claim Id</th>
                      <th scope="col" class="text-center">	Commsion Amount</th>
                    </tr>
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



          <div class="content_div">
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
                <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">DateTime</th>
                      <th scope="col" class="text-center">Claim Id</th>
                      <th scope="col" class="text-center">	Commsion Amount</th>
                    </tr>
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



          <div class="content_div">
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
                <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">DateTime</th>
                      <th scope="col" class="text-center">Claim Id</th>
                      <th scope="col" class="text-center">	Commsion Amount</th>
                    </tr>
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
        <div class="col-md-4">
          <div class="content_div">
            <div class="content_div_logo_title text-center" style="background-color: #cecece; margin-left: -20px; margin-right: -20px; margin-top: -20px; padding: 20px;">
              <span><i class="fa fa-user"></i></span> <span style="padding-left: 15px;">Unique Affiliate Code</span>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="content_div_text">
                  <p>{{url('user/signup/'.$encrypt_user_id)}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="content_div">
            <div class="content_div_logo_title text-center" style="background-color: #cecece; margin-left: -20px; margin-right: -20px; margin-top: -20px; padding: 20px;">
              <span><i class="fa fa-bar-chart-o fa-fw"></i></span> <span style="padding-left: 15px;">Affiliate Overview</span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="content_div_text">
                  <p>Referrals : </p>
                  <p>Commissions : </p>
                  <p>Payments : </p>
                  <hr>
                  <p>Last Payment: </p>
                </div>
              </div>
            </div>
          </div>
          <div class="content_div">
            <div class="content_div_logo_title text-center" style="background-color: #cecece; margin-left: -20px; margin-right: -20px; margin-top: -20px; padding: 20px;">
              <span><i class="fa fa-sticky-note"></i></span> <span style="padding-left: 15px;">Terms & Condition</span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="content_div_text">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p><br>
                  <a href="#">More Information</a>
                </div>
              </div>
            </div>
          </div>
          <div class="content_div">
            <div class="content_div_logo_title text-center" style="background-color: #cecece; margin-left: -20px; margin-right: -20px; margin-top: -20px; padding: 20px;">
              <span><i class="fa fa-envelope"></i></span> <span style="padding-left: 15px;">Contact Us</span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="content_div_text">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p><br>
                  <a href="#">More Information</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





































{{--
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
</div> --}}


@endsection
