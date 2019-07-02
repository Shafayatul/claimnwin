@extends('layouts.front_layout')

@section('header-script')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link href="{{asset('front_asset/front_pages_asset/css/form_claim.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="container">
    <div class="form_claim_main_content_div">
        <div class="row">
            <div class="col-md-3">
                <div class="form_claim_main_left_content_div">
                    <div class="row">
                        <div class="col-md-12" style="margin: 0px; padding: 0px;">
                            <div class="form_claim_main_left_content_ul_div">
                                <ul class="fa-ul">
                                    <li>
                                        <div class="li_mother_div">
                                            <div class="li_number_div">
                                                <div class="li_number_child_div text-center">
                                                    <span>1</span>
                                                </div>
                                            </div>
                                            <div class="li_text_div">
                                                <span>Eligibility</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="li_mother_div">
                                            <div class="li_number_div">
                                                <div class="li_number_child_div text-center align-middle">
                                                    <span>2</span>
                                                </div>
                                            </div>
                                            <div class="li_text_div">
                                                <span>Additional Details</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="li_mother_div">
                                            <div class="li_number_div">
                                                <div class="li_number_child_div text-center">
                                                    <span>3</span>
                                                </div>
                                            </div>
                                            <div class="li_text_div">
                                                <span>Claim Submission</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form_claim_main_right_content_div">
                    <form class="" action="" method="post">
                        <div class="common_row">
                            <div class="form_h3">
                                <h3>Select the reason for submitting your claim request</h3>
                            </div>
                            <div class="parent_div">
                                <div class="select_option_div">
                                    <select class="form-control custom_select reason" name="reason">
                                        <option value="" hidden>Please select</option>
                                        <option value="missed_connection">Missed Connection</option>
                                        <option value="flight_delay">Flight Delay</option>
                                        <option value="flight_cancellation">Flight Cancellation</option>
                                        <option value="delay_luggage">Delayed Luggage</option>
                                        <option value="lost_luggage">Lost Luggage</option>
                                        <option value="denied_boarding">Denied Boarding</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-script')
<script type="text/javascript">
    $(document).ready(function() {
      $('.reason').change(function() {
        var claim_type = $(".reason").val();
        if (claim_type=="missed_connection") {
          location.href="{{ url('/missed-connection') }}";
        }else if (claim_type=="flight_delay") {
          location.href="{{ url('/flight-delay') }}";
        }else if (claim_type=="flight_cancellation") {
          location.href="{{ url('/flight-cancellation') }}";
        }else if (claim_type=="delay_luggage") {
          location.href="{{ url('/delay-luggage') }}";
        }else if (claim_type=="lost_luggage") {
          location.href="{{ url('/lost-luggage') }}";
        }else if (claim_type=="denied_boarding") {
          location.href="{{ url('/denied-boarding') }}";
        }
      });
    });
</script>

@endsection
