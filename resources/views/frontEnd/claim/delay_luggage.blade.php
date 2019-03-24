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
    <form action="">
        <!-- ...................................................................
                                  STEP 1 STARTS
        .................................................................... -->
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
                        <input type="text" name="written_airline_date" class="common_input date" id="common_input datepicker written_airline_date" placeholder="e.g. London or LHR">
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

        <!-- ...................................................................
                                 STEP 1 ENDS
       .................................................................... -->

        <!-- ...................................................................
                                  STEP 2 STARTS
        .................................................................... -->
        <div class="single_step" id="step_2" style="display:none;">

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
            <div class="parent_div">
                <div class="label_field">
                    <label for="departure_airport">When did you receive your luggage?</label>
                </div>
                <div class="two_input_field">
                    <div class="input_field">
                        <input type="text" class="common_input received_luggage_date date" id="common_input received_luggage_date date" name="received_luggage_date" placeholder="e.g. New York or JFK">
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
                <div class="email_div">
                    <div class="label_field">
                        <label for="departure_airport">Please enter your email address</label>
                    </div>
                    <div class="input_field">
                        <input type="text" class="common_input email_address" id="common_input email_address" name="email_address" placeholder="abc@efg.hij">
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
                                    <td class="align-middle">Clothing
                                      <input type="hidden" value="accommodation" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                                    </td>
                                    <td class="align-middle">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="select_reason_class">
                                                    <select class="form-control custom_select" name="expense_currency[]">
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
                                        <div class="group">
                                            <input id="is_receipt_clothing_yes" name="is_receipt_clothing" type="radio" value="Yes" checked="checked">
                                            <label class="label" for="is_receipt_clothing_yes">Yes</label>
                                            <input id="is_receipt_clothing_no" name="is_receipt_clothing" type="radio" value="No">
                                            <label class="center label" for="is_receipt_clothing_no">No</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-baseline">Toiletries
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
                                        <div class="group">
                                            <input id="is_receipt_toiletries_yes" name="is_receipt_toiletries" type="radio" value="Yes" checked="checked">
                                            <label class="label" for="is_receipt_toiletries_yes">Yes</label>
                                            <input id="is_receipt_toiletries_no" name="is_receipt_toiletries" type="radio" value="No">
                                            <label class="center label" for="is_receipt_toiletries_no">No</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-baseline">Others
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
                                        <div class="group">
                                            <input id="is_receipt_others_yes" name="is_receipt_others" type="radio" value="Yes" checked="checked">
                                            <label class="label" for="is_receipt_others_yes">Yes</label>
                                            <input id="is_receipt_others_no" name="is_receipt_others" type="radio" value="No">
                                            <label class="center label" for="is_receipt_others_no">No</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Claim:</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="common_input price_input" id="common_input price_input" placeholder="1234">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="select_reason_class">
                                                    <select class="form-control custom_select">
                                                        <option selected>Open this select menu</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
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
                                <td class="align-baseline">Clothing
                                  <input type="hidden" value="accommodation" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                                </td>
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
                            <tr class="bootstrap_table_tr_lower_thin_border">
                                <th scope="col">Receipt</th>
                                <td>
                                    <div class="group">
                                        <input id="is_receipt_clothing_yes_mobile" name="is_receipt_clothing_mobile" type="radio" value="Yes" checked="checked">
                                        <label class="label" for="is_receipt_clothing_yes_mobile">Yes</label>
                                        <input id="is_receipt_clothing_no_mobile" name="is_receipt_clothing_mobile" type="radio" value="No">
                                        <label class="center label" for="is_receipt_clothing_no_mobile">No</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Expense</th>
                                <td class="align-baseline">Toiletries
                                  <input type="hidden" value="accommodation" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                                </td>
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
                            <tr class="bootstrap_table_tr_lower_thin_border">
                                <th scope="col">Receipt</th>
                                <td>
                                    <div class="group">
                                        <input id="is_receipt_toiletries_yes_mobile" name="is_receipt_toiletries_mobile" type="radio" value="Yes" checked="checked">
                                        <label class="label" for="is_receipt_toiletries_yes_mobile">Yes</label>
                                        <input id="is_receipt_toiletries_no_mobile" name="is_receipt_toiletries_mobile" type="radio" value="No">
                                        <label class="center label" for="is_receipt_toiletries_no_mobile">No</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Expense</th>
                                <td class="align-baseline">Others
                                  <input type="hidden" value="accommodation" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                                </td>
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
                            <tr class="bootstrap_table_tr_lower_thin_border">
                                <th scope="col">Receipt</th>
                                <td>
                                    <div class="group">
                                        <input id="is_receipt_others_yes_mobile" name="is_receipt_others_mobile" type="radio" value="Yes" checked="checked">
                                        <label class="label" for="is_receipt_others_yes_mobile">Yes</label>
                                        <input id="is_receipt_others_no_mobile" name="is_receipt_others_mobile" type="radio" value="No">
                                        <label class="center label" for="is_receipt_others_no_mobile">No</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Total Claim:</td>
                                <td colspan="2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="common_input price_input" id="common_input price_input" placeholder="1234">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select_reason_class">
                                                <select class="form-control custom_select">
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
                        </table>
                    </div>
                </div>
            </div>


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

                {{-- <div class="common_row">
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
                </div> --}}

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
{{-- <script src="h ttps://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="{{('front_asset/claim/delay_luggage/js/custom.js')}}"></script>
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
