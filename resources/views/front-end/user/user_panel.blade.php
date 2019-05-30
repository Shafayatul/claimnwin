@extends('layouts.user_front_layout')

@section('header-script')
  <title>My Claim - Claimnwin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    .user_panel_h1 h1 {
      margin-top: 0px;
    }
  </style>
@endsection

@section('content')
<div class="user_panel_main_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="parent_div">
          <div class="user_panel_h1">
            <h1>My Claim List</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 col-md-offset-1">
        <div class="parent_div text-center">
          <span class="bold_span">Claim</span>
        </div>
      </div>
      <div class="col-md-2">
        <div class="parent_div text-center">
          <span class="bold_span">Created at</span>
        </div>
      </div>
      <div class="col-md-2 text-center">
        <div class="parent_div text-center">
          <span class="bold_span">Defendant</span>
        </div>
      </div>
      <div class="col-md-2">
        <div class="parent_div text-center">
          <span class="bold_span">Value</span>
        </div>
      </div>
      <div class="col-md-2">
        <div class="parent_div text-center">
          <span class="bold_span">Status</span>
        </div>
      </div>
    </div>
    <div class="underline_row">

    </div>
    @foreach($claims as $claim)
      <div class="row">
        <div class="col-md-2 col-md-offset-1">
          <div class="parent_div claim_list_div text-center">
            <a href="{{ URL::to('/user-my-claim/'.$claim->id)}}">{{str_replace('_', ' ', ucfirst($claim->claim_table_type)) }}</a>
          </div>
        </div>
        <div class="col-md-2">
          <div class="parent_div claim_list_div text-center">
            <a href="{{ URL::to('/user-my-claim/'.$claim->id)}}">{{$claim->created_at}}</a>
          </div>
        </div>
        <div class="col-md-2 text-center">
          <div class="parent_div claim_list_div text-center">
            @if(isset($airline[$claim->airline_id]))
              <a href="{{ URL::to('/user-my-claim/'.$claim->id)}}">{{$airline[$claim->airline_id]}}</a>
            @else
              <a href="{{ URL::to('/user-my-claim/'.$claim->id)}}">---</a>
            @endif
          </div>
        </div>
        <div class="col-md-2">
          <div class="parent_div claim_list_div text-center">
            <a href="{{ URL::to('/user-my-claim/'.$claim->id)}}">
              @if($claim->converted_expection_amount != "")
                <a href="{{ URL::to('/user-my-claim/'.$claim->id)}}">{{$claim->converted_expection_amount}}</a>
              @else
                <a href="{{ URL::to('/user-my-claim/'.$claim->id)}}">{{$claim->amount}}</a>
              @endif
            </a>
          </div>
        </div>
        <div class="col-md-2">
          <div class="parent_div claim_list_div text-center">
            @if(isset($claim_status[$claim->claim_status_id]))
              <a href="{{ URL::to('/user-my-claim/'.$claim->id)}}" class="claim_status_a">
                @if ($claim->amount == '0')
                  Not eligible for compensation
                @else
                {{$claim_status[$claim->claim_status_id]}}
                @endif

              </a>
            @else
              <a href="{{ URL::to('/user-my-claim/'.$claim->id)}}" class="claim_status_a">No status defined</a>
            @endif
          </div>
        </div>
      </div>
      <div class="claim_list_div_underline">
      </div>
    @endforeach



  </div>
  </div>

@endsection
