@extends('FrontEnd.user.user_panel_layout')

@section('user_panel_main_section')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="parent_div">
          <div class="user_panel_h1">
            <h1>Claim abcd1235</h1>
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
          <span class="bold_span">ID</span>
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

    <div class="row">
      <div class="col-md-2 col-md-offset-1">
        <div class="parent_div claim_list_div text-center">
          <a href="{{ URL::to('/user-my-claim')}}">Cancelled Flight(en)</a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="parent_div claim_list_div text-center">
          <a href="{{ URL::to('/user-my-claim')}}">abcd1235</a>
        </div>
      </div>
      <div class="col-md-2 text-center">
        <div class="parent_div claim_list_div text-center">
          <a href="{{ URL::to('/user-my-claim')}}">British Airway</a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="parent_div claim_list_div text-center">
          <a href="{{ URL::to('/user-my-claim')}}">$1234.56</a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="parent_div claim_list_div text-center">
          <a href="{{ URL::to('/user-my-claim')}}" class="claim_status_a">In progress</a>
        </div>
      </div>
    </div>
    <div class="claim_list_div_underline">

    </div>



  </div>

@endsection
