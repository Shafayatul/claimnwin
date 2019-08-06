@extends('layouts.front_layout')

@section('header-script')
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('front_asset/') }}/claim/flight_delay/css/main.css">
<!--===============================================================================================-->
<link href="{{asset('signature/css/jquery.signaturepad.css')}}" rel="stylesheet">
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
                  <div class="wrapper">
    {{-- <div class="form_h2">
        <h2 class="text-center">Flight Delay</h2>
    </div> --}}
      <form action="{{url('/claim')}}" method="post" id="step-form" enctype="multipart/form-data" >
        @csrf
        <!-- ...................................................................
                                  STEP 1 STARTS
        .................................................................... -->
        <div class="single_step" id="step_1">
            <div class="common_row">
                <div class="form_h3">
                    <h3>Where did you fly?</h3>
                </div>
                <div class="parent_div">
                  <div class="two_child_div_left">
                    <div class="label_field">
                      <label for="departed_from">DEPARTED FROM: </label>
                    </div>
                    <div class="input_field">
                      <input type="text" class="auto_airport_complete common_input departed_from" id="advanced-demo common_input departed_from" name="departed_from" placeholder="e.g. JFK">
                    </div>
                  </div>
                  <div class="two_child_div_right">
                    <div class="label_field">
                      <label for="final_destination">FINAL DESTINATION: </label>
                    </div>
                    <div class="input_field">
                      <input type="text" class="auto_airport_complete common_input final_destination" id="common_input final_destination" name="final_destination" placeholder="e.g. LHR">
                    </div>
                  </div>
                </div>
                <div style="display: none;">
                   <input type="text" name="selected_connection_iata_codes" class="selected_connection_iata_codes">
                </div>

            </div>

            <div class="common_row" style="display: none;">
                <div class="form_h3">
                    <h3>Were any other airports involved in this trip?</h3>
                </div>
                <div class="label_field only_label_without_input">
                  <label>IF YOUR TRIP WAS NOT A DIRECT FLIGHT, LET US KNOW.</label>
                </div>
                <div class="parent_div">
                    <div class="two_child_radio_div first_child">
                        <label class="container_radio">Yes
                            <input class="common_input" type="radio" id="common_input is_direct_flight_yes" name="is_direct_flight" value="1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="two_child_radio_div">
                        <label class="container_radio">No
                            <input class="common_input" type="radio" id="common_input is_direct_flight_no" name="is_direct_flight" value="0" checked>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="common_row" id="connection_div" style="display: none">
                <div class="form_h3">
                    <h3>What airports were involved?</h3>
                </div>
                <div class="parent_div">
                      <div class="child_div">
                        <input type="text" class="auto_airport_complete common_input connection" id="common_input connection" name="connection[]" placeholder="East-West Paris Airport">
                      </div>
                    <div class="property" id="property">

                    </div>
                </div>
                <div class="parent_div" style="display: none;">
                    <button type="button" name="button" id="add_connection" class="add_connection"><i class="fas fa-plus"></i></button>
                </div>
            </div>

            <div class="common_row">
                <div class="parent_div">
                    <div class="single_button_child_div">
                        <button type="button" class="continue_button" id="continue_1" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ...................................................................
                                  STEP 1 ENDS
        .................................................................... -->
        <!-- ...................................................................
                                  STEP 2 STARTS
        .................................................................... -->
        <div class="single_step" id="step_2" style="display:none;">
            <div class="common_row show_on_what_happened_to_the_flight_selected">
                <div class="parent_div">
                    <div class="form_h3">
                        <h3>What was the total delay once you arrived at <span id="final_destination_data"></span> ?</h3>
                    </div>
                </div>
                <div class="parent_div">
                    <div class="total_delay_flight">
                        <label class="container_radio">Less than 3 hours
                            <input type="radio" class="common_input" id="common_input less_than_3_hours" name="total_delay" value="less_than_3_hours">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="total_delay_flight">
                        <label class="container_radio">3-8 hours
                            <input type="radio" class="common_input" id="common_input 3_to_8_hours" name="total_delay" value="3_to_8_hours">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="total_delay_flight">
                        <label class="container_radio">more than 8 hours
                            <input type="radio" class="common_input" id="common_input more_than_8_hours" name="total_delay" value="more_than_8_hours">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="total_delay_flight">
                        <label class="container_radio">Never arrived
                            <input type="radio" class="common_input" id="common_input never_arrived" name="total_delay" value="never_arrived">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="common_row show_on_total_delay_selected">
                <div class="parent_div">
                    <div class="form_h3">
                        <h3>What did the airline say was the reason?</h3>
                    </div>
                </div>
                <div class="parent_div">
                    <div class="airline_reason_select_div">
                       {{--  <input type="text" class=" common_input form-control custom_select custom_select_reason_max_width reason" id="common_input " name="reason" placeholder="Reason"> --}}
                        <select class="form-control custom_select custom_select_reason_max_width reason" name="reason">
                          <option value="" hidden>Please select</option>
                          <option value="technical_problem">Technical problem</option>
                          <option value="bad_weather_conditions">Bad weather conditions</option>
                          <option value="influence_by_other_flights">Influence by other flights</option>
                          <option value="issues_with_airport">Issues with airport</option>
                          <option value="strike">Strike</option>
                          <option value="no_reason_given">No reason given</option>
                          <option value="donot_remember">Don't remember</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button pull-right" id="continue_2" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <div class="two_button_child_div_left">
                        <div class="previous_button_div">
                            <button type="button" class="previous_button pull-left" id="previous_button" name="button"><i class="fas fa-arrow-left"></i> Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ...................................................................
                                  STEP 2 ENDS
        .................................................................... -->
        <!-- ...................................................................
                                  STEP 3 STARTS
        .................................................................... -->

        <div class="single_step" id="step_3" style="display:none;">
          <div class="common_row">
            <div class="parent_div">
                <div class="form_h3">
                    <h3>Itinerary details for your disrupted flight</h3>
                </div>
                {{-- <div class="form_h4">
                    <h4>Please give us the full itinerary so we can make sure we claim for the full amount.</h4>
                </div> --}}
                <div class="label_field only_label_without_input">
                  <label>PLEASE GIVE US THE FULL ITINERARY SO WE CAN MAKE SURE WE CLAIM FOR THE FULL AMOUNT.</label>
                </div>
            </div>

            <div class="itinerary_flight_element">
              {{-- code from JS --}}
            </div>
          </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button pull-right" id="continue_3" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <div class="two_button_child_div_left">
                        <div class="previous_button_div">
                            <button type="button" class="previous_button pull-left" id="previous_button" name="button"><i class="fas fa-arrow-left"></i> Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ...................................................................
                                  STEP 3 ENDS
        .................................................................... -->
        <!-- ...................................................................
                                  STEP 4 STARTS
        .................................................................... -->

        <div class="single_step" id="step_4" style="display:none;">
            <div class="accommodation">
                <div class="common_row">
                    <div class="parent_div">
                        {{-- <div class="form_h4">
                            <h4>Optional: Did you spend on accommodation, food or taxi while waiting for your rerouting flight?</h4>
                        </div> --}}
                        <div class="label_field only_label_without_input">
                          <label>OPTIONAL: DID YOU SPEND ON ACCOMMODATION, FOOD OR TAXI WHILE WAITING FOR YOUR REROUTING FLIGHT?</label>
                        </div>
                    </div>
                    <div class="parent_div" style="display: table;">
                        <div class="child_accommodation child_accommodation_first_div" style="display: table-cell;">
                            <label class="container_radio label_child_accommodation">I did not spend anything
                                <input type="radio" class="common_input" id="common_input not_spend" name="is_spend_on_accommodation" value="not_spend">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="child_accommodation child_accommodation_second_div" style="display: table-cell;">
                            <label class="container_radio label_child_accommodation">I had expenses but I have not kept the invoices
                                <input type="radio" class="common_input" id="common_input no_invoice" name="is_spend_on_accommodation" value="no_invoice">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="child_accommodation child_accommodation_third_div" style="display: table-cell;">
                            <label class="container_radio label_child_accommodation">I had expenses and kept the invoices
                                <input type="radio" class="common_input" id="common_input has_invoice" name="is_spend_on_accommodation" value="has_invoice">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>


            <div class="common_row table_show_on_large_screen">
              <div class="parent_div">
                {{-- <div class="form_h4 text-center">
                  <h4>Tell us about your expenses.</h4>
                </div> --}}
                <div class="label_field only_label_without_input">
                  <label>TELL US ABOUT YOUR EXPENSES.</label>
                </div>
              </div>
              <div class="parent_div">
                <div class="table_field">
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">Expense</th>
                        <th scope="col" class="text-center">Amount</th>
                        <th scope="col" class="text-center">Receipt</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="align-baseline">Accommodation
                          <input type="hidden" value="accommodation" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                        </td>
                        <td>
                          <div class="row">
                            <div class="col-md-6 fifty_percent_width">
                              <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6 fifty_percent_width">
                              <div class="select_reason_class">
                                <select class="form-control custom_select expense_currency_select_option select_accomodation_currency" name="expense_currency[]">
                                  <option hidden>Currency</option>
                                  @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$key}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="group">
                            <input id="is_receipt_accommodation_yes" name="is_receipt[0]" type="radio" value="1" checked="checked">
                            <label class="label" for="is_receipt_accommodation_yes">Yes</label>
                            <input id="is_receipt_accommodation_no" name="is_receipt[0]" type="radio" value="0" >
                            <label class="center label" for="is_receipt_accommodation_no">No</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-baseline">Transportation
                          <input type="hidden" value="transportation" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                        </td>
                        <td>
                          <div class="row">
                            <div class="col-md-6 fifty_percent_width">
                              <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6 fifty_percent_width">
                              <div class="select_reason_class">
                                <select class="form-control custom_select expense_currency_select_option select_accomodation_currency" name="expense_currency[]">
                                  <option hidden>Currency</option>
                                  @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$key}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group yes_no_center">
                            <div class="group">
                              <input id="is_receipt_transportation_yes" name="is_receipt[1]" type="radio" value="1" checked="checked">
                              <label class="label" for="is_receipt_transportation_yes">Yes</label>
                              <input id="is_receipt_transportation_no" name="is_receipt[1]" type="radio" value="0" >
                              <label class="center label" for="is_receipt_transportation_no">No</label>
                            </div>

                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-baseline">Food
                          <input type="hidden" value="food" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                        </td>
                        <td>
                          <div class="row">
                            <div class="col-md-6 fifty_percent_width">
                              <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6 fifty_percent_width">
                              <div class="select_reason_class">
                                <select class="form-control custom_select expense_currency_select_option select_accomodation_currency" name="expense_currency[]">
                                  <option hidden>Currency</option>
                                  @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$key}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group yes_no_center">
                            <div class="group">
                              <input id="is_receipt_food_yes" name="is_receipt[2]" type="radio" value="1" checked="checked">
                              <label class="label" for="is_receipt_food_yes">Yes</label>
                              <input id="is_receipt_food_no" name="is_receipt[2]" type="radio" value="0" >
                              <label class="center label" for="is_receipt_food_no">No</label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="align-baseline">Other
                          <input type="hidden" value="other" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                        </td>
                        <td>
                          <div class="row">
                            <div class="col-md-6 fifty_percent_width">
                              <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6 fifty_percent_width">
                              <div class="select_reason_class">
                                <select class="form-control custom_select expense_currency_select_option select_accomodation_currency" name="expense_currency[]">
                                  <option hidden>Currency</option>
                                  @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$key}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group yes_no_center">
                            <div class="group">
                              <input id="is_receipt_others_yes" name="is_receipt[3]" type="radio" value="1" checked="checked">
                              <label class="label" for="is_receipt_others_yes">Yes</label>
                              <input id="is_receipt_others_no" name="is_receipt[3]" type="radio" value="0" >
                              <label class="center label" for="is_receipt_others_no">No</label>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="common_row table_show_on_small_screen">
              <div class="parent_div">
                {{-- <div class="form_h4 text-center">
                  <h4>Tell us about your expenses.</h4>
                </div> --}}
                <div class="label_field only_label_without_input">
                  <label>TELL US ABOUT YOUR EXPENSES.</label>
                </div>
              </div>
              <div class="parent_div">
                <div class="table_field">
                  <table class="table text-center">
                    <tr>
                      <th scope="col">Expense</th>
                      <td class="align-baseline">Accommodation</td>
                    </tr>
                    <tr>
                      <th scope="col">Amount</th>
                      <td>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select expense_currency_select_option select_accomodation_currency" name="expense_currency[]">
                                <option hidden>Currency</option>
                                @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$key}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="bootstrap_table_tr_lower_thin_border">
                      <th scope="col">Receipt</th>
                      <td>
                        <div class="group">
                          <input id="is_receipt_accommodation_yes_mobile" name="is_receipt[0]" type="radio" value="1" checked="checked">
                          <label class="label" for="is_receipt_accommodation_yes_mobile">Yes</label>
                          <input id="is_receipt_accommodation_no_mobile" name="is_receipt[0]" type="radio" value="0" >
                          <label class="center label" for="is_receipt_accommodation_no_mobile">No</label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="col">Expense</th>
                      <td class="align-baseline">Transportation</td>
                    </tr>
                    <tr>
                      <th scope="col">Amount</th>
                      <td>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select expense_currency_select_option select_accomodation_currency" name="expense_currency[]">
                                <option hidden>Currency</option>
                                @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$key}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="bootstrap_table_tr_lower_thin_border">
                      <th scope="col">Receipt</th>
                      <td>
                        <div class="input-group yes_no_center">
                          <div class="group">
                            <input id="is_receipt_transportation_yes_mobile" name="is_receipt[1]" type="radio" value="1" checked="checked">
                            <label class="label" for="is_receipt_transportation_yes_mobile">Yes</label>
                            <input id="is_receipt_transportation_no_mobile" name="is_receipt[1]" type="radio" value="0" >
                            <label class="center label" for="is_receipt_transportation_no_mobile">No</label>
                          </div>

                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="col">Expense</th>
                      <td class="align-baseline">Food</td>
                    </tr>
                    <tr>
                      <th scope="col">Amount</th>
                      <td>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select expense_currency_select_option select_accomodation_currency" name="expense_currency[]">
                                <option hidden>Currency</option>
                                @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$key}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="bootstrap_table_tr_lower_thin_border">
                      <th scope="col">Receipt</th>
                      <td>
                        <div class="input-group yes_no_center">
                          <div class="group">
                            <input id="is_receipt_food_yes_mobile" name="is_receipt[2]" type="radio" value="1" checked="checked">
                            <label class="label" for="is_receipt_food_yes_mobile">Yes</label>
                            <input id="is_receipt_food_no_mobile" name="is_receipt[2]" type="radio" value="0" >
                            <label class="center label" for="is_receipt_food_no_mobile">No</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="col">Expense</th>
                      <td class="align-baseline">Others</td>
                    </tr>
                    <tr>
                      <th scope="col">Amount</th>
                      <td>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select expense_currency_select_option select_accomodation_currency" name="expense_currency[]">
                                <option hidden>Currency</option>
                                @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$key}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="bootstrap_table_tr_lower_thin_border">
                      <th scope="col">Receipt</th>
                      <td>
                        <div class="input-group yes_no_center">
                          <div class="group">
                            <input id="is_receipt_others_yes_mobile" name="is_receipt[3]" type="radio" value="1" checked="checked">
                            <label class="label" for="is_receipt_others_yes_mobile">Yes</label>
                            <input id="is_receipt_others_no_mobile" name="is_receipt[3]" type="radio" value="0" >
                            <label class="center label" for="is_receipt_others_no_mobile">No</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

                <div class="common_row">
                    <div class="email_div">
                        <div class="label_field">
                            <label for="email_address">Please enter your email address</label>
                        </div>
                        <div class="input_field">
                            <input type="text" class="common_input email_address" id="common_input email_address" name="email_address" placeholder="e.g. something@gmail.com">
                        </div>
                    </div>
                </div>
                {{-- <div class="common_row">
                  <div class="email_div">
                    <div class="label_field">
                      <label for="phone_number">PLEASE ENTER YOUR PHONE NUMBER</label>
                    </div>
                    <div class="input_field">
                      <input type="text" class="common_input phone_number" id="common_input phone_number" name="phone_number" placeholder="+123-2345678">
                    </div>
                  </div>
                </div> --}}
            </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" onclick="horizontalCustomStyle();" class="continue_button pull-right" id="continue_4" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <div class="two_button_child_div_left">
                        <div class="previous_button_div">
                            <button type="button" class="previous_button pull-left" id="previous_button" name="button"><i class="fas fa-arrow-left"></i> Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ...................................................................
                                  STEP 4 ENDS
        .................................................................... -->
        <!-- ...................................................................
                                  STEP 5 STARTS
        .................................................................... -->

        <div class="single_step" id="step_5" style="display:none;">

          <div class="common_row">
            <p>We're running checks against thousands of pieces of information relating to your flight to give you an accurate decision on your claim.</p>
          </div>
          <div class="common_row">
            <div class="row">
              <div class="col-md-6">
                <div class="parent_div" style="margin-bottom: 15px;">
                  <div class="checked_icon_div">
                    <div class="icon_container_div">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                  <div class="checked_icon_text_div">
                    Time Limit checked
                  </div>
                </div>
                <div class="parent_div" style="margin-bottom: 15px;">
                  <div class="checked_icon_div">
                    <div class="icon_container_div">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                  <div class="checked_icon_text_div">
                    Distance of flight checked
                  </div>
                </div>
                <div class="parent_div" style="margin-bottom: 15px;">
                  <div class="checked_icon_div">
                    <div class="icon_container_div">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                  <div class="checked_icon_text_div">
                    Length of delay checked
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="parent_div" style="margin-bottom: 15px;">
                  <div class="checked_icon_div">
                    <div class="icon_container_div">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                  <div class="checked_icon_text_div">
                    Weather condition checked
                  </div>
                </div>
                <div class="parent_div" style="margin-bottom: 15px;">
                  <div class="checked_icon_div">
                    <div class="icon_container_div">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                  <div class="checked_icon_text_div">
                    Legal validity of claim checked
                  </div>
                </div>
                <div class="parent_div" style="margin-bottom: 15px;">
                  <div class="checked_icon_div">
                    <div class="icon_container_div">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                  <div class="checked_icon_text_div">
                    Cross referenced against database of existing claims
                  </div>
                </div>

              </div>
            </div>
          </div>

          <hr>

            <div class="common_row result_from_ajax_calculation">

            </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button pull-right" id="continue_5" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <div class="two_button_child_div_left">
                        <div class="previous_button_div">
                            <button type="button" class="previous_button pull-left" id="previous_button" name="button"><i class="fas fa-arrow-left"></i> Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ...................................................................
                                  STEP 5 ENDS
        .................................................................... -->
        <!-- ...................................................................
                                  STEP 6 STARTS
        .................................................................... -->

        <div class="single_step" id="step_6" style="display:none;">
          <div class="common_row">
            <div class="form_h3">
              <h3>Passenger details</h3>
            </div>
            <div class="form_h4">
              <h4>Make sure to type your name as it appears on your flight ticket.</h4>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="first_name">FIRST NAME</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input first_name" id="common_input first_name" name="first_name[]" placeholder="e.g. John">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="last_name">LAST NAME</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input last_name" id="common_input last_name" name="last_name[]" placeholder="e.g. Dcosta">
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="address">ADDRESS</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input address" id="common_input address" name="address[]" placeholder="e.g. Road No. 13, House No. 13 New York">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="post_code">POST CODE</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input post_code" id="common_input post_code" name="post_code[]" placeholder="e.g. 1212">
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="date_of_birth">DATE OF BIRTH</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input date_of_birth date" id="common_input date_of_birth" name="date_of_birth[]" placeholder=" DD/MM/YY">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="phone">Phone</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input phone" id="common_input phone" name="phone[]" placeholder="e.g. 1212">
                </div>
              </div>
            </div>
            <input type="hidden" name="additional_email_address[]" value="none">
          </div>

          <div class="common_row">
            <div class="form_h3">
              <h3>What’s your booking reference?</h3>
            </div>
            <div class="parent_div" style="padding-bottom: 20px;">
              <label>A booking reference is a code used by airlines to keep track of individual reservations. You can find your booking reference on your e-ticket or on any emails or documents you received from the airline after booking your trip. This code will most often be six digits, including both letters and numbers (for example: DF87G3, REDYYD, L5W4NW). Please make sure you don’t include spaces. For help locating your booking please contact our <a  style="font-weight: bold; color: #124478;" target="_blank"  href="{{ URL::to('/contact-us') }}">Customer Service Department.</a></label>
            </div>
            <div class="parent_div">
              <div class="two_child_radio_div first_child">
                <label class="container_radio">Add Now
                  <input class="common_input passenger_is_booking_checkbox" type="radio" count="0" id="common_input is_booking_reference_yes" name="is_booking_reference[0]" value="1">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="two_child_radio_div">
                <label class="container_radio">Add Later
                  <input class="common_input passenger_is_booking_checkbox" type="radio" count="0" id="common_input is_booking_reference_no" name="is_booking_reference[0]" value="0" checked>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="parent_div show_on_is_booking_reference_yes_0" style="display:none">
              <div class="add_booking_reference_div" id="add_booking_reference_div_0">
                <div class="child_div" style="margin-top: 10px;" id="reference_remove">
                  <input style="width: 50%; float: left; margin-right: 10px; margin-bottom: 0px; margin-top: 0px;" type="text" class="common_input booking_reference_field_input" id="booking_reference_field_input" name="booking_reference_field_input[]" />
                </div>
              </div>
            </div>
          </div>

          <div class="show_on_click_add_another_passenger">


          </div>

          <div class="common_row">
            <div class="parent_div">
              <button type="button" name="button" id="add_another_passenger" class="add_another_passenger"><i class="fas fa-plus"></i> Add Another Passenger</button>
            </div>
          </div>





          <div class="common_row">
            <div class="total_button_div">
              <div class="two_button_child_div_right">
                <div class="continue_button_div">
                  <button type="button" class="continue_button pull-right" id="continue_6" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="two_button_child_div_left">
                <div class="previous_button_div">
                  <button type="button" class="previous_button pull-left" id="previous_button" name="button"><i class="fas fa-arrow-left"></i> Previous</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ...................................................................
                                  STEP 6 ENDS
        .................................................................... -->

        <!-- ...................................................................
                                  STEP 7 STARTS
        .................................................................... -->

        <div class="single_step" id="step_7" style="display:none;">
            <div class="common_row">
                <div class="form_h3">
                    <h3>Sign permission to handle claim</h3>
                </div>
                <div class="parent_div">

                  <div class="panel panel-default" style="width: 300px; margin: 0 auto">
                    <div class="panel-body center-text">

                        <div id="signArea1" >
                            <h2 class="tag-ingo text-center">Put Signature</h2>
                            <div class="sig sigWrapper" style="height:auto;">
                                <div class="typed"></div>
                                <canvas class="sign-pad" id="sign-pad1" width="300" height="100"></canvas>
                                {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                                <input type="hidden" id="sig-1" name="hidden_user_sign">
                            </div>
                        </div>
                      {{-- <button type="button" class="btn btn-sm btn-success" id="signature_clear">Clear</button> --}}
                      {{-- <button id="btnSaveSign" type="button" class="btn btn-xs btn-success" style="margin-top: 2px">Save Signature</button> --}}
                    </div>
                  </div>

                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="is_signed_permission" id="no-use"> <span class="label-text">Write your signature below as it appears on your ID. It's required by airlines to collect the compensation for you. By signing you agree with
                                the  <a  style="font-weight: bold; color: #124478;" target="_blank"  href="{{URL::to('/terms-and-conditions')}}">Terms and Conditions</a> and <a  style="font-weight: bold; color: #124478;" target="_blank"  href="{{URL::to('/pricing-list')}}">Price List</a></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button pull-right" id="continue_7" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <div class="two_button_child_div_left">
                        <div class="previous_button_div">
                            <button type="button" class="previous_button pull-left" id="previous_button" name="button"><i class="fas fa-arrow-left"></i> Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ...................................................................
                                  STEP 7 ENDS
        .................................................................... -->
        <!-- ...................................................................
                                  STEP 8 STARTS
        .................................................................... -->

        <div class="single_step" id="step_8" style="display:none;">
            <div class="common_row">
                <div class="form_h3">
                    <h3>Optional: Additional information</h3>
                </div>
                {{-- <div class="form_h4">
                    <h4>If we gather more information, we can handle your claim faster.</h4>
                </div> --}}
                <div class="label_field only_label_without_input">
                  <label>IF WE GATHER MORE INFORMATION, WE CAN HANDLE YOUR CLAIM FASTER.</label>
                  <label>Where did you hear about Claim’N Win?</label>
                </div>
                <div class="select_reason_class">
                    <select class="form-control custom_select" class="hear_from_where" name="here_from_where">
                        <option hidden>Open this select menu</option>
                        <option value="Google">Google</option>
                        <option value="Friends">Friends</option>
                        <option value="Social media">Social media</option>
                        <option value="Tv">Tv</option>
                        <option value="Article or blog">Article or blog</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>

            <div class="common_row">
                {{-- <div class="form_h4">
                    <h4>Have you contacted the airline regarding this claim?</h4>
                </div> --}}
                <div class="label_field only_label_without_input">
                  <label>HAVE YOU CONTACTED THE AIRLINE REGARDING THIS CLAIM?</label>
                </div>
                <div class="parent_div">
                    <div class="two_child_radio_div first_child">
                        <label class="container_radio">Yes
                            <input class="common_input" type="radio" id="common_input is_contacted_airline_yes" name="is_contacted_airline" value="1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="two_child_radio_div">
                        <label class="container_radio">No
                            <input class="common_input" type="radio" id="common_input is_contacted_airline_no" name="is_contacted_airline" value="0">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="common_row show_if_contacted_airline">
                <div class="parent_div">
                    <div class="form_h4">
                        <h4>Please upload all previous correspondence</h4>
                    </div>
                    <div class="form-group">
                        <input type="file" name="file_name[4]" class="form-control-file" id="exampleFormControlFile1">
                        <input type="hidden" value="Previous correspondence" name="file_name_to_show[4]">
                    </div>
                </div>
            </div>


            <div class="common_row">
                <div class="form_h3">
                    <h3>Tell us what happened</h3>
                </div>
                {{-- <div class="form_h4">
                    <h4>Please provide any information that may help us process your claim quickly.</h4>
                </div> --}}
                <div class="label_field only_label_without_input">
                  <label>PLEASE PROVIDE ANY INFORMATION THAT MAY HELP US PROCESS YOUR CLAIM QUICKLY.</label>
                </div>
                <div class="parent_div">
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="comment" name="what_happened" placeholder="Additional Information"></textarea>
                    </div>
                </div>
            </div>

            <div class="common_row">
                <div class="document_submit_div">
                    <div class="row">
                        <div class="col-md-6 padding_bottom">ID copies, including travel companions’ if applicable</div>
                        <div class="col-md-6">
                            <div class="input-file-container col-centered">
                                <input class="input-file" id="my-file-0" type="file" name="file_name[0]">
                                <input type="hidden" value="ID copies" name="file_name_to_show[0]">
                                <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-0">Select a file...</label>
                            </div>
                            <p class="file-return" id="file-return-0"></p>
                        </div>
                    </div>
                </div>
                <div class="document_submit_div">
                    <div class="row">
                        <div class="col-md-6 padding_bottom">Travel documents (reservation, ticket or boarding passes)</div>
                        <div class="col-md-6">
                            <div class="input-file-container col-centered">
                                <input class="input-file" id="my-file-1" type="file" name="file_name[1]">
                                <input type="hidden" value="Travel documents" name="file_name_to_show[1]">
                                <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-1">Select a file...</label>
                            </div>
                            <p class="file-return" id="file-return-1"></p>
                        </div>
                    </div>
                </div>
                <div class="document_submit_div">
                    <div class="row">
                        <div class="col-md-6 padding_bottom">Proof of expenses (store/online receipts, detailed bank statements) if applicable</div>
                        <div class="col-md-6">
                            <div class="input-file-container col-centered">
                                <input class="input-file" id="my-file-2" type="file" name="file_name[2]">
                                <input type="hidden" value="Proof of expenses" name="file_name_to_show[2]">
                                <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-2">Select a file...</label>
                            </div>
                            <p class="file-return" id="file-return-2"></p>
                        </div>
                    </div>
                </div>
                <div class="document_submit_div">
                    <div class="row">
                        <div class="col-md-6 padding_bottom">Other</div>
                        <div class="col-md-6">
                            <div class="input-file-container col-centered">
                                <input class="input-file" id="my-file-3" type="file" name="file_name[3]">
                                <input type="hidden" value="Other" name="file_name_to_show[3]">
                                <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-3">Select a file...</label>
                            </div>
                            <p class="file-return" id="file-return-3"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button pull-right" id="continue_8" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <div class="two_button_child_div_left">
                        <div class="previous_button_div">
                            <button type="button" class="previous_button pull-left" id="previous_button" name="button"><i class="fas fa-arrow-left"></i> Previous</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <input type="hidden" name="claim_table_type" value="flight_delay">
        <!-- ...................................................................
                                  STEP 8 ENDS
        .................................................................... -->
    </form>
</div>
                </div>
              </div>
          </div>
      </div>
  </div>

@endsection


@section('footer-script')
<script type="text/javascript">
      var ajax_cal_url = "{{url('/ajax/calculate/fight_delay_calculation')}}";
      var currency_converter_url = "{{url('/ajax/currency_converter_url')}}";
      auto_airport_complete();
      function auto_airport_complete(){
        $('.auto_airport_complete').autoComplete({
            minChars: 3,
            source: function(term, suggest){
                term = term.toLowerCase();
                var choices = {!! $airport_object !!};
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            },
            renderItem: function (item, search){
                search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                return '<div class="autocomplete-suggestion" data-langname="'+item[0]+'" data-lang="'+item[1]+'" data-val="'+search+'"> '+item[0].replace(re, "<b>$1</b>")+'</div>';
            },
            onSelect: function(e, term, item){
                // console.log('Item "'+item.data('langname')+' ('+item.data('lang')+')" selected by '+(e.type == 'keydown' ? 'pressing enter or tab' : 'mouse click')+'.');
                $(':focus').val(item.data('langname')+' ('+item.data('lang')+')').attr('iata-code',item.data('lang'));
                $(':focus').blur();
            }
        });
      }
      auto_airline_complete();
      function auto_airline_complete(){
        $('.auto_airline_complete').autoComplete({
            minChars: 3,
            source: function(term, suggest){
                term = term.toLowerCase();
                var choices = {!! $airline_object !!};
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            },
            renderItem: function (item, search){
                search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                return '<div class="autocomplete-suggestion" data-langname="'+item[0]+'" data-lang="'+item[1]+'" data-val="'+search+'"> '+item[0].replace(re, "<b>$1</b>")+'</div>';
            },
            onSelect: function(e, term, item){
                $(':focus').val(item.data('langname')).attr('iata_code',item.data('lang'));
                $(':focus').blur();
            }
        });
      }

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="{{('front_asset/claim/flight_delay/js/custom.js')}}"></script>

<script>
function loadingOut(loading) {
				setTimeout(() => loading.out(), 2000);
			}

function horizontalCustomStyle() {

      var loading = new Loading({
        title: ' Please wait',
        direction: 'hor',
        discription: 'Calculating...',
          defaultApply: 	true,
      });

      loadingOut(loading);
    }
$(document).ready(function() {
        $('#signArea1').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
        });

    $(document).ready(function(e){


        $("#no-use").click(function(){

            html2canvas([document.getElementById('sign-pad1')], {
                onrendered: function (canvas) {
                    var canvas_img_data = canvas.toDataURL('image/png');
                    var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                    console.log(img_data);
                    $("#sig-1").val(img_data);
                }
            });

        });

    });
    </script>

    <script src="{{asset('signature/js/numeric-1.2.6.min.js')}}"></script>
    <script src="{{asset('signature/js/bezier.js')}}"></script>
    <script src="{{asset('signature/js/jquery.signaturepad.js')}}"></script>

    <script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
    <script src="{{asset('signature/js/json2.min.js')}}"></script>

@endsection
