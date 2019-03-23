@extends('layouts.front_layout')

@section('header-script')
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('front_asset/') }}/claim/flight_delay/css/main.css">
<!--===============================================================================================-->
@endsection

@section('content')
  <div class="wrapper">
    <div class="form_h2">
      <h2 class="text-center">Flight Delay</h2>
    </div>
      <form action="">
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
                  <input type="text" class="common_input departed_from" id="common_input departed_from" name="departed_from" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="final_destination">FINAL DESTINATION: </label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input final_destination" id="common_input final_destination" name="final_destination" placeholder="e.g. London or LHR">
                </div>
              </div>
            </div>
          </div>

          <div class="common_row">
            <div class="form_h3">
              <h3>Were any other airports involved in this trip?</h3>
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
                  <input class="common_input" type="radio" id="common_input is_direct_flight_no" name="is_direct_flight" value="is_direct_flight_no">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="common_row" id="connection_div">
            <div class="form_h3">
              <h3>What airports were involved?</h3>
            </div>
            <div class="parent_div">
              <div class="child_div">
                <input type="text" class="common_input connection" id="common_input connection" name="connection[]" placeholder="e.g. London or LHR">
              </div>
              <div class="property" id="property">

              </div>
            </div>
            <div class="parent_div">
              <button type="button" name="button" id="add_connection" class="add_connection" ><i class="fas fa-plus"></i></button>
            </div>
          </div>

          {{-- <div class="common_row">
            <div class="form_h3">
              <h3>Select the flight that didn’t go as planned</h3>
            </div>
            <div class="form_h4">
              <h4>If your flight was disrupted several times, select <span class="form_h4_span">the first segment in which the disruption occurred.</span></h4>
            </div>
            <div class="parent_div">
              <div class="single_child_radio_div">
                <label class="container_radio">New York (JFK)<i class="fas fa-plane"></i>London (LHR)
                  <input type="radio" class="common_input" id="common_input selected_connection_id" name="selected_connection_id" value="1">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div> --}}




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

          {{-- <div class="common_row show_if_flight_did_not_go_planned">
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
          </div> --}}
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

          <div class="common_row">
            <div class="parent_div">
              <div class="single_child_div">
                <div class="arrival_to_destination_text_div">
                  <span class="arrival_to_destination_text_span">New Chitose Airport, Sapporo (CTS)<i class="fas fa-plane"></i>New Chitose Airport, Sapporo (CTS)</span>
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="single_child_div">
                <div class="left_div">
                  <div class="label_field">
                    <label for="airline">AIRLINE</label>
                  </div>
                  <div class="input_field">
                    <input type="text" class="common_input airline" id="common_input airline" name="airline[]" placeholder="e.g. New York or JFK">
                  </div>
                </div>
                <div class="right_div">
                  <div class="flight_number_div">
                    <div class="label_field">
                      <label for="departure_airport">FLIGHT NO.</label>
                    </div>
                    <div class="two_input_field">
                      <div class="child_two_input_field_left">
                        <div class="input_field">
                          <input type="text" class="common_input flight_code" id="common_input flight_code" name="flight_code[]" placeholder="">
                        </div>
                      </div>
                      <div class="child_two_input_field_right">
                        <div class="input_field">
                          <input type="text" class="common_input flight_number" id="common_input flight_number" name="flight_number[]" placeholder="1234">
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="departure_date_div">
                    <div class="label_field">
                      <label for="departure_airport">DEPARTURE DATE</label>
                    </div>
                    <div class="two_input_field">
                      <div class="input_field">
                        <input type="text" class="common_input departure_airport date" id="common_input departure_airport date" name="departure_date[]" placeholder="e.g. New York or JFK">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- <div class="common_row">
            <div class="parent_div">
              <div class="single_child_div">
                <div class="arrival_to_destination_text_div">
                  <span class="arrival_to_destination_text_span">New Chitose Airport, Sapporo (CTS)<i class="fas fa-plane"></i>New Chitose Airport, Sapporo (CTS)</span>
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="single_child_div">
                <div class="left_div">
                  <div class="label_field">
                    <label for="departure_airport">AIRLINE</label>
                  </div>
                  <div class="input_field">
                    <input type="text" class="common_input departure_airport" id="common_input departure_airport" placeholder="e.g. New York or JFK">
                  </div>
                </div>
                <div class="right_div">
                  <div class="flight_number_div">
                    <div class="label_field">
                      <label for="departure_airport">FLIGHT NO.</label>
                    </div>
                    <div class="two_input_field">
                      <div class="child_two_input_field_left">
                        <div class="input_field">
                          <input type="text" class="common_input flight_code" id="common_input flight_code" placeholder="">
                        </div>
                      </div>
                      <div class="child_two_input_field_right">
                        <div class="input_field">
                          <input type="text" class="common_input flight_number" id="common_input flight_number" placeholder="1234">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="departure_date_div">
                    <div class="label_field">
                      <label for="departure_airport">DEPARTURE DATE</label>
                    </div>
                    <div class="two_input_field">
                      <div class="input_field">
                        <input type="text" class="common_input departure_airport date" id="common_input departure_airport date" name="date" placeholder="e.g. New York or JFK">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

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
          {{-- <div class="common_row">
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
          </div> --}}

          {{-- <div class="common_row show_on_is_rerouted_no">
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
          </div> --}}

          {{-- <div class="common_row show_on_is_obtained_full_reimbursement_no">
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
                      <option value="1">EUR</option>
                      <option value="2">USD</option>
                      <option value="3">ILS</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

          {{-- <div class="common_row show_on_is_obtained_full_reimbursement_no">
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
          </div> --}}

          {{-- <div class="common_row show_on_is_paid_for_rerouting_yes">
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
                      <option value="1">EUR</option>
                      <option value="2">USD</option>
                      <option value="3">ILS</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

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
                    <input type="radio" class="common_input" id="common_input not_spend" name="is_spend_on_accomodation" value="not_spend">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="child_accommodation child_accommodation_second_div">
                  <label class="container_radio label_child_accommodation">I had expenses but I have not kept the invoices
                    <input type="radio" class="common_input" id="common_input no_invoice" name="is_spend_on_accomodation" value="no_invoice">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="child_accommodation child_accommodation_third_div">
                  <label class="container_radio label_child_accommodation">I had expenses and kept the invoices
                    <input type="radio" class="common_input" id="common_input has_invoice" name="is_spend_on_accomodation" value="has_invoice">
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
                                  <option value="1">EUR</option>
                                  <option value="2">USD</option>
                                  <option value="3">ILS</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="group">
                            <input id="is_receipt_accommodation_yes" name="is_receipt_accommodation" type="radio" value="Yes" checked="checked">
                            <label class="label" for="is_receipt_accommodation_yes">Yes</label>
                            <input id="is_receipt_accommodation_no" name="is_receipt_accommodation" type="radio" value="No" >
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
                                  <option value="1">EUR</option>
                                  <option value="2">USD</option>
                                  <option value="3">ILS</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group yes_no_center">
                            <div class="group">
                              <input id="is_receipt_transportation_yes" name="is_receipt_transportation" type="radio" value="Yes" checked="checked">
                              <label class="label" for="is_receipt_transportation_yes">Yes</label>
                              <input id="is_receipt_transportation_no" name="is_receipt_transportation" type="radio" value="No" >
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
                                  <option value="1">EUR</option>
                                  <option value="2">USD</option>
                                  <option value="3">ILS</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group yes_no_center">
                            <div class="group">
                              <input id="is_receipt_food_yes" name="is_receipt_food" type="radio" value="Yes" checked="checked">
                              <label class="label" for="is_receipt_food_yes">Yes</label>
                              <input id="is_receipt_food_no" name="is_receipt_food" type="radio" value="No" >
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
                                  <option value="1">EUR</option>
                                  <option value="2">USD</option>
                                  <option value="3">ILS</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group yes_no_center">
                            <div class="group">
                              <input id="is_receipt_others_yes" name="is_receipt_others" type="radio" value="Yes" checked="checked">
                              <label class="label" for="is_receipt_others_yes">Yes</label>
                              <input id="is_receipt_others_no" name="is_receipt_others" type="radio" value="No" >
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
                                <option value="1">EUR</option>
                                <option value="2">USD</option>
                                <option value="3">ILS</option>
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
                          <input id="is_receipt_accommodation_yes_mobile" name="is_receipt_accommodation_mobile" type="radio" value="Yes" checked="checked">
                          <label class="label" for="is_receipt_accommodation_yes_mobile">Yes</label>
                          <input id="is_receipt_accommodation_no_mobile" name="is_receipt_accommodation_mobile" type="radio" value="No" >
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
                                <option value="1">EUR</option>
                                <option value="2">USD</option>
                                <option value="3">ILS</option>
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
                            <input id="is_receipt_transportation_yes_mobile" name="is_receipt_transportation_mobile" type="radio" value="Yes" checked="checked">
                            <label class="label" for="is_receipt_transportation_yes_mobile">Yes</label>
                            <input id="is_receipt_transportation_no_mobile" name="is_receipt_transportation_mobile" type="radio" value="No" >
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
                                <option value="1">EUR</option>
                                <option value="2">USD</option>
                                <option value="3">ILS</option>
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
                            <input id="is_receipt_food_yes_mobile" name="is_receipt_food_mobile" type="radio" value="Yes" checked="checked">
                            <label class="label" for="is_receipt_food_yes_mobile">Yes</label>
                            <input id="is_receipt_food_no_mobile" name="is_receipt_food_mobile" type="radio" value="No" >
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
                                <option value="1">EUR</option>
                                <option value="2">USD</option>
                                <option value="3">ILS</option>
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
                            <input id="is_receipt_others_yes_mobile" name="is_receipt_others_mobile" type="radio" value="Yes" checked="checked">
                            <label class="label" for="is_receipt_others_yes_mobile">Yes</label>
                            <input id="is_receipt_others_no_mobile" name="is_receipt_others_mobile" type="radio" value="No" >
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
                  <input type="text" class="common_input email_address" id="common_input email_address" name="email_address" placeholder="e.g. New York or JFK">
                </div>
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
                  <input class="common_input passenger_is_booking_checkbox" type="radio" count="1" id="common_input is_booking_reference_yes" name="is_booking_reference" value="is_booking_reference_yes">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="two_child_radio_div">
                <label class="container_radio">Later
                  <input class="common_input passenger_is_booking_checkbox" type="radio" count="1" id="common_input is_booking_reference_no" name="is_booking_reference" value="is_booking_reference_no">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="parent_div show_on_is_booking_reference_yes_1" style="display:none">
              <div class="add_booking_reference_div" id="add_booking_reference_div_1">
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
              <select class="form-control custom_select" class="hear_from_where">
                <option hidden>Open this select menu</option>
                <option value="1">Google</option>
                <option value="2">Friends</option>
                <option value="3">Social media</option>
                <option value="4">Tv</option>
                <option value="5">Article or blog</option>
                <option value="6">Others</option>
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
                  <input class="common_input" type="radio" id="common_input is_contacted_airline_no" name="is_contacted_airline" value="2">
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
                <textarea class="form-control" rows="5" id="comment" name="text" placeholder="Additional Information"></textarea>
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

          <div class="common_row">
            <div class="total_button_div">
              <div class="two_button_child_div_left">
                <div class="continue_button_div">
                  <button type="button" class="continue_button" id="continue_8" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <script src="{{('front_asset/claim/flight_delay/js/custom.js')}}"></script>
  {{-- <script>
    $(document).ready(function() {
      var date_input = $('.date'); //our date input has the name "date"
      var options = {
        format: 'mm/dd/yyyy',
        endDate: '+0d',
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script> --}}
@endsection
