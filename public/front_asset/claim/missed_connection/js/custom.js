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
    function next(){
      step++;
      $('.single_step').hide();
      $("#step_" + step).show();
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




    $("#connection_div").hide();

    $("input[name=is_direct_flight]:radio").click(function() {
      if($(this).attr("value")=="is_direct_flight_yes") {
        $("#connection_div").show(500);
      }else{
        $("#connection_div").hide(500);
      }
    });


    /* --------- Delayed Button ----------- */
    $(".show_if_flight_did_not_go_planned").hide();

    $("input[name=selected_connection_id]:radio").click(function() {
      if($(this).attr("value")=="1") {
        $(".show_if_flight_did_not_go_planned").show(500);
      }else{
        $(".show_if_flight_did_not_go_planned").hide(500);
      }
    });

    $(".show_on_what_happened_to_the_flight_selected").hide();
    // $(".show_on_canceled_flight").hide();
    $(".show_on_total_delay_selected").hide();

    $("input[name=what_happened_to_the_flight]:radio").click(function() {
      if($(this).attr("value")=="delayed_flight") {
          $(".show_on_what_happened_to_the_flight_selected").show(500);
          // $(".show_on_canceled_flight").hide();
          $(".show_on_total_delay_selected").hide();
      }else if ($(this).attr("value")=="canceled_flight") {
          $(".show_on_what_happened_to_the_flight_selected").show(500);
          // $(".show_on_canceled_flight").show(500);
          $(".show_on_total_delay_selected").hide();
      }else if ($(this).attr("value")=="denied_boarding") {
        $(".show_on_what_happened_to_the_flight_selected").show(500);
        // $(".show_on_canceled_flight").show(500);
        $(".show_on_total_delay_selected").hide();
      }
    });

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


    $(".show_on_is_rerouted_no").hide();
    $(".accommodation").hide();
    $("input[name=is_rerouted]:radio").click(function() {
      if($(this).attr("value")=="is_rerouted_yes") {
          $(".show_on_is_rerouted_no").hide(500);
          $(".show_on_is_obtained_full_reimbursement_no").hide(500);
          $(".accommodation").show(500);
      }else if ($(this).attr("value")=="is_rerouted_no") {
          $(".show_on_is_rerouted_no").show(500);
          $(".accommodation").hide();
      }else {
          $(".show_on_is_rerouted_no").hide(500);
          $(".show_on_is_obtained_full_reimbursement_no").hide(500);
          $(".accommodation").hide();
      }
    });


    $(".show_on_is_obtained_full_reimbursement_no").hide();

    $("input[name=is_obtained_full_reimbursement]:radio").click(function() {
      if($(this).attr("value")=="is_obtained_full_reimbursement_yes") {
        $(".show_on_is_obtained_full_reimbursement_no").hide(500);
        $(".accommodation").show(500);
      }else if ($(this).attr("value")=="is_obtained_full_reimbursement_no") {
        $(".show_on_is_obtained_full_reimbursement_no").show(500);
        $(".accommodation").hide();
      }else {
        $(".show_on_is_obtained_full_reimbursement_no").hide(500);
        $(".accommodation").hide();
      }
    });


    $(".show_on_is_paid_for_rerouting_yes").hide();

    $("input[name=is_paid_for_rerouting]:radio").click(function() {
      if($(this).attr("value")=="is_paid_for_rerouting_yes") {
        $(".show_on_is_paid_for_rerouting_yes").show(500);
        $(".accommodation").hide();
      }else if ($(this).attr("value")=="is_paid_for_rerouting_no") {
        $(".show_on_is_paid_for_rerouting_yes").hide(500);
        $(".accommodation").show(500);
      }else {
        $(".show_on_is_paid_for_rerouting_yes").hide(500);
        $(".accommodation").show(500);
      }
    });


    $(".show_if_contacted_airline").hide();

    $("input[name=is_contacted_airline]:radio").click(function() {
      if($(this).attr("value")=="1") {
        $(".show_if_contacted_airline").show(500);
      }else if ($(this).attr("value")=="2") {
        $(".show_if_contacted_airline").hide(500);
      }else {
        $(".show_if_contacted_airline").hide(500);
      }
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
      $(".show_on_is_booking_reference_yes").hide();
      $("input[name=is_booking_reference]:radio").click(function() {
        if($(this).attr("value")=="is_booking_reference_yes") {
          $(".show_on_is_booking_reference_yes").show(500);
        }else if ($(this).attr("value")=="is_booking_reference_no") {
          $(".show_on_is_booking_reference_yes").hide(500);
        }
      });

      $(document).on('click','.remove_reference',function(){
        var id = $(this).attr('id');
      $("#reference_remove_"+id).remove();
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



});
