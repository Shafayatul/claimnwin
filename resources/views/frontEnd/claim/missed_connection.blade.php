@extends('layouts.front_layout')

@section('header-script')
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('front_asset/') }}/claim/missed_connection/css/main.css">
<!--===============================================================================================-->
@endsection

@section('content')
  <div class="wrapper">
    <div class="form_h2">
      <h2 class="text-center">Missed Connection</h2>
    </div>
      <form action="{{url('/claim')}}" method="post">
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
                  <input type="text" class="auto_airport_complete common_input departed_from" id="advanced-demo common_input departed_from" name="departed_from" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="final_destination">FINAL DESTINATION: </label>
                </div>
                <div class="input_field">
                  <input type="text" class="auto_airport_complete common_input final_destination" id="common_input final_destination" name="final_destination" placeholder="e.g. London or LHR">
                </div>
              </div>
            </div>
          </div>

          <div class="common_row">
            <div class="form_h3">
              <h3>Where did you fly?</h3>
            </div>
            <div class="form_h4">
              <h4>If your trip was not a direct flight, let us know.</h4>
            </div>
            <div class="parent_div">
              <div class="two_child_radio_div first_child">
                <label class="container_radio">Yes
                  <input class="common_input" type="radio" id="common_input is_direct_flight_yes" name="is_direct_flight" value="is_direct_flight_yes">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="two_child_radio_div">
                <label class="container_radio">No
                  <input class="common_input" type="radio" id="common_input is_direct_flight_no" name="is_direct_flight" value="is_direct_flight_no" checked>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="common_row" id="connection_div">
            <div class="form_h3">
              <h3>Where did you have connections?</h3>
            </div>
            <div class="parent_div">
              <div class="child_div">
                <input type="text" class="auto_airport_complete common_input connection" id="common_input connection" name="connection[]" placeholder="e.g. London or LHR">
              </div>
              <div class="property" id="property">

              </div>
            </div>
            <div class="parent_div">
              <button type="button" name="button" id="add_connection" class="add_connection" ><i class="fas fa-plus"></i></button>
            </div>
          </div>

          <div class="common_row">
            <div class="form_h3">
              <h3>Select the flight that didn’t go as planned</h3>
            </div>
            <div class="form_h4">
              <h4>If your flight was disrupted several times, select <span class="form_h4_span">the first segment in which the disruption occurred.</span></h4>
            </div>
            <div class="parent_div parent_div_check_list">
              {{-- <div class="single_child_radio_div">
                <label class="container_radio">New York (JFK)<i class="fas fa-plane"></i>London (LHR)
                  <input type="radio" class="common_input" id="common_input selected_connection_id" name="selected_connection_id" value="1">
                  <span class="checkmark"></span>
                </label>
              </div> --}}
            </div>
          </div>




          {{-- <div class="common_row">
            <div class="parent_div">
              <div class="total_info_div">
                <div class="no_risk_child_div info_icon">
                  <i class="fas fa-info-circle"></i>
                </div>
                <div class="no_risk_child_div info_text">
                  No risk. Submitting a claim is absolutely <span class="free_of_charge">free of charge.</span>
                </div>
              </div>
            </div>
          </div> --}}

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

          <div class="common_row {{-- show_if_flight_did_not_go_planned --}}">
            <div class="parent_div">
              <div class="form_h3">
                <h3>What happened to the flight?</h3>
              </div>
              <div class="form_h4">
                <h4>Select below what happened to your flight to get the compensation.</h4>
              </div>
            </div>
            <div class="parent_div">
              <div class="airports_involved">
                <label class="container_radio">Delayed flight
                  <input type="radio" class="common_input" id="common_input delayed_flight" name="what_happened_to_the_flight" value="delayed_flight">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="airports_involved">
                <label class="container_radio">Canceled flight
                  <input type="radio" class="common_input" id="common_input canceled_flight" name="what_happened_to_the_flight" value="canceled_flight">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="airports_involved">
                <label class="container_radio">Denied boarding
                  <input type="radio" class="common_input" id="common_input denied_boarding" name="what_happened_to_the_flight" value="denied_boarding">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="common_row show_on_what_happened_to_the_flight_selected">
            <div class="parent_div">
              <div class="form_h3">
                <h3>What was the total delay once you arrived at Tel Aviv-Yafo (TLV)?</h3>
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

          {{-- <div class="common_row show_on_canceled_flight">
            <div class="parent_div">
              <div class="form_h3">
                <h3>What happened to the flight?</h3>
              </div>
            </div>
            <div class="parent_div">
              <div class="total_delay_flight_2">
                <label class="container_radio">Less than 3 hours
                  <input type="radio" class="common_input" id="common_input total_delay_radio" name="total_delay_radio" value="1">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="total_delay_flight_2">
                <label class="container_radio">3-8 hours
                  <input type="radio" class="common_input" id="common_input total_delay_radio" name="total_delay_radio" value="2">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="total_delay_flight_2">
                <label class="container_radio">more than 8 hours
                  <input type="radio" class="common_input" id="common_input total_delay_radio" name="total_delay_radio" value="3">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="total_delay_flight_2">
                <label class="container_radio">Never arrived
                  <input type="radio" class="common_input" id="common_input total_delay_radio" name="total_delay_radio" value="4">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="total_delay_flight_2">
                <label class="container_radio">Never arrived
                  <input type="radio" class="common_input" id="common_input total_delay_radio" name="total_delay_radio" value="4">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div> --}}

          <div class="common_row show_on_total_delay_selected">
            <div class="parent_div">
              <div class="form_h3">
                <h3>What did the airline say was the reason?</h3>
              </div>
            </div>
            <div class="parent_div">
              <div class="airline_reason_select_div">
                <select class="form-control custom_select reason" name="reason">
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
              <div class="two_button_child_div_left">
                <div class="continue_button_div">
                  <button type="button" class="continue_button" id="continue_2" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="two_button_child_div_right">
                <div class="previous_button_div">
                  <button type="button" class="previous_button pull-left" id="previous_button" name="button">Previous <i class="fas fa-arrow-left"></i></button>
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
          <div class="parent_div">
            <div class="form_h3">
              <h3>Itinerary details for your disrupted flight</h3>
            </div>
            <div class="form_h4">
              <h4>Please give us the full itinerary so we can make sure we claim for the full amount.</h4>
            </div>
          </div>

          <div class="itinerary_flight_element">
            {{-- code from JS --}}
          </div>


          <div class="common_row">
            <div class="total_button_div">
              <div class="two_button_child_div_left">
                <div class="continue_button_div">
                  <button type="button" class="continue_button" id="continue_3" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="two_button_child_div_right">
                <div class="previous_button_div">
                  <button type="button" class="previous_button pull-left" id="previous_button" name="button">Previous <i class="fas fa-arrow-left"></i></button>
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
          <div class="common_row">
            <div class="form_h4">
              <h4>Were you rerouted to your final destination?</h4>
            </div>
            <div class="parent_div">
              <div class="two_child_radio_div first_child">
                <label class="container_radio">Yes
                  <input class="common_input" type="radio" id="common_input is_rerouted_yes" name="is_rerouted" value="is_rerouted_yes">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="two_child_radio_div">
                <label class="container_radio">No
                  <input class="common_input" type="radio" id="common_input is_rerouted_no" name="is_rerouted" value="is_rerouted_no">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="common_row show_on_is_rerouted_no">
            <div class="parent_div">
              <div class="form_h4">
                <h4>Did you obtain a full reimbursement of your original ticket?</h4>
              </div>
              <div class="two_child_radio_div first_child">
                <label class="container_radio">Yes
                  <input class="common_input" type="radio" id="common_input is_obtained_full_reimbursement_yes" name="is_obtained_full_reimbursement" value="is_obtained_full_reimbursement_yes">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="two_child_radio_div">
                <label class="container_radio">No
                  <input class="common_input" type="radio" id="common_input is_obtained_full_reimbursement_no" name="is_obtained_full_reimbursement" value="is_obtained_full_reimbursement_no">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="common_row show_on_is_obtained_full_reimbursement_no">
            <div class="form_h4">
              <h4>Tell us the price of the original ticket</h4>
            </div>
            <div class="parent_div">
              <div class="price_currency_div">
                <div class="child_price_currency_div">
                  <input type="text" class="common_input ticket_price" id="common_input ticket_price_original_ticket" name="ticket_price_original_ticket" placeholder="Ex. 1234">
                </div>
                <div class="child_price_currency_div">
                  <div class="select_reason_class">
                    <select class="form-control custom_select" name="ticket_currency_original_ticket">
                      <option hidden>Select currency</option>
                      @foreach($currencies as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="common_row show_on_is_obtained_full_reimbursement_no">
            <div class="parent_div">
              <div class="form_h4">
                <h4>Did you pay for your re-routing flight?</h4>
              </div>
              <div class="two_child_radio_div first_child">
                <label class="container_radio">Yes
                  <input class="common_input" type="radio" id="common_input is_paid_for_rerouting_yes" name="is_paid_for_rerouting" value="is_paid_for_rerouting_yes">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="two_child_radio_div">
                <label class="container_radio">No
                  <input class="common_input" type="radio" id="common_input is_paid_for_rerouting_no" name="is_paid_for_rerouting" value="is_paid_for_rerouting_no">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="common_row show_on_is_paid_for_rerouting_yes">
            <div class="form_h4">
              <h4>Tell us the price of the re-routing ticket for all passengersTell us the price of the original ticket</h4>
            </div>
            <div class="parent_div">
              <div class="price_currency_div">
                <div class="child_price_currency_div">
                  <input type="text" class="common_input ticket_price" id="common_input ticket_price_rerouting" name="ticket_price_rerouting" placeholder="Ex. 1234">
                </div>
                <div class="child_price_currency_div">
                  <div class="select_reason_class">
                    <select class="form-control custom_select" name="ticket_currency_rerouting">
                      <option hidden>Currency</option>
                      @foreach($currencies as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="accommodation">
            <div class="common_row">
              <div class="parent_div">
                <div class="form_h4">
                  <h4>Optional: Did you spend on accommodation, food or taxi while waiting for your rerouting flight?</h4>
                </div>
              </div>
              <div class="parent_div">
                <div class="child_accommodation child_accommodation_first_div">
                  <label class="container_radio label_child_accommodation">I did not spend anything
                    <input type="radio" class="common_input" id="common_input not_spend" name="is_spend_on_accommodation" value="I did not spend anything">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="child_accommodation child_accommodation_second_div">
                  <label class="container_radio label_child_accommodation">I had expenses but I have not kept the invoices
                    <input type="radio" class="common_input" id="common_input no_invoice" name="is_spend_on_accommodation" value="I had expenses but I have not kept the invoices">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="child_accommodation child_accommodation_third_div">
                  <label class="container_radio label_child_accommodation">I had expenses and kept the invoices
                    <input type="radio" class="common_input" id="common_input has_invoice" name="is_spend_on_accommodation" value="I had expenses and kept the invoices">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
            </div>

            <div class="common_row table_show_on_large_screen">
              <div class="parent_div">
                <div class="form_h4 text-center">
                  <h4>Tell us about your expenses.</h4>
                </div>
              </div>
              <div class="parent_div">
                <div class="table_field">
                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th scope="col">Expense</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Receipt</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="align-baseline">Accommodation
                          <input type="hidden" value="accommodation" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                        </td>
                        <td>
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6">
                              <div class="select_reason_class">
                                <select class="form-control custom_select" name="expense_currency[]">
                                  <option hidden>Currency</option>
                                  @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="group">
                            <input id="is_receipt_accommodation_yes" name="expense_is_receipt[0]" type="radio" value="Yes" checked="checked">
                            <label class="label" for="is_receipt_accommodation_yes">Yes</label>
                            <input id="is_receipt_accommodation_no" name="expense_is_receipt[0]" type="radio" value="No" >
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
                            <div class="col-md-6">
                              <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6">
                              <div class="select_reason_class">
                                <select class="form-control custom_select" name="expense_currency[]">
                                  <option hidden>Currency</option>
                                  @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group yes_no_center">
                            <div class="group">
                              <input id="is_receipt_transportation_yes" name="expense_is_receipt[1]" type="radio" value="Yes" checked="checked">
                              <label class="label" for="is_receipt_transportation_yes">Yes</label>
                              <input id="is_receipt_transportation_no" name="expense_is_receipt[1]" type="radio" value="No" >
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
                            <div class="col-md-6">
                              <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6">
                              <div class="select_reason_class">
                                <select class="form-control custom_select" name="expense_currency[]">
                                  <option hidden>Currency</option>
                                  @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group yes_no_center">
                            <div class="group">
                              <input id="is_receipt_food_yes" name="expense_is_receipt[2]" type="radio" value="Yes" checked="checked">
                              <label class="label" for="is_receipt_food_yes">Yes</label>
                              <input id="is_receipt_food_no" name="expense_is_receipt[2]" type="radio" value="No" >
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
                            <div class="col-md-6">
                              <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6">
                              <div class="select_reason_class">
                                <select class="form-control custom_select" name="expense_currency[]">
                                  <option hidden>Currency</option>
                                  @foreach($currencies as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group yes_no_center">
                            <div class="group">
                              <input id="is_receipt_others_yes" name="expense_is_receipt[3]" type="radio" value="Yes" checked="checked">
                              <label class="label" for="is_receipt_others_yes">Yes</label>
                              <input id="is_receipt_others_no" name="expense_is_receipt[3]" type="radio" value="No" >
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
                <div class="form_h4 text-center">
                  <h4>Tell us about your expenses.</h4>
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
                            <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select" name="expense_currency[]">
                                <option hidden>Currency</option>
                                @foreach($currencies as $key => $val)
                                  <option value="{{$key}}">{{$val}}</option>
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
                          <input id="is_receipt_accommodation_yes_mobile" name="expense_is_receipt[0]" type="radio" value="Yes" checked="checked">
                          <label class="label" for="is_receipt_accommodation_yes_mobile">Yes</label>
                          <input id="is_receipt_accommodation_no_mobile" name="expense_is_receipt[0]" type="radio" value="No" >
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
                            <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select" name="expense_currency[]">
                                <option hidden>Currency</option>
                                @foreach($currencies as $key => $val)
                                  <option value="{{$key}}">{{$val}}</option>
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
                            <input id="is_receipt_transportation_yes_mobile" name="expense_is_receipt[1]" type="radio" value="Yes" checked="checked">
                            <label class="label" for="is_receipt_transportation_yes_mobile">Yes</label>
                            <input id="is_receipt_transportation_no_mobile" name="expense_is_receipt[1]" type="radio" value="No" >
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
                            <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select" name="expense_currency[]">
                                <option hidden>Currency</option>
                                @foreach($currencies as $key => $val)
                                  <option value="{{$key}}">{{$val}}</option>
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
                            <input id="is_receipt_food_yes_mobile" name="expense_is_receipt[2]" type="radio" value="Yes" checked="checked">
                            <label class="label" for="is_receipt_food_yes_mobile">Yes</label>
                            <input id="is_receipt_food_no_mobile" name="expense_is_receipt[2]" type="radio" value="No" >
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
                            <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select" name="expense_currency[]">
                                <option hidden>Currency</option>
                                @foreach($currencies as $key => $val)
                                  <option value="{{$key}}">{{$val}}</option>
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
                            <input id="is_receipt_others_yes_mobile" name="expense_is_receipt[3]" type="radio" value="Yes" checked="checked">
                            <label class="label" for="is_receipt_others_yes_mobile">Yes</label>
                            <input id="is_receipt_others_no_mobile" name="expense_is_receipt[3]" type="radio" value="No" >
                            <label class="center label" for="is_receipt_others_no_mobile">No</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

          </div>

          <div class="common_row">
            <div class="email_div">
              <div class="label_field">
                <label for="email_address">Please enter your email address</label>
              </div>
              <div class="input_field">
                <input type="text" class="common_input email_address" id="common_input email_address" name="email_address" placeholder="e.g. New York or JFK">
              </div>
            </div>
          </div>

          <div class="common_row">
            <div class="total_button_div">
              <div class="two_button_child_div_left">
                <div class="continue_button_div">
                  <button type="button" class="continue_button" id="continue_4" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="two_button_child_div_right">
                <div class="previous_button_div">
                  <button type="button" class="previous_button pull-left" id="previous_button" name="button">Previous <i class="fas fa-arrow-left"></i></button>
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
            <div class="form_h3 text-center">
              <h3>CONGRATULATIONS!!!</h3>
            </div>
            <div class="form_show_message_paragraph">
              <p>
                Unfortunately, this flight is not eligible for compensation.
                Your claim details do not meet the criteria of Israeli or EU law to be compensated. Eligibility is calculated according the length of delay, air carriers and routes you have travelled on.
                (or)Congratulations! you are eligible for compensation. Your claim amount will be up to (work out compensation amount according to calculator. Show on screen the amount in the currency converted according to passengers IP) per
                passenger!

              </p>
            </div>
          </div>

          <div class="common_row">
            <div class="total_button_div">
              <div class="two_button_child_div_left">
                <div class="continue_button_div">
                  <button type="button" class="continue_button" id="continue_5" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="two_button_child_div_right">
                <div class="previous_button_div">
                  <button type="button" class="previous_button pull-left" id="previous_button" name="button">Previous <i class="fas fa-arrow-left"></i></button>
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
                  <input type="text" class="common_input first_name" id="common_input first_name" name="first_name[]" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="last_name">LAST NAME</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input last_name" id="common_input last_name" name="last_name[]" placeholder="e.g. London or LHR">
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="address">ADDRESS</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input address" id="common_input address" name="address[]" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="post_code">POST CODE</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input post_code" id="common_input post_code" name="post_code[]" placeholder="e.g. London or LHR">
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="date_of_birth">DATE OF BIRTH</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input date_of_birth date" id="common_input date_of_birth" name="date_of_birth[]" placeholder="1/1/1990">
                </div>
              </div>
            </div>
          </div>

          <div class="common_row">
            <div class="form_h3">
              <h3>What’s your booking reference?</h3>
            </div>
            <div class="parent_div">
              <div class="two_child_radio_div first_child">
                <label class="container_radio">Yes
                  <input class="common_input passenger_is_booking_checkbox" type="radio" count="0" id="common_input is_booking_reference_yes" name="is_booking_reference[0]" value="is_booking_reference_yes">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="two_child_radio_div">
                <label class="container_radio">Later
                  <input class="common_input passenger_is_booking_checkbox" type="radio" count="0" id="common_input is_booking_reference_no" name="is_booking_reference[0]" value="is_booking_reference_no" checked>
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
              <div class="two_button_child_div_left">
                <div class="continue_button_div">
                  <button type="button" class="continue_button" id="continue_6" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="two_button_child_div_right">
                <div class="previous_button_div">
                  <button type="button" class="previous_button pull-left" id="previous_button" name="button">Previous <i class="fas fa-arrow-left"></i></button>
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
              <div class="form-check">
      					<label>
      						<input type="checkbox" name="is_signed_permission"> <span class="label-text">Write your signature below as it appears on your ID. It's required by airlines to collect the compensation for you. By signing you agree with the Assignment Form and Price List</span>
      					</label>
      				</div>
              {{-- <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Write your signature below as it appears on your ID. It's required by airlines to collect the compensation for you. By signing you agree with the Assignment Form and Price List</label>
              </div> --}}
            </div>
          </div>

          <div class="common_row">
            <div class="total_button_div">
              <div class="two_button_child_div_left">
                <div class="continue_button_div">
                  <button type="button" class="continue_button" id="continue_7" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="two_button_child_div_right">
                <div class="previous_button_div">
                  <button type="button" class="previous_button pull-left" id="previous_button" name="button">Previous <i class="fas fa-arrow-left"></i></button>
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
            <div class="form_h4">
              <h4>If we gather more information, we can handle your claim faster.</h4>
            </div>
            <div class="select_reason_class">
              <select class="form-control custom_select" class="here_from_where" name="here_from_where">
                <option hidden value="">Open this select menu</option>
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
            <div class="form_h4">
              <h4>Have you contacted the airline regarding this claim?</h4>
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
                  <input class="common_input" type="radio" id="common_input is_contacted_airline_no" name="is_contacted_airline" value="0" checked>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>

          {{-- <div class="common_row show_if_contacted_airline">
            <div class="parent_div">
              <div class="form_h4">
                <h4>Please upload all correspondence</h4>
              </div>
              <div class="form-group">
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
              </div>
            </div>
          </div> --}}

          <div class="common_row">
            <div class="form_h3">
              <h3>Tell us what happened</h3>
            </div>
            <div class="form_h4">
              <h4>Please provide any information that may help us process your claim quickly.</h4>
            </div>
            <div class="parent_div">
              <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" name="what_happened" placeholder="Additional Information"></textarea>
              </div>
            </div>
          </div>

          <div class="common_row show_if_contacted_airline">
            <div class="document_submit_div">
              <div class="row">
                <div class="col-md-8">ID copies, including travel companions’ if applicable</div>
                <div class="col-md-4">
                  <div class="input-file-container col-centered">
                    <input class="input-file" id="my-file-0" type="file" name="correspondence_ids_file">
                    <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-0">Select a file...</label>
                  </div>
                  <p class="file-return" id="file-return-0"></p>
                </div>
              </div>
            </div>
            <div class="document_submit_div">
              <div class="row">
                <div class="col-md-8">Travel documents (reservation, ticket or boarding passes)</div>
                <div class="col-md-4">
                  <div class="input-file-container col-centered">
                    <input class="input-file" id="my-file-1" type="file" name="correspondence_travel_doc_file">
                    <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-1">Select a file...</label>
                  </div>
                  <p class="file-return" id="file-return-1"></p>
                </div>
              </div>
            </div>
            <div class="document_submit_div">
              <div class="row">
                <div class="col-md-8">Proof of expenses (store/online receipts, detailed bank statements) if applicable</div>
                <div class="col-md-4">
                  <div class="input-file-container col-centered">
                    <input class="input-file" id="my-file-2" type="file" name="correspondence_proof_of_expense_file">
                    <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-2">Select a file...</label>
                  </div>
                  <p class="file-return" id="file-return-2"></p>
                </div>
              </div>
            </div>
            <div class="document_submit_div">
              <div class="row">
                <div class="col-md-8">Other</div>
                <div class="col-md-4">
                  <div class="input-file-container col-centered">
                    <input class="input-file" id="my-file-3" type="file" name="correspondence_others_file">
                    <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-3">Select a file...</label>
                  </div>
                  <p class="file-return" id="file-return-3"></p>
                </div>
              </div>
            </div>
          </div>

          <input type="type" name="claim_table_type" value="missed_connection">

          <div class="common_row">
            <div class="total_button_div">
              <div class="two_button_child_div_left">
                <div class="continue_button_div">
                  <button type="submit" class="continue_button" id="continue_8" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                </div>
              </div>
              <div class="two_button_child_div_right">
                <div class="previous_button_div">
                  <button type="button" class="previous_button pull-left" id="previous_button" name="button">Previous <i class="fas fa-arrow-left"></i></button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- ...................................................................
                                  STEP 8 ENDS
        .................................................................... -->
      </form>
    </div>

@endsection


@section('footer-script')
  <script type="text/javascript">
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
            }
        });     
      }
                           
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <script src="{{('front_asset/claim/missed_connection/js/custom.js')}}"></script>




@endsection
