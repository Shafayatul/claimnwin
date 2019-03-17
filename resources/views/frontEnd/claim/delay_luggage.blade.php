@extends('layouts.front_layout')

@section('header-script')
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('front_asset/') }}/claim/delay_luggage/css/main.css">
<!--===============================================================================================-->
@endsection

@section('content')
  <div class="wrapper">
      <form action="">
        <!-- .................................STEP 1 STARTS............................. -->
        <div class="single_step" id="step_1">

            <div class="common_row">
                <div class="form_h3">
                  <h3>Have you already written to the airline</h3>
                </div>
                <div class="parent_div">
                    <div class="two_child_radio_div first_child">
                      <label class="container_radio">Yes
                        <input class="common_input" type="radio" id="common_input already_written_airline_yes" name="already_written_airline" value="1">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="two_child_radio_div">
                      <label class="container_radio">No
                        <input class="common_input" type="radio" id="common_input already_written_airline_no" name="already_written_airline" value="2">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
              </div>

              <div class="common_row" id="written_airline_connection">
                  <div class="form_h3">
                    <h3>What date did you write to the airline?</h3>
                  </div>
                  <div class="parent_div">
                    <div class="child_div">
                      <input type="text" name="written_airline_date" class="common_input" id="common_input datepicker written_airline_date" placeholder="e.g. London or LHR">
                    </div>
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

<!-- .................................STEP 1 ENDS............................. -->

