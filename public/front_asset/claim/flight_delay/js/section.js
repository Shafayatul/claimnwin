$(".show_on_total_delay_radio_selected").hide();
$(".show_on_total_cancel_radio_selected").hide();
$(".show_on_canceled_flight").hide();
$(".show_on_delayed_flight").hide();
$(".show_on_canceled_flight_notify").hide();

$(".show_on_total_cancel_radio_selected").hide();

$("input[name=what_happened_flight_radio]:radio").click(function(){
    if($(this).attr("value") == 1){
        $(".show_on_delayed_flight").show(500);
        $(".show_on_canceled_flight").hide();
        $(".show_on_total_delay_radio_selected").hide();
        $(".show_on_total_cancel_radio_selected").hide();
        $(".show_on_canceled_flight_notify").hide(500);
        $("input[name=total_delay_radio]:radio").prop("checked",false);
        $("input[name=total_delay_radio_1]:radio").prop("checked",false);
        $("input[name=total_cancel_radio_notify]:radio").prop('checked',false);
    }

    if($(this).attr("value") == 2){
        $(".show_on_canceled_flight").show(500);
        $(".show_on_delayed_flight").hide(500);

        $(".show_on_total_delay_radio_selected").hide();

        $("input[name=total_delay_radio]:radio").prop("checked",false);
        $("input[name=total_delay_radio_1]:radio").prop("checked",false);
        $("input[name=total_cancel_radio_notify]:radio").prop('checked',false);
        $("input[name=total_delay_radio]:radio").click(function(){
            if($(this).attr("value") == 1){
                $(".show_on_canceled_flight_notify").show();
                $(".show_on_total_delay_radio_selected").hide();
            }
        
            if($(this).attr("value") == 2){
                $(".show_on_canceled_flight_notify").show();
                $(".show_on_total_delay_radio_selected").hide();
            }
            if($(this).attr("value") == 3){
                $(".show_on_canceled_flight_notify").show();
                $(".show_on_total_delay_radio_selected").hide();
            }
            if($(this).attr("value") == 4){
                $(".show_on_canceled_flight_notify").show();
                $(".show_on_total_delay_radio_selected").hide();
            }
        
        });

        $("input[name=total_cancel_radio_notify]:radio").click(function(){
            if($(this).attr("value") == 1){
                $(".show_on_total_cancel_radio_selected").show(500);
            }
        
            if($(this).attr("value") == 2){
                $(".show_on_total_cancel_radio_selected").show(500);
            }
        
        });
    }
    if($(this).attr("value") == 3){
        $(".show_on_delayed_flight").show(500);
        $(".show_on_canceled_flight").hide();
        $(".show_on_total_delay_radio_selected").hide();
        $(".show_on_total_cancel_radio_selected").hide();
        $(".show_on_canceled_flight_notify").hide(500);
        $("input[name=total_delay_radio]:radio").prop("checked",false);
        $("input[name=total_delay_radio_1]:radio").prop("checked",false);
        $("input[name=total_cancel_radio_notify]:radio").prop('checked',false);
    }
});


$("input[name=total_delay_radio_1]:radio").click(function(){
    if($(this).attr("value") == 1){
        $(".show_on_total_delay_radio_selected").show();
        $(".show_on_total_cancel_radio_selected").hide();
    }

    if($(this).attr("value") == 2){
        $(".show_on_total_delay_radio_selected").show();
        $(".show_on_total_cancel_radio_selected").hide();
    }
    if($(this).attr("value") == 3){
        $(".show_on_total_delay_radio_selected").show();
        $(".show_on_total_cancel_radio_selected").hide();
    }
    if($(this).attr("value") == 4){
        $(".show_on_total_delay_radio_selected").show();
        $(".show_on_total_cancel_radio_selected").hide();
    }

});





