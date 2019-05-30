@extends('layouts.front_layout')

@section('header-script')
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('front_asset/') }}/claim/delay_luggage/css/main.css">
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
                                                  <span>Cliam Submission</span>
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
                          <form action="{{url('/claim')}}" method="post" id="step-form" enctype="multipart/form-data" >
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
                                            <input type="text" name="written_airline_date" class="common_input date" id="common_input datepicker written_airline_date" placeholder=" DD/MM/YY">
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
                                </div>

                                 <div style="display: none;">
                                       <input type="text" name="selected_connection_iata_codes" class="selected_connection_iata_codes">
                                    </div>
                                <div class="show_on_airport_selected">
                                  <div class="parent_div">
                                      <div class="form_h3">
                                          <h3>Itinerary details for your disrupted flight on which luggage was delayed</h3>
                                      </div>
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
                                                <button type="button" class="continue_button pull-right" id="continue_1" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
                                            For help locating your PIR please contact our <a  style="font-weight: bold; color: #124478;" target="_blank"  href="{{ URL::to('/contact-us') }}">Customer Service Department.</a>
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
                                  <div class="pir_box">
                                    <p>Property Irregularity Report</p>
                                    <p>Malaysia Airlines Berhad: baggage services</p>
                                    <p>Kota Kinabalu International Airport</p>
                                    <p>Business hours 08:30-24:00</p>
                                    <p>Tel no. 088-515312</p>
                                    <p>Email <span style="color: #002cd4;">mhlbag@malaysiaairlines.com</span></p>
                                    <br>
                                    <br>
                                    <p>File ref &nbsp;&nbsp;&nbsp;<span style="background-color: yellow;">BKIMH78514</span>/10NOV17/0947GMT 5312</p>
                                    <p>Name &nbsp;&nbsp;&nbsp; Sample</p>
                                    <p>Title/initials &nbsp;&nbsp;&nbsp; MR</p>
                                    <p>Given name</p>
                                    <p>Flight/date: &nbsp;&nbsp;&nbsp; MH2614/10NOV</p>
                                    <p>Number of bags: &nbsp;&nbsp;&nbsp; 2</p>
                                    <p>Ticket number: &nbsp;&nbsp;&nbsp; ETK</p>
                                    <p>Color/type</p>
                                    <p>Bag number</p>
                                  </div>
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
                                <div class="parent_div">
                                    <div class="label_field">
                                        <label for="departure_airport">When did you receive your luggage?</label>
                                    </div>
                                    <div class="two_input_field">
                                        <div class="input_field">
                                            <input type="text" class="common_input received_luggage_date date" id="common_input received_luggage_date date" name="received_luggage_date" placeholder=" DD/MM/YY">
                                        </div>
                                    </div>
                                </div>

                                <div class="common_row">
                                    <div class="total_button_div">
                                        <div class="two_button_child_div_right">
                                            <div class="continue_button_div">
                                                <button type="button" class="continue_button pull-right" id="continue_4" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
                                    <div class="email_div">
                                        <div class="label_field">
                                            <label for="departure_airport">Please enter your email address</label>
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
                                <div class="common_row">
                                    <div class="total_button_div">
                                        <div class="two_button_child_div_right">
                                            <div class="continue_button_div">
                                                <button type="button" onclick="horizontalCustomStyle();" class="continue_button pull-right" id="continue_5" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
                                                      STEP 6 Ends
                            .................................................................... -->

                            <!-- ...................................................................
                                                      STEP 7 STARTS
                            .................................................................... -->

                            <div class="single_step" id="step_7" style="display:none;">
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
                                                <input class="common_input passenger_is_booking_checkbox" type="radio" count="1" id="common_input is_booking_reference_yes" name="is_booking_reference" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="two_child_radio_div">
                                            <label class="container_radio">Add Later
                                                <input class="common_input passenger_is_booking_checkbox" type="radio" count="1" id="common_input is_booking_reference_no" name="is_booking_reference" value="0" checked>
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

                                <div class="common_row table_show_on_large_screen">
                                    <div class="parent_div">
                                        <div class="form_h3">
                                            <h3>Total amount claimed for all passengers.</h3>
                                        </div>
                                    </div>
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
                                                        <td class="align-middle">Clothing
                                                            <input type="hidden" value="accommodation" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="row">
                                                                <div class="col-md-6 fifty_percent_width">
                                                                    <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                                                                </div>
                                                                <div class="col-md-6 fifty_percent_width">
                                                                    <div class="select_reason_class">
                                                                        <select class="form-control custom_select expense_currency_select_option" name="expense_currency[]">
                                                                            <option selected>select currency</option>
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
                                                                <input id="is_receipt_clothing_yes" name="is_receipt[0]" type="radio" value="1" checked="checked">
                                                                <label class="label" for="is_receipt_clothing_yes">Yes</label>
                                                                <input id="is_receipt_clothing_no" name="is_receipt[0]" type="radio" value="0">
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
                                                                <div class="col-md-6 fifty_percent_width">
                                                                    <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                                                                </div>
                                                                <div class="col-md-6 fifty_percent_width">
                                                                    <div class="select_reason_class">
                                                                        <select class="form-control custom_select expense_currency_select_option" name="expense_currency[]">
                                                                            <option selected>select currency</option>
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
                                                                <input id="is_receipt_toiletries_yes" name="is_receipt[1]" type="radio" value="1" checked="checked">
                                                                <label class="label" for="is_receipt_toiletries_yes">Yes</label>
                                                                <input id="is_receipt_toiletries_no" name="is_receipt[1]" type="radio" value="0">
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
                                                                <div class="col-md-6 fifty_percent_width">
                                                                    <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                                                                </div>
                                                                <div class="col-md-6 fifty_percent_width">
                                                                    <div class="select_reason_class">
                                                                        <select class="form-control custom_select expense_currency_select_option" name="expense_currency[]">
                                                                            <option selected>select currency</option>
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
                                                                <input id="is_receipt_others_yes" name="is_receipt[2]" type="radio" value="1" checked="checked">
                                                                <label class="label" for="is_receipt_others_yes">Yes</label>
                                                                <input id="is_receipt_others_no" name="is_receipt[2]" type="radio" value="0">
                                                                <label class="center label" for="is_receipt_others_no">No</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Claim:</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-6 fifty_percent_width">
                                                                    <input type="number" class="common_input price_input" id="common_input price_input" placeholder="1234">
                                                                </div>
                                                                <div class="col-md-6 fifty_percent_width">
                                                                    <div class="select_reason_class">
                                                                        <select class="form-control custom_select expense_currency_select_option">
                                                                            <option selected>select currency</option>
                                                                            @foreach($currencies as $key => $val)
                                                                                <option value="{{$key}}">{{$key}}</option>
                                                                            @endforeach
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
                                                    <td class="align-baseline">Clothing
                                                        <input type="hidden" value="accommodation" class="common_input expense_name" id="common_input expense_name" name="expense_name[]">
                                                    </td>
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
                                                                    <select class="form-control custom_select expense_currency_select_option" name="expense_currency[]">
                                                                        <option selected>select currency</option>
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
                                                            <input id="is_receipt_clothing_yes_mobile" name="is_receipt[0]" type="radio" value="1" checked="checked">
                                                            <label class="label" for="is_receipt_clothing_yes_mobile">Yes</label>
                                                            <input id="is_receipt_clothing_no_mobile" name="is_receipt[0]" type="radio" value="0">
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
                                                                <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="select_reason_class">
                                                                    <select class="form-control custom_select expense_currency_select_option" name="expense_currency[]">
                                                                        <option selected>select currency</option>
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
                                                            <input id="is_receipt_toiletries_yes_mobile" name="is_receipt[1]" type="radio" value="1" checked="checked">
                                                            <label class="label" for="is_receipt_toiletries_yes_mobile">Yes</label>
                                                            <input id="is_receipt_toiletries_no_mobile" name="is_receipt[1]" type="radio" value="0">
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
                                                                <input type="number" class="common_input expense_price" id="common_input expense_price" name="expense_price[]" placeholder="1234">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="select_reason_class">
                                                                    <select class="form-control custom_select expense_currency_select_option" name="expense_currency[]">
                                                                        <option selected>select currency</option>
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
                                                            <input id="is_receipt_others_yes_mobile" name="is_receipt[2]" type="radio" value="1" checked="checked">
                                                            <label class="label" for="is_receipt_others_yes_mobile">Yes</label>
                                                            <input id="is_receipt_others_no_mobile" name="is_receipt[2]" type="radio" value="0">
                                                            <label class="center label" for="is_receipt_others_no_mobile">No</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total Claim:</td>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="number" class="common_input price_input" id="common_input price_input" placeholder="1234">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="select_reason_class">
                                                                    <select class="form-control custom_select expense_currency_select_option">
                                                                        <option selected>select currency</option>
                                                                        @foreach($currencies as $key => $val)
                                                                            <option value="{{$key}}">{{$key}}</option>
                                                                        @endforeach
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
                                                    the <a  style="font-weight: bold; color: #124478;" target="_blank"  href="{{URL::to('/terms-and-conditions')}}">Terms and Conditions</a> and <a  style="font-weight: bold; color: #124478;" target="_blank"  href="{{URL::to('/pricing-list')}}">Price List</a></span>
                                            </label>
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

                            <!-- ...................................................................
                                                      STEP 8 ENDS
                            .................................................................... -->
                            <!-- ...................................................................
                                                      STEP 9 STARTS
                            .................................................................... -->

                            <div class="single_step" id="step_9" style="display:none;">
                                <div class="common_row">
                                    <div class="form_h3">
                                        <h3>Optional: Additional information</h3>
                                    </div>
                                    <div class="form_h4">
                                        <h4>If we gather more information, we can handle your claim faster.</h4>
                                        <label>Where did you hear about Claim’N Win?</label>
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
                                            <div class="col-md-6 padding_bottom">Property irregularity report (received in the airport when reporting missing baggage)</div>
                                            <div class="col-md-6">
                                                <div class="input-file-container col-centered">
                                                    <input class="input-file" id="my-file-4" type="file" name="file_name[3]">
                                                    <input type="hidden" value="Property irregularity report" name="file_name_to_show[3]">
                                                    <label tabindex="0" for="my-file" class="input-file-trigger" id="input-file-trigger-4">Select a file...</label>
                                                </div>
                                                <p class="file-return" id="file-return-4"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="document_submit_div">
                                        <div class="row">
                                            <div class="col-md-6">Other</div>
                                            <div class="col-md-6">
                                                <div class="input-file-container col-centered">
                                                    <input class="input-file" id="my-file-3" type="file" name="file_name[4]">
                                                    <input type="hidden" value="Other" name="file_name_to_show[4]">
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
                                                <button type="button" class="continue_button pull-right" id="continue_9" name="button">Continue <i class="fas fa-arrow-right"></i></button>
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
                                                      STEP 9 ENDS
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

    var ajax_cal_url = "{{url('/ajax/calculate/delay_luggage_calculation')}}";
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
<script src="{{('front_asset/claim/delay_luggage/js/custom.js')}}"></script>

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
