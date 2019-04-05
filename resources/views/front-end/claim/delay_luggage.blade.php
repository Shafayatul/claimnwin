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
    <div class="form_h2">
        <h2 class="text-center">Delay Luggage</h2>
    </div>
      <form action="{{url('/claim')}}" method="post" id="step-form">
        @csrf
        <!-- ...................................................................
                                  STEP 0 STARTS
        .................................................................... -->
        <div class="single_step" id="step_0">

            <div class="common_row">
                <div class="form_h3">
                    <h3>Have you already written to the airline</h3>
                </div>
                <div class="parent_div">
                    <div class="two_child_radio_div first_child">
                        <label class="container_radio">Yes
                            <input class="common_input" type="radio" id="common_input already_written_airline_yes" name="is_already_written_airline" value="1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="two_child_radio_div">
                        <label class="container_radio">No
                            <input class="common_input" type="radio" id="common_input already_written_airline_no" name="is_already_written_airline" value="0">
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
                        <input type="text" name="written_airline_date" class="common_input date" id="common_input datepicker written_airline_date" placeholder="e.g. 10/10/2010">
                    </div>
                </div>
            </div>


            <div class="common_row">
                <div class="parent_div">
                    <div class="single_button_child_div">
                        <button type="button" class="continue_button" id="continue_0" name="button">Continue <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ...................................................................
                                 STEP 0 ENDS
       .................................................................... -->

        <!-- ...................................................................
                                  STEP 1 STARTS
        .................................................................... -->
        <div class="single_step" id="step_1" style="display:none;">

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
                      <input type="text" class="auto_airport_complete common_input departed_from" id="advanced-demo common_input departed_from" name="departed_from" placeholder="e.g. New York State Police Heliport">
                    </div>
                  </div>
                  <div class="two_child_div_right">
                    <div class="label_field">
                      <label for="final_destination">FINAL DESTINATION: </label>
                    </div>
                    <div class="input_field">
                      <input type="text" class="auto_airport_complete common_input final_destination" id="common_input final_destination" name="final_destination" placeholder="e.g. London Airport">
                    </div>
                  </div>
                </div>
            </div>

             <div style="display: none;">
                   <input type="text" name="selected_connection_iata_codes" class="selected_connection_iata_codes">
                </div>
            <div class="show_on_airport_selected">
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
            </div>


            <div class="itinerary_flight_element">
            {{-- code from JS --}}
            </div>


            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button" id="continue_1" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
                                  STEP 1 ENDS
        .................................................................... -->
        <!-- ...................................................................
                                  STEP 2 STARTS
        .................................................................... -->

        <div class="single_step" id="step_2" style="display:none;">
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
                <div class="parent_div">
                    <div class="label_field">
                        <label for="departure_airport">PIR:</label>
                    </div>
                    <div class="two_input_field">
                        <div class="input_field">
                            <input type="text" class="common_input pir" id="common_input pir" name="pir" placeholder="PIR : 123456789">
                        </div>
                    </div>
                </div>
            </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button" id="continue_2" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
            <div class="parent_div">
                <div class="label_field">
                    <label for="departure_airport">When did you receive your luggage?</label>
                </div>
                <div class="two_input_field">
                    <div class="input_field">
                        <input type="text" class="common_input received_luggage_date date" id="common_input received_luggage_date date" name="received_luggage_date" placeholder="e.g. 10/10/2010">
                    </div>
                </div>
            </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button" id="continue_3" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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

            <div class="common_row">
                <div class="email_div">
                    <div class="label_field">
                        <label for="departure_airport">Please enter your email address</label>
                    </div>
                    <div class="input_field">
                        <input type="text" class="common_input email_address" id="common_input email_address" name="email_address" placeholder="e.g. something@gmail.com">
                    </div>
                </div>
            </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button" id="continue_4" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
              <div class="form_h3 text-center">
                  <h3>CONGRATULATIONS!!!</h3>
              </div>
              <div class="form_show_message_paragraph">
                  <p>
                      Congratulations! you are eligible for a refund of expenses incurred.
                      You are eligible to a refund of up to 1350 EUR (Show on screen the amount
                      in the currency converted according to passengers IP) per passenger. In the case of luggage delays, airlines are only required to refund, if proof of purchases are submitted.
                  </p>
              </div>
          </div>

          <div class="common_row">
              <div class="total_button_div">
                  <div class="two_button_child_div_right">
                      <div class="continue_button_div">
                          <button type="button" class="continue_button" id="continue_5" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
                                  STEP 5 Ends
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
                            <input type="text" class="common_input date_of_birth date" id="common_input date_of_birth" name="date_of_birth[]" placeholder="e.g. 10/10/1990">
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
                            <input class="common_input passenger_is_booking_checkbox" type="radio" count="1" id="common_input is_booking_reference_yes" name="is_booking_reference" value="1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="two_child_radio_div">
                        <label class="container_radio">Later
                            <input class="common_input passenger_is_booking_checkbox" type="radio" count="1" id="common_input is_booking_reference_no" name="is_booking_reference" value="0">
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
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button" id="continue_6" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
                            <div class="col-md-6">
                              <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6">
                              <div class="select_reason_class">
                                <select class="form-control custom_select" name="expense_currency[]">
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
                            <div class="col-md-6">
                              <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6">
                              <div class="select_reason_class">
                                <select class="form-control custom_select" name="expense_currency[]">
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
                            <div class="col-md-6">
                              <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6">
                              <div class="select_reason_class">
                                <select class="form-control custom_select" name="expense_currency[]">
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
                            <div class="col-md-6">
                              <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                            </div>
                            <div class="col-md-6">
                              <div class="select_reason_class">
                                <select class="form-control custom_select" name="expense_currency[]">
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
                            <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select" name="expense_currency[]">
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
                            <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select" name="expense_currency[]">
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
                            <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                          </div>
                          <div class="col-md-6">
                            <div class="select_reason_class">
                              <select class="form-control custom_select" name="expense_currency[]">
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
                <div class="form_h3">
                    <h3>Sign permission to handle claim</h3>
                </div>
                <div class="parent_div">
                    
                    <div class="panel panel-default" style="width: 300px; margin: 0 auto">
                      <div class="panel-body center-text">

                        <div id="signArea" >
                          <h4 class="tag-ingo">Put signature below,</h4>
                          <div class="sig sigWrapper" style="height:auto; width:302px">
                            <div class="typed"></div>
                            <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
                          </div>
                        </div>
                        {{-- <button type="button" class="btn btn-sm btn-success" id="signature_clear">Clear</button> --}}
                        {{-- <button id="btnSaveSign" type="button" class="btn btn-xs btn-success" style="margin-top: 2px">Save Signature</button> --}}
                      </div>
                    </div>

                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="is_signed_permission"> <span class="label-text">Write your signature below as it appears on your ID. It's required by airlines to collect the compensation for you. By signing you agree with
                                the Assignment Form and Price List</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="common_row">
                <div class="total_button_div">
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button" id="continue_7" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
                        <div class="col-md-8">Property irregularity report (received in the airport when reporting missing baggage)</div>
                        <div class="col-md-4">
                            <div class="input-file-container col-centered">
                                <input class="input-file" id="my-file-4" type="file" name="correspondence_property_irregularity_report">
                                <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-4">Select a file...</label>
                            </div>
                            <p class="file-return" id="file-return-4"></p>
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
                    <div class="two_button_child_div_right">
                        <div class="continue_button_div">
                            <button type="button" class="continue_button" id="continue_8" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
        <input type="hidden" name="claim_table_type" value="delay_luggage">

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
<script src="{{('front_asset/claim/delay_luggage/js/custom.js')}}"></script>

@endsection
