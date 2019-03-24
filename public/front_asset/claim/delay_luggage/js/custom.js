$(document).ready(function(){



    var keyCount = 0;
    $("#add_connection").click(function(){
    $("<div class='child_div' style='margin-top: 10px;' id='property_remove_"+keyCount+"'><input  style='width: 75%; float: left; margin-right: 10px; margin-bottom: 0px; margin-top: 0px;' type='text' class='common_input connection' id='connection' name='connection[]'/> <button type='button' class='remove_property' id='"+keyCount+"' style='float: none;margin-left: 5px;margin-top: 2px;'><i class='fas fa-minus-circle'></i></button></div>").appendTo("#property");
    });


    $(document).on('click','.remove_property',function(){
      var id = $(this).attr('id');
    $("#property_remove_"+id).remove();
    });

    var step = 1;
    $(".previous_button").click(function() {
      step--;
      $('.single_step').hide();
      $("#step_" + step).show();
    });

    function check_next_step(){
      console.log("check_next_step() func");
      if (step==1) {
        $("#continue_1").removeClass('active_button');
        if ($("input[name='already_written_airline']").is(':checked')) {
          if ($("input[name='already_written_airline']:checked").val() == '1') {
            console.log("value 1");
            if ($("input[name='written_airline_date']").val() != "") {
              $("#continue_1").addClass('active_button');
              return true;
            }
          }else if ($("input[name='already_written_airline']:checked").val() == '2') {
            console.log("value 2");
            $("#continue_1").addClass('active_button');
            console.log("STEP 1 COMPLETED!!!");
            return true;
          }
        }else {
          return false;
        }
      }else if (step == 2) {

        $("#continue_2").removeClass('active_button');

        if (($("input[name='departed_from']").val() != "") && ($("input[name='final_destination']").val() != "")) {
          where_did_you_fly = true;
          var step_two_airline = true;
          var step_two_flight_number = true;
          var step_two_departure_date = true;
          $("input[name^='airline']").each(function(){
            if ($(this).val() == "") {
              step_two_airline = false;
            }
          });

          $("input[name^='flight_number']").each(function(){
            if ($(this).val() == "") {
              step_two_flight_number = false;
            }
          });

          $("input[name^='departure_date']").each(function(){
            if ($(this).val() == "") {
              step_two_departure_date = false;
            }
          });

          if (step_two_airline
            && step_two_flight_number
            && step_two_departure_date) {
            console.log("STEP 2 COMPLETED!!!");
            $("#continue_2").addClass('active_button');
            return true;
          }else {
            return false;
          }

        }

      }else if (step == 3) {
        $("#continue_3").removeClass('active_button');
        if ($("input[name='pir']").val() != "") {
          console.log("STEP 3 COMPLETED!!!");
          $("#continue_3").addClass('active_button');
          return true;
        }
      }else if (step == 4) {
        $("#continue_4").removeClass('active_button');
        if ($("input[name='received_luggage_date']").val() != "") {
          console.log("STEP 4 COMPLETED!!!");
          $("#continue_4").addClass('active_button');
          return true;
        }
      }else if (step == 5){
        $("#continue_5").removeClass('active_button');
        if ($("input[name='email_address']").val() != "") {
          console.log("STEP 5 COMPLETED!!!");
          $("#continue_5").addClass('active_button');
          return true;
        }
      }else if (step == 6) {
        $("#continue_6").removeClass('active_button');

        var first_name = false;
        var last_name = false;
        var address = false;
        var post_code = false;
        var date_of_birth = false;

        $("input[name^='first_name']").each(function(){
          if ($(this).val() != "") {
            console.log($(this).val());
            first_name = true;
          }else {
            first_name = false;
          }
        });
        $("input[name^='last_name']").each(function(){
          if ($(this).val() != "") {
            console.log($(this).val());
            last_name = true;
          }else {
            last_name = false;
          }
        });
        $("input[name^='address']").each(function(){
          if ($(this).val() != "") {
            console.log($(this).val());
            address = true;
          }else {
            address = false;
          }
        });
        $("input[name^='post_code']").each(function(){
          if ($(this).val() != "") {
            console.log($(this).val());
            post_code = true;
          }else {
            post_code = false;
          }
        });
        $("input[name^='date_of_birth']").each(function(){
          if ($(this).val() != "") {
            date_of_birth = true;
            console.log($(this).val());
          }else {
            date_of_birth = false;
          }
        });

        if (first_name == true && last_name == true && address == true && post_code == true && date_of_birth == true) {
          if (($("input[name='is_booking_reference']").is(':checked'))){
            if ($('input[name=is_booking_reference]:checked').val() == 'is_booking_reference_yes'){
              console.log("88true")
              var is_booking_reference_field_input_empty = false;
              $("input[name^='booking_reference_field_input']").each(function(){
                console.log('88input');
                if ($(this).val() == "") {
                  console.log('88-it-is-null');
                  is_booking_reference_field_input_empty = true;
                }else{
                  console.log('88-it-is-not-null');
                }
              });
              console.log("88after-loop");

              if (!is_booking_reference_field_input_empty) {
                console.log("STEP 6 COMPLETED!!!");
                $("#continue_6").addClass('active_button');
                return true;
              }

            }else if ($('input[name=is_booking_reference]:checked').val() == 'is_booking_reference_no'){
              console.log("STEP 6 COMPLETED!!!");
              $("#continue_6").addClass('active_button');
              return true;
            }
          }
        }else {
          return false;
        }

      }else if (step == 7) {
        $("#continue_7").removeClass('active_button');
        if (($("input[name='is_signed_permission']").is(':checked'))) {
          $("#continue_7").addClass('active_button');
          $("#continue_8").addClass('active_button');
          return true;
        }
    }
}
    $(document).on("change", "input, select", function() {
      check_next_step();
    });

    function next(){
      if (check_next_step()) {
        step++;
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

    /*----------Connection Hide/Show-------*/




    // $("#connection_div").hide();
    //
    // $("input[name=is_direct_flight]:radio").click(function() {
    //   if($(this).attr("value")=="is_direct_flight_yes") {
    //     $("#connection_div").show(500);
    //   }else{
    //     $("#connection_div").hide(500);
    //   }
    // });


    /* --------- Delayed Button ----------- */
    // $(".show_if_flight_did_not_go_planned").hide();
    //
    // $("input[name=selected_connection_id]:radio").click(function() {
    //   if($(this).attr("value")=="1") {
    //     $(".show_if_flight_did_not_go_planned").show(500);
    //   }else{
    //     $(".show_if_flight_did_not_go_planned").hide(500);
    //   }
    // });

    // $(".show_on_what_happened_to_the_flight_selected").hide();
    // $(".show_on_total_delay_selected").hide();
    //
    // $("input[name=what_happened_to_the_flight]:radio").click(function() {
    //   if($(this).attr("value")=="delayed_flight") {
    //       $(".show_on_what_happened_to_the_flight_selected").show(500);
    //       $(".show_on_total_delay_selected").hide();
    //   }else if ($(this).attr("value")=="canceled_flight") {
    //       $(".show_on_what_happened_to_the_flight_selected").show(500);
    //       $(".show_on_total_delay_selected").hide();
    //   }else if ($(this).attr("value")=="denied_boarding") {
    //     $(".show_on_what_happened_to_the_flight_selected").show(500);
    //     $(".show_on_total_delay_selected").hide();
    //   }
    // });

    $("input[name=total_delay]:radio").click(function() {
    if($(this).attr("value")=="less_than_3_hours") {
      $(".show_on_total_delay_selected").show(500);
    }else if ($(this).attr("value")=="3_to_8_hours") {
      $(".show_on_total_delay_selected").show(500);
    }else if ($(this).attr("value")=="more_than_8_hours") {
      $(".show_on_total_delay_selected").show(500);
    }else if ($(this).attr("value")=="never_arrived") {
      $(".show_on_total_delay_selected").show(500);
    }else{
      $(".show_on_total_delay_selected").hide();
    }
    });


    // $(".show_on_is_rerouted_no").hide();
    // $(".accommodation").hide();
    // $("input[name=is_rerouted]:radio").click(function() {
    //   if($(this).attr("value")=="is_rerouted_yes") {
    //       $(".show_on_is_rerouted_no").hide(500);
    //       $(".show_on_is_obtained_full_reimbursement_no").hide(500);
    //       $(".accommodation").show(500);
    //   }else if ($(this).attr("value")=="is_rerouted_no") {
    //       $(".show_on_is_rerouted_no").show(500);
    //       $(".accommodation").hide();
    //   }else {
    //       $(".show_on_is_rerouted_no").hide(500);
    //       $(".show_on_is_obtained_full_reimbursement_no").hide(500);
    //       $(".accommodation").hide();
    //   }
    // });


    // $(".show_on_is_obtained_full_reimbursement_no").hide();
    //
    // $("input[name=is_obtained_full_reimbursement]:radio").click(function() {
    //   if($(this).attr("value")=="is_obtained_full_reimbursement_yes") {
    //     $(".show_on_is_obtained_full_reimbursement_no").hide(500);
    //     $(".accommodation").show(500);
    //   }else if ($(this).attr("value")=="is_obtained_full_reimbursement_no") {
    //     $(".show_on_is_obtained_full_reimbursement_no").show(500);
    //     $(".accommodation").hide();
    //   }else {
    //     $(".show_on_is_obtained_full_reimbursement_no").hide(500);
    //     $(".accommodation").hide();
    //   }
    // });


    // $(".show_on_is_paid_for_rerouting_yes").hide();
    //
    // $("input[name=is_paid_for_rerouting]:radio").click(function() {
    //   if($(this).attr("value")=="is_paid_for_rerouting_yes") {
    //     $(".show_on_is_paid_for_rerouting_yes").show(500);
    //     $(".accommodation").hide();
    //   }else if ($(this).attr("value")=="is_paid_for_rerouting_no") {
    //     $(".show_on_is_paid_for_rerouting_yes").hide(500);
    //     $(".accommodation").show(500);
    //   }else {
    //     $(".show_on_is_paid_for_rerouting_yes").hide(500);
    //     $(".accommodation").show(500);
    //   }
    // });


    // $(".show_if_contacted_airline").hide();
    //
    // $("input[name=is_contacted_airline]:radio").click(function() {
    //   if($(this).attr("value")=="1") {
    //     $(".show_if_contacted_airline").show(500);
    //   }else if ($(this).attr("value")=="2") {
    //     $(".show_if_contacted_airline").hide(500);
    //   }else {
    //     $(".show_if_contacted_airline").hide(500);
    //   }
    // });

    /* Add Another Passenger */
    var passengerCnt = 2;
    function add_new_passenger(){

      var passengerHtml = '<div class="total_another_passenger_div"><div class="common_row"><div class="parent_div"><div class="two_child_div_left"><div class="form_h3"><h3>Another Passenger details</h3></div></div><div class="two_child_div_right text-right"><button type="button" class="remove_another_passenger" id="remove_another_passenger" style="float: none; margin-left: 5px;margin-top: 2px;"><i class="fas fa-minus-circle"></i>Cancel</button></div></div><div class="form_h4"><h4>Make sure to type your name as it appears on your flight ticket.</h4></div><div class="parent_div"><div class="two_child_div_left"><div class="label_field"><label for="first_name">FIRST NAME</label></div><div class="input_field"><input type="text" class="common_input first_name" id="common_input first_name" name="first_name[]" placeholder="e.g. New York or JFK"></div></div><div class="two_child_div_right"><div class="label_field"><label for="last_name">LAST NAME</label></div><div class="input_field"><input type="text" class="common_input last_name" id="common_input last_name" name="last_name[]" placeholder="e.g. London or LHR"></div></div></div><div class="parent_div"><div class="two_child_div_left"><div class="label_field"><label for="address">EMAIL ADDRESS</label></div><div class="input_field"><input type="email" class="common_input additional_email_address" id="common_input additional_email_address" name="additional_email_address[]" placeholder="e.g. abc@efg.ijk"></div></div><div class="two_child_div_right"><div class="label_field"><label for="post_code">POST CODE</label></div><div class="input_field"><input type="text" class="common_input post_code" id="common_input post_code" name="post_code[]" placeholder="e.g. London or LHR"></div></div></div><div class="parent_div"><div class="two_child_div_left"><div class="label_field"><label for="date_of_birth">DATE OF BIRTH</label></div><div class="input_field"><input type="text" class="common_input date_of_birth date" id="common_input date_of_birth" name="date_of_birth[]" placeholder="1/1/1990"></div></div></div></div><div class="common_row"><div class="form_h3"><h3>What’s your booking reference?</h3></div><div class="parent_div"><div class="two_child_radio_div first_child"><label class="container_radio">Yes<input class="common_input passenger_is_booking_checkbox" type="radio" count="'+passengerCnt+'" id="common_input is_booking_reference_yes" name="is_booking_reference" value="is_booking_reference_yes"><span class="checkmark"></span></label></div><div class="two_child_radio_div"><label class="container_radio">Later<input class="common_input passenger_is_booking_checkbox" type="radio" count="'+passengerCnt+'" id="common_input is_booking_reference_no" name="is_booking_reference" value="is_booking_reference_no"><span class="checkmark"></span></label></div></div><div class="parent_div show_on_is_booking_reference_yes_'+passengerCnt+'" style="display:none"><div class="add_booking_reference_div" id="add_booking_reference_div_1"><div class="child_div" style="margin-top: 10px;" id="reference_remove"><input style="width: 50%; float: left; margin-right: 10px; margin-bottom: 0px; margin-top: 0px;" type="text" class="common_input booking_reference_field_input" name="booking_reference_field_input[]" /></div></div></div></div> </div>';

      return passengerHtml;
    }


    $("#add_another_passenger").click(function(){
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
    });



    /* Yes No Radio Buttom */
    $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);

    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    });

      /* Booking Reference   */
      $(document).on('change', '.passenger_is_booking_checkbox', function(){
        var count = $(this).attr('count');
        if($(this).attr("value")=="is_booking_reference_yes") {
          $(".show_on_is_booking_reference_yes_"+count).show(500);
        }else if ($(this).attr("value")=="is_booking_reference_no") {
          $(".show_on_is_booking_reference_yes_"+count).hide(500);
        }
      });





      /* Written Airline Show hide  */

      $("#written_airline_connection").hide();
      $("input[name=already_written_airline]:radio").click(function() {
        if($(this).attr("value")=="1") {
          $("#written_airline_connection").show(500);
        }else if ($(this).attr("value")=="2") {
          $("#written_airline_connection").hide(500);
        }
      });



      /* Other Booking Reference   */
        $(".show_on_other_booking_reference_radio_yes").hide();
        $("input[name=other_booking_reference_radio]:radio").click(function() {
        if($(this).attr("value")=="1") {
          $(".show_on_other_booking_reference_radio_yes").show(500);
        }else if ($(this).attr("value")=="2") {
          $(".show_on_other_booking_reference_radio_yes").hide(500);
        }
      });

      $(document).on('click','.remove_other_reference',function(){
        var id = $(this).attr('id');
      $("#other_reference_remove_"+id).remove();
      });


        document.querySelector("html").classList.add('js');
/*----------First FIle--------------------*/
  var fileInput  = document.querySelector( "#my-file-0" ),
      button     = document.querySelector( "#input-file-trigger-0" ),
      the_return = document.querySelector("#file-return-0");

  button.addEventListener( "keydown", function( event ) {
      if ( event.keyCode == 13 || event.keyCode == 32 ) {
          fileInput.focus();
      }
  });
  button.addEventListener( "click", function( event ) {
     fileInput.focus();
     return false;
  });
  fileInput.addEventListener( "change", function( event ) {
      the_return.innerHTML = this.value;
  });

/*----------Second FIle--------------------*/

  var fileInput1  = document.querySelector( "#my-file-1" ),
  button1     = document.querySelector( "#input-file-trigger-1" ),
  the_return1 = document.querySelector("#file-return-1");

button1.addEventListener( "keydown", function( event ) {
  if ( event.keyCode == 13 || event.keyCode == 32 ) {
      fileInput1.focus();
  }
});
button1.addEventListener( "click", function( event ) {
 fileInput1.focus();
 return false;
});
fileInput1.addEventListener( "change", function( event ) {
  the_return1.innerHTML = this.value;
});


/*----------Thrid FIle--------------------*/

var fileInput2  = document.querySelector( "#my-file-2" ),
button2     = document.querySelector( "#input-file-trigger-2" ),
the_return2 = document.querySelector("#file-return-2");

button2.addEventListener( "keydown", function( event ) {
if ( event.keyCode == 13 || event.keyCode == 32 ) {
    fileInput2.focus();
}
});
button2.addEventListener( "click", function( event ) {
fileInput2.focus();
return false;
});
fileInput2.addEventListener( "change", function( event ) {
the_return2.innerHTML = this.value;
});

/*----------Four FIle--------------------*/

var fileInput3  = document.querySelector( "#my-file-3" ),
button3     = document.querySelector( "#input-file-trigger-3" ),
the_return3 = document.querySelector("#file-return-3");

button3.addEventListener( "keydown", function( event ) {
if ( event.keyCode == 13 || event.keyCode == 32 ) {
    fileInput3.focus();
}
});
button3.addEventListener( "click", function( event ) {
fileInput3.focus();
return false;
});
fileInput3.addEventListener( "change", function( event ) {
the_return3.innerHTML = this.value;
});




/*----------New Added FIle--------------------*/
var fileInput4  = document.querySelector( "#my-file-4" ),
button4     = document.querySelector( "#input-file-trigger-4" ),
the_return4 = document.querySelector("#file-return-4");

button4.addEventListener( "keydown", function( event ) {
if ( event.keyCode == 13 || event.keyCode == 32 ) {
    fileInput3.focus();
}
});
button4.addEventListener( "click", function( event ) {
fileInput3.focus();
return false;
});
fileInput4.addEventListener( "change", function( event ) {
the_return4.innerHTML = this.value;
});


var date_input = $('.date'); //our date input has the name "date"
var options = {
  format: 'mm/dd/yyyy',
  endDate: '+0d',
  todayHighlight: true,
  autoclose: true,
};
date_input.datepicker(options);

});