<!-- .................................STEP 2 STARTS............................. -->
        <div class="single_step" id="step_2" style="display: none;">
          <div class="common_row">
            <div class="form_h3">
              <h3>Where did you fly?</h3>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="departure_airport">DEPARTURE AIRPORT</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input departure_airport" id="common_input departure_airport" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="arrival_airport">ARRIVAL AIRPORT</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input arrival_airport" id="common_input arrival_airport" placeholder="e.g. London or LHR">
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
                  <input class="common_input" type="radio" id="common_input did_fly_radio_yes" name="did_fly_radio" value="1">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="two_child_radio_div">
                <label class="container_radio">No
                  <input class="common_input" type="radio" id="common_input did_fly_radio_no" name="did_fly_radio" value="2">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="common_row" id="connection">
            <div class="form_h3">
              <h3>Where did you have connections?</h3>
            </div>
            <div class="parent_div">
              <div class="child_div">
                <input type="text" class="common_input" id="common_input stop_airport" placeholder="e.g. London or LHR">
              </div>
              <div class="property" id="property">

              </div>
            </div>
            <div class="parent_div">
              <button type="button" name="button" id="add_connection" class="add_connection"><i class="fas fa-plus"></i></button>
            </div>
          </div>


          <div class="common_row">
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
          </div>

          <div class="parent_div">
            <div class="form_h3">
              <h3>Itinerary details for your flight on which luggage was delayed</h3>
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
                        <input type="text" class="common_input departure_airport" id="common_input departure_airport date" name="date" placeholder="e.g. New York or JFK">
                      </div>
                    </div>
                  </div>
                </div>
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





        <!-- .................................STEP 2 ENDS............................. -->

        <!-- .................................STEP 3 STARTS............................. -->

        <div class="single_step" id="step_3" style="display: none;">

          <div class="common_row">
            <div class="form_h3">
              <h3>Do you have a PIR?</h3>
            </div>
            <div class="parent_div">

                <p>A Property Irregularity Report (PIR) reference number is a unique code that helps trace your delayed or damaged baggage.
                  It has a combination of 10 letters and numbers and can be found above your name on the PIR receipt,
                   which you received at the airport upon reporting your missing baggage.
                  For help locating your PIR please contact our customer service department.
                </p>
            </div>
          </div>

          <div class="common_row">
              <div class="form_h3">
                <h3>PIR:</h3>
              </div>
              <div class="parent_div">
                  <div class="label_field">
                      <label for="departure_airport">When did you receive your luggage?</label>
                    </div>
                    <div class="two_input_field">
                      <div class="input_field">
                        <input type="text" class="common_input received_luggage_date" id="common_input received_luggage_date date" name="received_luggage_date" placeholder="e.g. New York or JFK">
                      </div>
                    </div>
              </div>
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



        <!-- .................................STEP 3 ENDS............................. -->

        <!-- .................................STEP 4 STARTS............................. -->

        <div class="single_step" id="step_4" style="display:none;">


            <div class="common_row">
              <div class="email_div">
                <div class="label_field">
                  <label for="departure_airport">Please enter your email address</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input departure_airport" id="common_input departure_airport" placeholder="e.g. New York or JFK">
                </div>
              </div>
            </div>

          <div class="common_row">
            <div class="form_h3 text-center">
              <h3>CONGRATULATIONS!!!</h3>
            </div>
            <div class="form_show_message_paragraph">
              <p>
                Congratulations! you are eligible for a refund of expenses incurred.
                 You are eligible to a refund of up to 1350 EUR (Show on screen the amount
                  in the currency converted according to passengers IP) per passenger.
              </p>
              <p>
                In the case of luggage delays, airlines are only required to refund, if proof of purchases are submitted.
              </p>
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





        <!-- .................................STEP 4 ENDS............................. -->

        <!-- ...................................................................
                                  STEP 5 STARTS
        .................................................................... -->



        <!-- ...................................................................
                                  STEP 5 ENDS
        .................................................................... -->


        <!-- ...................................................................
                                  STEP 6 STARTS
        .................................................................... -->

        <div class="single_step" id="step_5" style="display:none;">
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
                  <label for="departure_airport">FIRST NAME</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input departure_airport" id="common_input departure_airport" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="arrival_airport">LAST NAME</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input arrival_airport" id="common_input arrival_airport" placeholder="e.g. London or LHR">
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="departure_airport">ADDRESS</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input departure_airport" id="common_input departure_airport" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="arrival_airport">POST CODE</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input arrival_airport" id="common_input arrival_airport" placeholder="e.g. London or LHR">
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="departure_airport">DATE OF BIRTH</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input departure_airport" id="common_input departure_airport date" name="date" placeholder="e.g. New York or JFK">
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
                  <input class="common_input" type="radio" id="common_input booking_reference_radio_yes" name="booking_reference_radio" value="1">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="two_child_radio_div">
                <label class="container_radio">Later
                  <input class="common_input" type="radio" id="common_input booking_reference_radio_no" name="booking_reference_radio" value="2">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="parent_div show_on_booking_reference_radio_yes">
              <div class="add_booking_reference_div" id="add_booking_reference_div">
                <div class="child_div" style="margin-top: 10px;" id="reference_remove">
                  <input style="width: 50%; float: left; margin-right: 10px; margin-bottom: 0px; margin-top: 0px;" type="text" class="common_input" name="meta_key[]" />
                  <button type="button" class="remove_reference" id="remove_reference" style="float: none; margin-left: 5px;margin-top: 2px;">
                    <i class="fas fa-minus-circle"></i>
                  </button>
                </div>
              </div>
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
                                  STEP 6 ENDS
        .................................................................... -->

        <!-- ...................................................................
                                  STEP 7 STARTS
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
                  <label for="departure_airport">FIRST NAME</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input departure_airport" id="common_input departure_airport" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="arrival_airport">LAST NAME</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input arrival_airport" id="common_input arrival_airport" placeholder="e.g. London or LHR">
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="departure_airport">DATE OF BIRTH</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input departure_airport" id="common_input departure_airport date" name="date" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="departure_airport">EMAIL ADDRESS</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input departure_airport" id="common_input departure_airport" placeholder="e.g. New York or JFK">
                </div>
              </div>
            </div>
            <div class="parent_div">
              <div class="two_child_div_left">
                <div class="label_field">
                  <label for="departure_airport">ADDRESS</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input departure_airport" id="common_input departure_airport" placeholder="e.g. New York or JFK">
                </div>
              </div>
              <div class="two_child_div_right">
                <div class="label_field">
                  <label for="arrival_airport">POST CODE</label>
                </div>
                <div class="input_field">
                  <input type="text" class="common_input arrival_airport" id="common_input arrival_airport" placeholder="e.g. London or LHR">
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
                      <input class="common_input" type="radio" id="common_input other_booking_reference_radio_yes" name="other_booking_reference_radio" value="1">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="two_child_radio_div">
                    <label class="container_radio">Later
                      <input class="common_input" type="radio" id="common_input other_booking_reference_radio_no" name="other_booking_reference_radio" value="2">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="parent_div show_on_other_booking_reference_radio_yes">
                  <div class="add_other_booking_reference_div" id="add_other_booking_reference_div">
                    <div class="child_div" style="margin-top: 10px;" id="other_reference_remove_div">
                      <input style="width: 50%; float: left; margin-right: 10px; margin-bottom: 0px; margin-top: 0px;" type="text" class="common_input" name="meta_key[]" />
                      <button type="button" class="remove_other_reference" id="remove_other_reference" style="float: none; margin-left: 5px;margin-top: 2px;">
                        <i class="fas fa-minus-circle"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <br/>

            <div class="form_h4">
              <h4>A booking reference is a code used by airlines to keep track of individual reservations. You can find your booking reference on your e-ticket or on any emails or documents you received from the airline after booking your trip.
                This code will most often be six digits, including both letters and numbers (for example: DF87G3, REDYYD, L5W4NW). Please make sure you don’t include spaces.
                For help locating your booking please contact our customer service department. (add link to contact us page)
              </h4>
            </div>

            <p>
                For help locating your booking please contact our customer service department.
            </p>

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
                                  STEP 7 ENDS
        .................................................................... -->
          <!-- ...................................................................
                                  STEP 8 STARTS
        .................................................................... -->

        <div class="single_step" id="step_7" style="display:none;">


            <div class="common_row table_show_on_large_screen">
                <div class="parent_div">
                    <div class="form_h3">
                      <h3>Total amount claimed for all passengers.</h3>
                    </div>
                  </div>
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
                          <td class="align-baseline">Clothing</td>
                          <td>
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" class="common_input price_input" id="common_input price_input" placeholder="1234">
                              </div>
                              <div class="col-md-6">
                                <div class="select_reason_class">
                                  <select class="custom-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="input-group yes_no_center">
                              <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="accommodation_radio" data-title="Y">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="accommodation_radio" data-title="N">NO</a>
                              </div>
                              <input type="hidden" name="happy" id="happy">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="align-baseline">Toiletries</td>
                          <td>
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" class="common_input price_input" id="common_input price_input" placeholder="1234">
                              </div>
                              <div class="col-md-6">
                                <div class="select_reason_class">
                                  <select class="custom-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="input-group yes_no_center">
                              <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="transportation_radio" data-title="Y">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="transportation_radio" data-title="N">NO</a>
                              </div>
                              <input type="hidden" name="happy" id="happy">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="align-baseline">Other</td>
                          <td>
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" class="common_input price_input" id="common_input price_input" placeholder="1234">
                              </div>
                              <div class="col-md-6">
                                <div class="select_reason_class">
                                  <select class="custom-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="input-group yes_no_center">
                              <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="food_radio" data-title="Y">YES</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="food_radio" data-title="N">NO</a>
                              </div>
                              <input type="hidden" name="happy" id="happy">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2">Total Claim:</td>
                          <td>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="select_reason_class">
                                  <select class="custom-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                </div>
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
                  <thead>
                    <tr>
                      <th scope="col">Expense</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Receipt</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-baseline">Clothing</td>
                      <td>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" class="common_input price_input" id="common_input price_input" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="input-group yes_no_center">
                          <div id="radioBtn" class="btn-group">
                            <a class="btn btn-primary btn-sm active" data-toggle="accommodation_radio" data-title="Y">YES</a>
                            <a class="btn btn-primary btn-sm notActive" data-toggle="accommodation_radio" data-title="N">NO</a>
                          </div>
                          <input type="hidden" name="happy" id="happy">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="align-baseline">Toiletries</td>
                      <td>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" class="common_input price_input" id="common_input price_input" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="input-group yes_no_center">
                          <div id="radioBtn" class="btn-group">
                            <a class="btn btn-primary btn-sm active" data-toggle="transportation_radio" data-title="Y">YES</a>
                            <a class="btn btn-primary btn-sm notActive" data-toggle="transportation_radio" data-title="N">NO</a>
                          </div>
                          <input type="hidden" name="happy" id="happy">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="align-baseline">Other</td>
                      <td>
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" class="common_input price_input" id="common_input price_input" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="input-group yes_no_center">
                          <div id="radioBtn" class="btn-group">
                            <a class="btn btn-primary btn-sm active" data-toggle="food_radio" data-title="Y">YES</a>
                            <a class="btn btn-primary btn-sm notActive" data-toggle="food_radio" data-title="N">NO</a>
                          </div>
                          <input type="hidden" name="happy" id="happy">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">Total Claim:</td>
                      <td>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="select_reason_class">
                              <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
              </div>


          <div class="common_row">
            <div class="form_h3">
              <h3>Sign permission to handle claim</h3>
            </div>
            <div class="parent_div">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Write your signature below as it appears on your ID. It's required by airlines to collect the compensation for you. By signing you agree with the Assignment Form and Price List</label>
              </div>
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
                                  STEP 8 ENDS
        .................................................................... -->

          <!-- ...................................................................
                                  STEP 8 ENDSSTEP 9 STARTS
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
              <select class="custom-select">
                <option selected>Open this select menu</option>
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

          <div class="common_row show_if_contacted_airline">
            <div class="parent_div">
              <div class="form_h4">
                <h4>Please upload all correspondence</h4>
              </div>
              <div class="form-group">
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
              </div>
            </div>
          </div>

          <div class="common_row">
            <div class="form_h3">
              <h3>Tell us what happened</h3>
            </div>
            <div class="form_h4">
              <h4>Please provide any information that may help us process your claim quickly.</h4>
            </div>
            <div class="parent_div">
              <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" placeholder="Additional Information"></textarea>
              </div>
            </div>
          </div>

          <div class="common_row">
            <div class="document_submit_div">
              <div class="row">
                <div class="col-md-8">ID copies, including travel companions’ if applicable</div>
                <div class="col-md-4">
                  <div class="input-file-container col-centered">
                    <input class="input-file" id="my-file-0" type="file">
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
                    <input class="input-file" id="my-file-1" type="file">
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
                    <input class="input-file" id="my-file-2" type="file">
                    <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-2">Select a file...</label>
                  </div>
                  <p class="file-return" id="file-return-2"></p>
                </div>
              </div>
            </div>
			<div class="document_submit_div">
              <div class="row">
                <div class="col-md-8">Property irregularity report (received in the airport when reporting missing baggage)</div>
                <div class="col-md-4">
                  <div class="input-file-container col-centered">
                    <input class="input-file" id="my-file-3" type="file">
                    <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-3">Select a file...</label>
                  </div>
                  <p class="file-return" id="file-return-3"></p>
                </div>
              </div>
            </div>
            <div class="document_submit_div">
              <div class="row">
                <div class="col-md-8">Other</div>
                <div class="col-md-4">
                  <div class="input-file-container col-centered">
                    <input class="input-file" id="my-file-4" type="file">
                    <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-4">Select a file...</label>
                  </div>
                  <p class="file-return" id="file-return-4"></p>
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
                                  STEP 9 ENDS
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

  <!-- <script src="js/section.js"></script> -->
  <script src="{{('front_asset/claim/delay_luggage/js/custom.js')}}"></script>
  <script src="{{('front_asset/claim/delay_luggage/js/select.js')}}"></script>

  <script>
   $(document).ready(function(){
     var date_input=$('input[name="date"]'); //our date input has the name "date"

     var options={
       format: 'mm/dd/yyyy',
       endDate: '+0d',
       todayHighlight: true,
       autoclose: true,
     };
     date_input.datepicker(options);
   })
</script>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="written_airline_date"]'); //our date input has the name "date"

      var options={
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
 </script>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="received_luggage_date"]'); //our date input has the name "date"

      var options={
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
 </script>
@endsection
