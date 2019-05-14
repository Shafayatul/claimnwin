$(document).ready(function() {


    if ((window.localStorage.getItem('airport1') !== null) && (window.localStorage.getItem('airport2') !== null)) {
      $("input[name='departed_from']").val(window.localStorage.getItem('airport1'));
      $("input[name='final_destination']").val(window.localStorage.getItem('airport2'));
      flight_list_checkbox_html('single');
      window.localStorage.removeItem('airport1');
      window.localStorage.removeItem('airport2');
    }
    $(document).on('click', '#continue_7', function(){
        $("#step-form").submit();
    });

    /**
    * flight list dynamic checkbox
    */

    $(".show_on_airport_selected").hide();
    $(document).on('change', "input[name='departed_from'], input[name='final_destination'], input[name='is_direct_flight'], .connection", function(){
      if (($("input[name='departed_from']").val() != "")||($("input[name='final_destination']").val() != "")) {
        $(".show_on_airport_selected").show(500);
      }else{
        $(".show_on_airport_selected").hide(500);
      }

       if ($("input[name='is_direct_flight']:checked").val() == '1') {
          var is_connection_empty = true;
          $(".connection").each(function(){
            if ($(this).val() != "") {
              is_connection_empty = false;
            }
          });
          if (!is_connection_empty) {
            itinerary_details_for_your_disrupted_flight_html('multiple');
          }
        }else{
          itinerary_details_for_your_disrupted_flight_html('single');
        }
    });


    $(document).on('change', '.airline', function(){
      console.log('working');
      var iata_code = $(this).attr('iata_code');
      var serial = $(this).attr('serial');
      console.log(iata_code);
      console.log(serial);
      console.log($(".flight_code_"+serial).val(iata_code));
    });

    function itinerary_details_for_your_disrupted_flight_html(type){

      if (type=='single') {
        var value = $("input[name='departed_from']").attr('iata-code')+'-'+$("input[name='final_destination']").attr('iata-code');
        var html = '<div class="common_row"><div class="parent_div"><div class="single_child_div"><div class="arrival_to_destination_text_div"><span class="arrival_to_destination_text_span">'+$("input[name='departed_from']").val()+'<i class="fas fa-plane"></i>'+$("input[name='final_destination']").val()+'</span></div></div></div><div class="parent_div"><div class="single_child_div"><div class="left_div"><div class="label_field"><label for="airline">AIRLINE</label></div><div class="input_field"><input type="text" serial="1" class="auto_airline_complete common_input airline" id="common_input airline" name="airline[]" placeholder="e.g. London Executive Aviation"><input type="hidden" name="flight_segment[]" value="'+value+'"></div></div><div class="right_div"><div class="flight_number_div"><div class="label_field"><label for="departure_airport">FLIGHT NO.</label></div><div class="two_input_field"><div class="child_two_input_field_left"><div class="input_field"><input type="text" class="common_input flight_code flight_code_1" id="common_input flight_code" name="flight_code[]" placeholder="ABC"></div></div><div class="child_two_input_field_right"><div class="input_field"><input type="text" class="common_input flight_number" id="common_input flight_number" name="flight_number[]" placeholder="1234"></div></div></div></div><div class="departure_date_div"><div class="label_field"><label for="departure_airport">DEPARTURE DATE</label></div><div class="two_input_field"><div class="input_field"><input type="text" class="common_input departure_airport date" id="common_input departure_airport date" name="departure_date[]" placeholder=" DD/MM/YY"></div></div></div></div></div></div></div>';
        $('.itinerary_flight_element').html(html);
        console.log("hhhhh:" +value);
        // $("input[name='selected_connection_iata_codes']").attr('value').val(value);
        $("input[name='selected_connection_iata_codes']").val(value);

      }else if (type=='multiple') {

        var airport_array_temp = new Array();
        var airport_array_iata_code_temp = new Array();

        airport_array_temp.push($("input[name='departed_from']").val());
        airport_array_iata_code_temp.push($("input[name='departed_from']").attr('iata-code'));

        $(".connection").each(function(){
          if ($(this).val() != "") {
            airport_array_temp.push($(this).val());
            airport_array_iata_code_temp.push($(this).attr('iata-code'));
          }
        });
        airport_array_temp.push($("input[name='final_destination']").val());
        airport_array_iata_code_temp.push($("input[name='final_destination']").attr('iata-code'));

        var html='';
        for (var i = 0; i < airport_array_temp.length-1; i++) {
          j=i+1;
          var value = airport_array_iata_code_temp[i]+'-'+airport_array_iata_code_temp[j];
          html += '<div class="common_row"><div class="parent_div"><div class="single_child_div"><div class="arrival_to_destination_text_div"><span class="arrival_to_destination_text_span">'+airport_array_temp[i]+'<i class="fas fa-plane"></i>'+airport_array_temp[j]+'</span></div></div></div><div class="parent_div"><div class="single_child_div"><div class="left_div"><div class="label_field"><label for="airline">AIRLINE</label></div><div class="input_field"><input type="text" serial="'+j+'" class="auto_airline_complete common_input airline" id="common_input airline" name="airline[]" placeholder="e.g. New York or JFK"><input type="hidden" name="flight_segment[]" value="'+value+'"></div></div><div class="right_div"><div class="flight_number_div"><div class="label_field"><label for="departure_airport">FLIGHT NO.</label></div><div class="two_input_field"><div class="child_two_input_field_left"><div class="input_field"><input type="text" class="common_input flight_code flight_code_'+j+'" id="common_input flight_code" name="flight_code[]" placeholder="ABC"></div></div><div class="child_two_input_field_right"><div class="input_field"><input type="text" class="common_input flight_number" id="common_input flight_number" name="flight_number[]" placeholder="1234"></div></div></div></div><div class="departure_date_div"><div class="label_field"><label for="departure_airport">DEPARTURE DATE</label></div><div class="two_input_field"><div class="input_field"><input type="text" class="common_input departure_airport date" id="common_input departure_airport date" name="departure_date[]" placeholder=" DD/MM/YY"></div></div></div></div></div></div></div>';
        }
        $('.itinerary_flight_element').html(html);
      }

      date_picker();
      auto_airline_complete();

    }


    /*HIDE MOBILE TABLE*/
    if($(window).width() > 768){
      $('.table_show_on_small_screen').remove();
    }else{
      $('.show_on_is_obtained_full_reimbursement_no').remove();
    }


    var keyCount = 0;
    $("#add_connection").click(function(){
      $("<div class='child_div' style='margin-top: 10px;' id='property_remove_"+keyCount+"'><input  style='width: 75%; float: left; margin-right: 10px; margin-bottom: 0px; margin-top: 0px;' type='text' class='auto_airport_complete common_input connection' id='connection' name='connection[]'/> <button type='button' class='remove_property' id='"+keyCount+"' style='float: none;margin-left: 5px;margin-top: 2px;'><i class='fas fa-minus-circle'></i></button></div>").appendTo("#property");
      auto_airport_complete();
    });


    $(document).on('click', '.remove_property', function() {
        var id = $(this).attr('id');

        $("#property_remove_" + id).remove();
    });

    var step = 1;
    $(".previous_button").click(function() {
        step--;
        $('.single_step').hide();
        $("#step_" + step).show();
    });

    function check_next_step() {
        if (step == 1) {
            $("#continue_1").removeClass('active_button');
            if (($("input[name='departed_from']").val() != "") && ($("input[name='final_destination']").val() != "")) {
                where_did_you_fly = true;
                var step_two_airline = true;
                var step_two_flight_number = true;
                var step_two_departure_date = true;

                $("input[name^='airline']").each(function() {
                    if ($(this).val() == "") {
                        step_two_airline = false;
                    }
                });

                $("input[name^='flight_number']").each(function() {
                    if ($(this).val() == "") {
                        step_two_flight_number = false;
                    }
                });

                $("input[name^='departure_date']").each(function() {
                    if ($(this).val() == "") {
                        step_two_departure_date = false;
                    }
                });

                if (step_two_airline && step_two_flight_number && step_two_departure_date) {
                    $("#continue_1").addClass('active_button');
                    return true;
                } else {
                    return false;
                }
            }
        } else if (step == 2) {
            $("#continue_2").removeClass('active_button');
            if ($("input[name='pir']").val() != "") {
                $("#continue_2").addClass('active_button');
                return true;
            }
        } else if (step == 3) {
            $("#continue_3").removeClass('active_button');
            if (($("input[name='email_address']").val() != "") && ($("input[name='phone_number']").val() != "")){
                $("#continue_3").addClass('active_button');
                $("#continue_4").addClass('active_button');
                return true;
            }
        }else if (step == 4) {
          return true;
        } else if (step ==5) {
            $("#continue_5").removeClass('active_button');

            var is_first_name_empty = false;
            var is_last_name_empty = false;
            var is_address_empty = false;
            var is_post_code_empty = false;
            var is_phone_empty = false;
            var is_date_of_birth_empty = false;

            $("input[name^='phone']").each(function(){
              if ($(this).val() == "") {
                is_phone_empty = true;
              }
            });

            $("input[name^='first_name']").each(function(){
              if ($(this).val() == "") {
                is_first_name_empty = true;
              }
            });
            $("input[name^='last_name']").each(function(){
              if ($(this).val() == "") {
                is_last_name_empty = true;
              }
            });
            $("input[name^='address']").each(function(){
              if ($(this).val() == "") {
                is_address_empty = true;
              }
            });
            $("input[name^='post_code']").each(function(){
              if ($(this).val() == "") {
                is_post_code_empty = true;
              }
            });
            $("input[name^='date_of_birth']").each(function(){
              if ($(this).val() == "") {
                is_date_of_birth_empty = true;
              }
            });

            if (!is_phone_empty && !is_first_name_empty && !is_last_name_empty && !is_address_empty && !is_post_code_empty && !is_date_of_birth_empty) {
                $("#continue_5").addClass('active_button');
                return true;
              // setTimeout(function(){

              //   var is_booking_reference_field_input_empty = false;
              //   $(".booking_reference_field_input").each(function(){

              //     if( ($(this).is(':visible')) && ($(this).val()=="") ){
              //       console.log("Value 1: "+$(this).is(':visible'));
              //       console.log("Value 2: "+$(this).val());
              //       is_booking_reference_field_input_empty = true;
              //     }

              //   });
              //   console.log('after loop');
              //   console.log(is_booking_reference_field_input_empty);
              //   if (!is_booking_reference_field_input_empty) {
              //     $("#continue_6").addClass('active_button');
              //     return true;
              //   }

              //   return false;

              // },1000);

            }else {
              return false;
            }
        } else if (step == 6) {
            $("#continue_6").removeClass('active_button');
            if (($("input[name='is_signed_permission']").is(':checked'))) {
                $("#continue_6").addClass('active_button');
                $("#continue_7").addClass('active_button');
                return true;
            }
        }
    }
    $(document).on("change", "input, select", function() {
        check_next_step();
    });



    function ajax_calculation(){


      var is_already_written_airline  = $("input[name='is_already_written_airline']:checked").val();
      var is_luggage_received         = $("input[name='is_luggage_received']:checked").val();
      var received_luggage_date       = $("input[name='received_luggage_date']").val();
      var departure_date              = "";
      $('input[name="departure_date[]"]').map(function(){
        departure_date = this.value;
      });


      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        url: ajax_cal_url,
        data: {
          is_already_written_airline  : is_already_written_airline,
          is_luggage_received         : is_luggage_received,
          received_luggage_date       : received_luggage_date,
          departure_date              : departure_date
        },
        success: function (data){
          console.log(data);

          if (data == '0') {
            $(".result_from_ajax_calculation").html('<div class="form_h3 text-center"><h3>SORRY!!!</h3></div><div class="form_show_message_paragraph"><p>Unfortunately, this flight is not eligible for compensation.Your claim details do not meet the criteria of Israeli or EU law to be compensated. Eligibility is calculated according the length of delay, air carriers and routes you have travelled on.</p></div>');
            $("#continue_4").hide();
          }else{
            $(".result_from_ajax_calculation").html('<div class="form_h3 text-center"><h3>CONGRATULATIONS!!!</h3></div><div class="form_show_message_paragraph"><p>You are eligible for compensation. Your claim amount will be up to '+data+'</p></div>');
          }
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function next() {
        if (check_next_step()) {
            if(step==3){
                ajax_calculation();
                step++;
              }else{
                step++;
              }
            $('.single_step').hide();
            $("#step_" + step).show();
        }
    }

    $("#continue_1").click(function() {
        console.log(step);
        next();
    });
    $("#continue_2").click(function() {
        console.log(step);
        next();
    });
    $("#continue_3").click(function() {
        console.log(step);
        next();
    });
    $("#continue_4").click(function() {
        console.log(step);
        next();
    });
    $("#continue_5").click(function() {
        console.log(step);
        next();
    });
    $("#continue_6").click(function() {
        console.log(step);
        next();
    });
    $("#continue_7").click(function() {
        console.log(step);
        next();
    });
    $("#continue_8").click(function() {
        console.log(step);
        next();
    });

    $("input[name=total_delay]:radio").click(function() {
        if ($(this).attr("value") == "less_than_3_hours") {
            $(".show_on_total_delay_selected").show(500);
        } else if ($(this).attr("value") == "3_to_8_hours") {
            $(".show_on_total_delay_selected").show(500);
        } else if ($(this).attr("value") == "more_than_8_hours") {
            $(".show_on_total_delay_selected").show(500);
        } else if ($(this).attr("value") == "never_arrived") {
            $(".show_on_total_delay_selected").show(500);
        } else {
            $(".show_on_total_delay_selected").hide();
        }
    });

    /* Add Another Passenger */
    var passengerCnt = 0;
    function add_new_passenger(){
      var passengerHtml = '<div class="total_another_passenger_div"><div class="common_row"><div class="parent_div"><div class="two_child_div_left middle_align"><div class="form_h3"><h3>Another Passenger details</h3></div></div><div class="two_child_div_right middle_align text-right"><button type="button" class="remove_another_passenger" id="remove_another_passenger" style="float: none; margin-left: 5px;margin-top: 2px;"><i class="fas fa-minus-circle"></i>Cancel</button></div></div><div class="form_h4"><h4>Make sure to type your name as it appears on your flight ticket.</h4></div><div class="parent_div"><div class="two_child_div_left"><div class="label_field"><label for="first_name">FIRST NAME</label></div><div class="input_field"><input type="text" class="common_input first_name" id="common_input first_name" name="first_name[]" placeholder="e.g. John"></div></div><div class="two_child_div_right"><div class="label_field"><label for="last_name">LAST NAME</label></div><div class="input_field"><input type="text" class="common_input last_name" id="common_input last_name" name="last_name[]" placeholder="e.g. Dcosta"></div></div></div><div class="parent_div"><div class="two_child_div_left"><div class="label_field"><label for="address">EMAIL ADDRESS</label></div><div class="input_field"><input type="text" class="common_input additional_email_address" id="common_input additional_email_address" name="additional_email_address[]" placeholder="e.g. something@gmail.com"></div></div><div class="two_child_div_right"><div class="label_field"><label for="post_code">POST CODE</label></div><div class="input_field"><input type="text" class="common_input post_code" id="common_input post_code" name="post_code[]" placeholder="e.g. 1212"></div></div></div><div class="parent_div"><div class="two_child_div_left"><div class="label_field"><label for="date_of_birth">DATE OF BIRTH</label></div><div class="input_field"><input type="text" class="common_input date_of_birth date" id="common_input date_of_birth" name="date_of_birth[]" placeholder=" DD/MM/YY"></div></div><div class="two_child_div_right"><div class="label_field"><label for="phone">Phone</label></div><div class="input_field"><input type="text" class="common_input phone" id="common_input phone" name="phone[]" placeholder="e.g. 1212"></div></div></div></div><div class="common_row"><div class="form_h3"><h3>What’s your booking reference?</h3></div><div class="parent_div"><div class="two_child_radio_div first_child"><label class="container_radio">Add Now<input class="common_input passenger_is_booking_checkbox" type="radio" count="'+passengerCnt+'" id="common_input is_booking_reference_yes" name="is_booking_reference['+passengerCnt+']" value="1"><span class="checkmark"></span></label></div><div class="two_child_radio_div"><label class="container_radio">Add Later<input class="common_input passenger_is_booking_checkbox" type="radio" count="'+passengerCnt+'" id="common_input is_booking_reference_no" name="is_booking_reference['+passengerCnt+']" value="0" checked><span class="checkmark"></span></label></div></div><div class="parent_div show_on_is_booking_reference_yes_'+passengerCnt+'" style="display:none"><div class="add_booking_reference_div" id="add_booking_reference_div_1"><div class="child_div" style="margin-top: 10px;" id="reference_remove"><input style="width: 50%; float: left; margin-right: 10px; margin-bottom: 0px; margin-top: 0px;" type="text" class="common_input booking_reference_field_input" name="booking_reference_field_input[]" /></div></div></div></div> </div>';
      return passengerHtml;
    }

    $("#add_another_passenger").click(function() {
        passengerCnt++;
        $('.show_on_click_add_another_passenger').append(add_new_passenger());
        var date_input = $('.date'); //our date input has the name "date"
        var options = {
            format: 'mm/dd/yyyy',
            endDate: '+0d',
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    });

    $(document).on("click", ".remove_another_passenger", function() {
     $(this).closest('.total_another_passenger_div').remove();
     check_next_step();
    });

    /* Yes No Radio Buttom */
    $('#radioBtn a').on('click', function() {
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#' + tog).prop('value', sel);

        $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
    });

    /* Is Luggage Received  */
    $(".show_on_is_luggage_received_yes").hide();
    $("input[name=is_luggage_received]:radio").click(function() {
        if ($(this).attr("value") == "1") {
          console.log('chhhh');
            $(".show_on_is_luggage_received_yes").show(500);
        }else {
            $(".show_on_is_luggage_received_yes").hide(500);
        }
    });


    /* Booking Reference   */
    $(document).on('change', '.passenger_is_booking_checkbox', function() {
        var count = $(this).attr('count');
        if ($(this).attr("value") == "1") {
            $(".show_on_is_booking_reference_yes_" + count).show(500);
        } else if ($(this).attr("value") == "0") {
            $(".show_on_is_booking_reference_yes_" + count).hide(500);
        }
    });

    /* Written Airline Show hide  */

    $("#written_airline_connection").hide();
    $("input[name=already_written_airline]:radio").click(function() {
        if ($(this).attr("value") == "1") {
            $("#written_airline_connection").show(500);
        } else if ($(this).attr("value") == "2") {
            $("#written_airline_connection").hide(500);
        }
    });

    /* Other Booking Reference   */
    $(".show_on_other_booking_reference_radio_yes").hide();
    $("input[name=other_booking_reference_radio]:radio").click(function() {
        if ($(this).attr("value") == "1") {
            $(".show_on_other_booking_reference_radio_yes").show(500);
        } else if ($(this).attr("value") == "2") {
            $(".show_on_other_booking_reference_radio_yes").hide(500);
        }
    });

    $(document).on('click', '.remove_other_reference', function() {
        var id = $(this).attr('id');
        $("#other_reference_remove_" + id).remove();
    });

    document.querySelector("html").classList.add('js');
    /*----------First FIle--------------------*/
    var fileInput = document.querySelector("#my-file-0"),
        button = document.querySelector("#input-file-trigger-0"),
        the_return = document.querySelector("#file-return-0");

    button.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput.focus();
        }
    });
    button.addEventListener("click", function(event) {
        fileInput.focus();
        return false;
    });
    fileInput.addEventListener("change", function(event) {
        the_return.innerHTML = this.value;
    });

    /*----------Second FIle--------------------*/

    var fileInput1 = document.querySelector("#my-file-1"),
        button1 = document.querySelector("#input-file-trigger-1"),
        the_return1 = document.querySelector("#file-return-1");

    button1.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput1.focus();
        }
    });
    button1.addEventListener("click", function(event) {
        fileInput1.focus();
        return false;
    });
    fileInput1.addEventListener("change", function(event) {
        the_return1.innerHTML = this.value;
    });

    /*----------Thrid FIle--------------------*/

    var fileInput2 = document.querySelector("#my-file-2"),
        button2 = document.querySelector("#input-file-trigger-2"),
        the_return2 = document.querySelector("#file-return-2");

    button2.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput2.focus();
        }
    });
    button2.addEventListener("click", function(event) {
        fileInput2.focus();
        return false;
    });
    fileInput2.addEventListener("change", function(event) {
        the_return2.innerHTML = this.value;
    });

    /*----------Four FIle--------------------*/

    var fileInput3 = document.querySelector("#my-file-3"),
        button3 = document.querySelector("#input-file-trigger-3"),
        the_return3 = document.querySelector("#file-return-3");

    button3.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput3.focus();
        }
    });
    button3.addEventListener("click", function(event) {
        fileInput3.focus();
        return false;
    });
    fileInput3.addEventListener("change", function(event) {
        the_return3.innerHTML = this.value;
    });

    /*----------New Added FIle--------------------*/
    var fileInput4 = document.querySelector("#my-file-4"),
        button4 = document.querySelector("#input-file-trigger-4"),
        the_return4 = document.querySelector("#file-return-4");

    button4.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput3.focus();
        }
    });
    button4.addEventListener("click", function(event) {
        fileInput3.focus();
        return false;
    });
    fileInput4.addEventListener("change", function(event) {
        the_return4.innerHTML = this.value;
    });

  date_picker();
  function date_picker(){
    var date_input = $('.date'); //our date input has the name "date"
    var options = {
      format: 'dd/mm/yy',
      endDate: '+0d',
      todayHighlight: true,
      autoclose: true,
    };
    date_input.datepicker(options);
  }

$(".expense_currency_select_option").val('USD');
});
