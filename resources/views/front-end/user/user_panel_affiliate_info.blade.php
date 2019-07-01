@extends('layouts.user_front_layout')

@section('header-script')
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


  .social-p ul{
      padding: 0px;
      margin: 0px;
  }
  .social-p ul li{
      list-style: none;
      float: left;
  }

  #facebook{
      color: blue;
      font-size: 40px;
      margin-right: 20px;
  }


  #twitter{
      color: #2EFAFA;
      font-size: 40px;
      margin-right: 20px;
  }

  #linkedin{
      color: #0077B5;
      font-size: 40px;
      margin-right: 20px;
  }

  #whatsapp{
      color: #82DC28;
      font-size: 40px;
  }

  .social-p{
    display: block;
    overflow: hidden;
    text-align: center;
    float: center;
    width: 204px;
    margin: 0 auto;
  }


  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
  <link rel="stylesheet" href="{{asset('front_asset/user_panel/css/new_affiliate_info.css')}}">



@endsection

@section('content')
<div class="affiliate_info_body">
  <div class="container">
    <div class="affilite_info_total_div">
      <div class="row">
        <div class="col-md-8">
          <div class="content_div">
            <p>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][0]['translatedText'] !!}
              @else
                {!! $text[0] !!}
              @endif

               {{ Auth::user()->name }},

             @if ($responseDecoded)
               {!! $responseDecoded['data']['translations'][1]['translatedText'] !!}
             @else
               {!! $text[1] !!}
             @endif
             </p>
          </div>
          <div class="content_div">
            <div class="row">
                <div class="col-md-6 col-xs-6 col-sm-6">
                    <h4>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                      @else
                        {!! $text[2] !!}
                      @endif
                    </h4>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">
                    @php
                       $id = auth()->user()->id;
                    @endphp
                    <a href="{{URL::to('/refferal-all/'.$id)}}" class="show-all">
                      <h4>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                        @else
                          {!! $text[3] !!}
                        @endif
                      </h4>
                    </a>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th></th>
                      <th scope="col" class="text-center">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                        @else
                          {!! $text[4] !!}
                        @endif
                      </th>
                      <th scope="col" class="text-center">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
                        @else
                          {!! $text[5] !!}
                        @endif
                      </th>
                      <th scope="col" class="text-center">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                        @else
                          {!! $text[6] !!}
                        @endif
                      </th>
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
                    <h4>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][7]['translatedText'] !!}
                      @else
                        {!! $text[7] !!}
                      @endif
                    </h4>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-6">

                  <a href="{{URL::to('/pending-payment/'.$id)}}" class="show-all">
                    <h4>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                      @else
                        {!! $text[3] !!}
                      @endif
                    </h4>
                  </a>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th></th>
                      <th scope="col" class="text-center">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                        @else
                          {!! $text[4] !!}
                        @endif
                      </th>
                      <th scope="col" class="text-center">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
                        @else
                          {!! $text[5] !!}
                        @endif
                      </th>
                      <th scope="col" class="text-center">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                        @else
                          {!! $text[6] !!}
                        @endif
                      </th>
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
                    <h4>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][8]['translatedText'] !!}
                      @else
                        {!! $text[8] !!}
                      @endif
                    </h4>
                </div>
                <div class="col-xs-6 col-sm-6">
                    <a href="{{URL::to('/payment/'.$id)}}" class="show-all">
                      <h4>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                        @else
                          {!! $text[3] !!}
                        @endif
                      </h4>
                    </a>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped text-center">
                  <thead>
                    <tr>
                      <th></th>
                      <th scope="col" class="text-center">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                        @else
                          {!! $text[4] !!}
                        @endif
                      </th>
                      <th scope="col" class="text-center">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
                        @else
                          {!! $text[5] !!}
                        @endif
                      </th>
                      <th scope="col" class="text-center">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                        @else
                          {!! $text[6] !!}
                        @endif
                      </th>
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
              <span><i class="fa fa-user"></i></span> <span style="padding-left: 15px;">
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][9]['translatedText'] !!}
                @else
                  {!! $text[9] !!}
                @endif
              </span>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="content_div_text">
                  <p style="word-wrap: break-word;">{{url('user/signup/'.$encrypt_user_id)}}</p>
                  <div class="social-p">
                    {!! $facebook !!}

                    {!! $twitter !!}

                    {!! $linkedin !!}

                    {!! $whatsapp !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content_div">
            <div class="content_div_logo_title text-center" style="background-color: #cecece; margin-left: -20px; margin-right: -20px; margin-top: -20px; padding: 20px;">
              <span><i class="fa fa-bar-chart-o fa-fw"></i></span> <span style="padding-left: 15px;">
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][10]['translatedText'] !!}
                @else
                  {!! $text[10] !!}
                @endif
              </span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="content_div_text">
                  <p>
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][11]['translatedText'] !!}
                    @else
                      {!! $text[11] !!}
                    @endif
                    :
                    {{ $referral_count_data }}
                  </p>
                  <p>
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][12]['translatedText'] !!}
                    @else
                      {!! $text[12] !!}
                    @endif
                    :
                    {{ $commision_sum_amount }}
                  </p>
                  <p>
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][13]['translatedText'] !!}
                    @else
                      {!! $text[13] !!}
                    @endif
                    :
                    {{ $all_payments->sum('received_amount') }}
                  </p>
                  <hr>
                  <p>
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][14]['translatedText'] !!}
                    @else
                      {!! $text[14] !!}
                    @endif
                    :
                    {{ ($last_payments == null) ? '0' :  $last_payments  }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="content_div">
            <div class="content_div_logo_title text-center" style="background-color: #cecece; margin-left: -20px; margin-right: -20px; margin-top: -20px; padding: 20px;">
              <span><i class="fa fa-sticky-note"></i></span> <span style="padding-left: 15px;">
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][15]['translatedText'] !!}
                @else
                  {!! $text[15] !!}
                @endif
              </span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="content_div_text">
                  <p>
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][16]['translatedText'] !!}
                    @else
                      {!! $text[16] !!}
                    @endif
                  </p>
                  <br>
                  <a href="{{ URL::to('/terms-and-conditions') }}">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][17]['translatedText'] !!}
                    @else
                      {!! $text[17] !!}
                    @endif
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="content_div">
            <div class="content_div_logo_title text-center" style="background-color: #cecece; margin-left: -20px; margin-right: -20px; margin-top: -20px; padding: 20px;">
              <span><i class="fa fa-envelope"></i></span> <span style="padding-left: 15px;">
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][18]['translatedText'] !!}
                @else
                  {!! $text[18] !!}
                @endif
              </span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="content_div_text">
                  <p>
                    {{-- @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][19]['translatedText'] !!}
                    @else
                      {!! $text[19] !!}
                    @endif --}}
                  </p>
                  <br>
                  <a href="{{ URL::to('/contact-us') }}">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][17]['translatedText'] !!}
                    @else
                      {!! $text[17] !!}
                    @endif
                  </a>
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
