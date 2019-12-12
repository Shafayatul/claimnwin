$(document).ready(function(){

    console.log(window.location.pathname);

    var itter_val = $("#check_itter").val();
    if(itter_val != ''){
        $("#itter").show(500);
    }else{
        $("#itter").hide(500);
    }

    var affiliate_user_check_id = $("#is_affiliate_user").val();
    console.log(affiliate_user_check_id);
    if(affiliate_user_check_id != ''){
        $("#remove-after-delete-affiliate").show(500);
        $("#no-notification").hide(500);
    }else{
        $("#remove-after-delete-affiliate").hide(500);
        $("#no-notification").show(500);
    }

    var cehck_affiliate_user_id = $("#cehck_affiliate_user_id").val();
    console.log(cehck_affiliate_user_id);
    if(cehck_affiliate_user_id != ''){
        $("#affiliate_infos-delete-form").show(500);
        $("#affiliate_infos-update-form-1").show(500);
        $("#affiliate_infos-update-form-2").hide(500);
    }else{
        $("#affiliate_infos-delete-form").hide(500);
        $("#affiliate_infos-update-form-1").hide(500);
        $("#affiliate_infos-update-form-2").show(500);
    }

    var ticket_status = $("#ticket_status").val();
    console.log(ticket_status);
    if(ticket_status == 3){
        $("#description-design").hide(500);
    }else{
        $("#description-design").show(500);
    }

$(document).on('click', '#affiliate_info_update_2', function(){
    var affiliate_user_owner = $("#affi_user_owner_2").val();
    var claim_id = $("#claim_id_for_update_2").val();
    var commision_amount = $("#commision-info-2").val();
    var percentage = $("#percentage-2").val();
    var received_amount = $("#received-amount-2").val();
    var payment_method = $("#payment-method-2").val();
    var addition_description = $("#addition-description-2").val();
    var approved = $("#approved-2").val();
    var payment_done = $("#is-payment-done-2").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        type : 'POST',
        url : '/claim-ajax-update-without-user-affilite-info',
        data : {
            affiliate_user_owner : affiliate_user_owner,
            claim_id : claim_id,
            commision_amount : commision_amount,
            percentage : percentage,
            received_amount : received_amount,
            payment_method : payment_method,
            addition_description : addition_description,
            approved : approved,
            payment_done : payment_done
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> `+response.msg+`
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

            $('#msgs').html(html);

            
            $("#affiliate_user_id").html(response.affiliate_user.id);
            $("#affiliate_user_name").html(response.affiliate_user.name);
            $("#affiliate_user_email").html(response.affiliate_user.email);

            $("#commision-info-1").val(response.affiliate.commision_amount);
            $("#claim_id_for_update_1").val(response.affiliate.claim_id);
            $("#affiliate_id_for_update_1").val(response.affiliate.id);
            $("#percentage-1").val(response.affiliate.percentage);
            $("#received-amount-1").val(response.affiliate.received_amount);
            $("#payment-method-1").val(response.affiliate.payment_method);
            $("#addition-description-1").val(response.affiliate.addition_description);
            // $("#approved").val(0);
            $('#approved-1').prop('selectedIndex', response.affiliate.approved);
            // $("#is_payment_done").val(0);
            $('#is-payment-done-1').prop('selectedIndex', response.affiliate.is_payment_done);
            tableh2ShowHideForUpdate();
            formShowHideforUpdate();

            $("#cehck_affiliate_user_id").val(response.affiliate_user.id);
            $("#affiliate_user_check_id").val(response.affiliate_user.id);
        }
    });
});
function formShowHideforUpdate(){
    $("#affiliate_infos-update-form-1").show(500);
    $("#affiliate_infos-update-form-2").hide(500);
    $("#affiliate_infos-delete-form").show(500);

}

function tableh2ShowHideForUpdate(){
    $("#remove-after-delete-affiliate").show(500);
    $("#no-notification").hide(500);
}


$(document).on('click', '#affiliate_info_update_1', function(){
    var commision_info = $("#commision-info-1").val();
    var affiliate_id = $("#affiliate_id_for_update_1").val();
    var claim_id = $("#claim_id_for_update_1").val();
    var percentage = $("#percentage-1").val();
    var received_amount = $("#received-amount-1").val();
    var payment_method = $("#payment-method-1").val();
    var addition_description = $("#addition-description-1").val();
    var approved = $("#approved-1").val();
    var payment_done = $("#is-payment-done-1").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        type : 'POST',
        url : '/claim-ajax-update-with-user-affilite-info',
        data : {
            commision_amount : commision_info,
            affiliate_id : affiliate_id,
            claim_id : claim_id,
            percentage : percentage,
            received_amount : received_amount,
            payment_method : payment_method,
            addition_description : addition_description,
            approved : approved,
            payment_done : payment_done
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> `+response.msg+`
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

            $('#msgs').html(html);
            $("#commision-info-1").val(response.affiliate.commision_amount);
            $("#percentage-1").val(response.affiliate.percentage);
            $("#received-amount-1").val(response.affiliate.received_amount);
            $("#payment-method-1").val(response.affiliate.payment_method);
            $("#addition-description-1").val(response.affiliate.addition_description);
            // $("#approved").val(0);
            $('#approved-1').prop('selectedIndex', response.affiliate.approved);
            // $("#is_payment_done").val(0);
            $('#is-payment-done-1').prop('selectedIndex', response.affiliate.is_payment_done);

        }
    });
});

$(document).on('click', '#delete-affiliate', function(){

    var affiliate_id = $("#affiliate_id").val();
    var claim_id = $("#claim_id_for_affiliate").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        type : 'POST',
        url : '/claim-ajax-delete-affilite',
        data : {
            affiliate_id : affiliate_id,
            claim_id : claim_id
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> `+response.msg+`
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

            $('#msgs').html(html);
            
            $("#commision-info-1").val('');
            $("#percentage-1").val('');
            $("#received-amount-1").val('');
            $("#payment-method-1").val('');
            $("#addition-description-1").val('');
            $('#approved-1').prop('selectedIndex', 0);
            $('#is-payment-done-1').prop('selectedIndex', 0);
            tableh2ShowHideForDelete();
            formShowHideforDelete();
        }
    });
});

function formShowHideforDelete(){
    $("#affiliate_infos-update-form-1").hide(500);
    $("#affiliate_infos-update-form-2").show(500);
    $("#affiliate_infos-delete-form").hide(500);
}

function tableh2ShowHideForDelete(){
    $("#no-notification").show(500);
    $("#remove-after-delete-affiliate").hide(500);
}

$(document).on('click', '#claim-status-submit', function(){
    var status_name        = $("#status_name").val();
    var status_description = $("#status_description").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        type : 'POST',
        url : '/claim-ajax-status-create',
        data : {
            status_name : status_name,
            status_description : status_description
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> `+response.msg+`
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

            $('#msgs').html(html);
            $("#add-status").modal("hide");
            $("#status_name").val('');
            $("#status_description").val('');
            console.log(response.claim_status);
            if(response.claim_status != null){
                var html1 = '<option value="'+response.claim_status.id+'" id="claim-status-list">'+response.claim_status.name+'</option>';
                $("#claim_status").append(html1);
            }else{
                $("#claim-status-list").show();
            }
            
        }
    });
});

$(document).on('click', '#status_btn', function(){
    var claim_id     = $("#claim_id_for_status").val();
    var claim_status = $("#claim_status").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        type : 'POST',
        url : '/claim-ajax-nextstep-status-change',
        data : {
            claim_id : claim_id,
            claim_status : claim_status
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> `+response.msg+`
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

            $('#msgs').html(html);
        }
    });
});

$(document).on('click', '#required-details-submit', function(){
   var claim_id                   = $("#claim_id_required").val();
   var bank_details_id            = $("#bank_details_id").val();
   var affiliate_commision        = $("#affiliate_commision").val();
   var admin_commision            = $("#admin_commision").val();
   var additional_details_for_lba = $("#additional_details_for_lba").val();
   var amount                     = $("#amount").val();
   var received_amount            = $("#received_amount").val();
   var caa_ref                    = $("#caa_ref").val();
   var adr_ref                    = $("#adr_ref").val();
   var airline_ref                = $("#airline_ref").val();
   var court_no                   = $("#court_no").val();
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
   $.ajax({
        url : '/claim-ajax-required-details',
        type : 'POST',
        data : {
            claim_id : claim_id,
            bank_details_id : bank_details_id,
            affiliate_commision : affiliate_commision,
            admin_commision : admin_commision,
            additional_details_for_lba : additional_details_for_lba,
            amount : amount,
            received_amount : received_amount,
            caa_ref : caa_ref,
            adr_ref : adr_ref,
            airline_ref : airline_ref,
            court_no : court_no,
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> `+response.msg+`
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

            $('#msgs').html(html);
            $("#claim_id_required").val(response.claim.id);
            $("#bank_details_id").val(response.claim.bank_details_id);
            $("#affiliate_commision").val(response.claim.affiliate_commision);
            $("#admin_commision").val(response.claim.admin_commision);
            $("#additional_details_for_lba").val(response.claim.additional_details_for_lba);
            $("#amount").val(response.claim.amount);
            $("#received_amount").val(response.claim.received_amount);
            $("#caa_ref").val(response.claim.caa_ref);
            $("#adr_ref").val(response.claim.adr_ref);
            $("#airline_ref").val(response.claim.airline_ref);
            $("#court_no").val(response.claim.court_no);
            $("#converted_expection_amount").val(response.claim.converted_expection_amount);
        }
   });
});

$(document).on('click', '.dismiss', function(){
    var reminder_id = $(this).attr('id');
    $.ajax({
        url : '/claim-ajax-dismiss-status-reminder',
        data : {
            reminder_id : reminder_id
        },
        type : 'GET',
        success:function(response){
            $("#myModalSchedule").modal("hide"); 
            if (response.msg == "Success") {
                var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> `+response.msg+`
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;

                $('#msgs').html(html);
                $("#reminder-status-"+response.reminder.id).html(response.reminder.status);
                $("#reminder-model-"+response.reminder.id).modal("hide");
            }
        }
    });
});

$(document).on('click', '.mark-as-done', function(){
    var reminder_id = $(this).attr('id');
    $.ajax({
        url : '/claim-ajax-markasdone-status-reminder',
        data : {
            reminder_id : reminder_id
        },
        type : 'GET',
        success:function(response){
            $("#myModalSchedule").modal("hide"); 
            if (response.msg == "Success") {
                var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> `+response.msg+`
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;

                $('#msgs').html(html);
                $("#reminder-status-"+response.reminder.id).html(response.reminder.status);
                $("#reminder-model-"+response.reminder.id).modal("hide");
            }
        }
    });
});



$(document).on('click', '.delete-reminder', function(){
    var reminder_id = $(this).attr('id');
    $.ajax({
        url : '/claim-ajax-delete-reminder',
        data : {
            reminder_id : reminder_id
        },
        type : 'GET',
        success:function(response){
            if (response.msg == "Success") {
                var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> `+response.msg+`
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;

                $('#msgs').html(html);
                $("#reminder-update-"+reminder_id).hide(500);
            }
        }
    });
});

$(document).on('click', '#compose-customer-data', function(){
var from_name    = $("#from_name").val();
var from_email   = $("#from_email").val();
var to_email     = $("#to_email").val();
var sub          = $("#sub").val();
// var compose_text = $("textarea.composes_text").val();
var compose_text = tinyMCE.get('my_editor').getContent();
var claim_id     = $("#claim_id").val();
var form_data = new FormData();
var totalfiles = document.getElementById('compose_files').files.length;
for (var index = 0; index < totalfiles; index++) {
    form_data.append("compose_files[]", document.getElementById('compose_files').files[index]);
}
form_data.append('claim_id', claim_id);
form_data.append('from_name', from_name);
form_data.append('from_email', from_email);
form_data.append('to_email', to_email);
form_data.append('sub', sub);
form_data.append('compose_text', compose_text);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});
$.ajax({
    url: "/claim-ajax-compose-customer-data",
    type: 'POST',
    data: form_data,
    contentType: false,
    processData: false,
    success: function(response){
        if (response.msg == "Success") {

         var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> `+response.msg+`
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

            $('#msgs').html(html);
            $("#sub").val('');
            $("#compose_files").val('');
            tinymce.get('my_editor').setContent('');
            $('#template').val(0);
        } else {
            $('#msgs').html("<div class='alert alert-success'>Please Insert Vaild Data</div>");
        }
    }
});

});

//Airline Compose data
$(document).on('click', '#airline-compose-data', function(){
var from_name    = $("#from_name").val();
var from_email   = $("#from_email").val();
var to_email     = $("#to_email").val();
var sub          = $("#airline_sub").val();
// var compose_text = $("textarea.composes_text").val();
var compose_text = tinyMCE.get('airline_editor').getContent();
var claim_id     = $("#claim_id").val();
var form_data = new FormData();
var totalfiles = document.getElementById('airline_compose_files').files.length;
for (var index = 0; index < totalfiles; index++) {
    form_data.append("airline_compose_files[]", document.getElementById('airline_compose_files').files[index]);
}
form_data.append('claim_id', claim_id);
form_data.append('from_name', from_name);
form_data.append('from_email', from_email);
form_data.append('to_email', to_email);
form_data.append('sub', sub);
form_data.append('compose_text', compose_text);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});
$.ajax({
    url: "/claim-ajax-airline-compose-data",
    type: 'POST',
    data: form_data,
    contentType: false,
    processData: false,
    success: function(response){
        if (response.msg == "Success") {

         var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> `+response.msg+`
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

            $('#msgs').html(html);
            $("#airline_sub").val('');
            $("#airline_compose_files").val('');
            tinymce.get('airline_editor').setContent('');
            $('#airline-template').val(0);
        } else {
            $('#msgs').html("<div class='alert alert-success'>Please Insert Vaild Data</div>");
        }
    }
});

});

//Airline Reply data
$(document).on('click', '#airline-reply-data', function(){
var from_name    = $("#from_name").val();
var from_email   = $("#from_email").val();
var to_email     = $("#to_email").val();
var sub          = $("#airline_reply_sub").val();
// var compose_text = $("textarea.composes_text").val();
var compose_text = tinyMCE.get('airline_reply_compose_text').getContent();
var claim_id     = $("#claim_id").val();
var form_data = new FormData();
var totalfiles = document.getElementById('airline_reply_compose_files').files.length;
for (var index = 0; index < totalfiles; index++) {
    form_data.append("airline_reply_compose_files[]", document.getElementById('airline_reply_compose_files').files[index]);
}
form_data.append('claim_id', claim_id);
form_data.append('from_name', from_name);
form_data.append('from_email', from_email);
form_data.append('to_email', to_email);
form_data.append('sub', sub);
form_data.append('compose_text', compose_text);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});
$.ajax({
    url: "/claim-ajax-airline-reply-data",
    type: 'POST',
    data: form_data,
    contentType: false,
    processData: false,
    success: function(response){
        if (response.msg == "Success") {

         var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                <strong>Success!</strong> `+response.msg+`
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

            $('#msgs').html(html);
            $("#airline_reply_sub").val('');
            $("#airline_reply_compose_files").val('');
            tinymce.get('airline_reply_compose_text').setContent('');
        } else {
            $('#msgs').html("<div class='alert alert-success'>Please Insert Vaild Data</div>");
        }
    }
});

});
    
    $(document).on('click', '#reminder-1', function(){
        var callback_date = $("#callback_date").val();
        var callback_time = $("#callback_time").val();
        var note          = $("#note").val();
        var claim_id      = $("#claim_id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        if(callback_date !== null){
        $.ajax({
            url: "/claim-ajax-reminder-create",
            type: 'POST',
            data: {
                callback_date : callback_date,
                callback_time : callback_time,
                note : note,
                claim_id : claim_id,
            },
            success: function(response){
                console.log(response);
                if (response.msg == "Success") {

                 var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                        <strong>Success!</strong> `+response.msg+`
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`;
                    $('#msgs').html(html);

                    if(response.reminder)
                    {
                     var html1 = '<tr id="reminder-update-'+response.reminder.id+'">';

                    html1 += '<td>'+response.reminder.claim_id+'</td>';
                    html1 += '<td id="reminder-status-'+response.reminder.id+'">'+response.reminder.status+'</td>';
                    html1 += '<td>'+response.reminder.callback_date+' '+response.reminder.callback_time+'</td>';
                    html1 += '<td>'+response.reminder.snooze+'</td>';
                    html1 += '<td>'+response.reminder.note+'</td>';
                    html1 += '<td><a type="button" data-toggle="modal" class="btn btn-sm btn-primary" title="View Reminder" data-target="#reminder-model-'+response.reminder.id+'"><i class="fa fa-eye" aria-hidden="true"></i> View</a>';
                    html1 += '<a  type="button" data-toggle="modal" title="Edit Reminder" class="btn btn-sm btn-dark reminder-edit-view" data-target="#reminder-edit-model-'+response.reminder.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
                    var csrf2 = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<form action="/claim-ajax-delete-reminder/'+response.reminder.id+'" method="POST">';
                    html1 += '<input type="hidden" name="_method" value="DELETE"/>';
                    html1 += '<input type="hidden" name="_token" value="'+csrf2+'"/>';
                    html1 += '<button type="button" class="btn btn-sm btn-danger delete-reminder" title="Delete Reminder" id="'+response.reminder.id+'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    html1 += '</form>';

                    html1 += '<div id="reminder-model-'+response.reminder.id+'" class="modal fade" role="dialog">';
                    html1 += '<div class="modal-dialog"><div class="modal-content"><div class="modal-header">';
                    html1 += '<button type="button" class="close" data-dismiss="modal">&times;</button>';
                    html1 += '<a type="button" id="'+response.reminder.id+'" class="btn btn-sm btn-success dismiss">Dismiss</a>';
                    html1 += '<a  class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModalSchedule-'+response.reminder.id+'" data-dismiss="modal">Reschedule</a>';
                    html1 += '<a href="#" class="btn btn-sm btn-success">Snooze</a>';
                    html1 += '<a type="button" id="'+response.reminder.id+'" class="btn btn-sm btn-success mark-as-done">Mark as done</a>';
                    html1 += '<a href="/claim-view/'+response.reminder.claim_id+'" class="btn btn-sm btn-primary">View Claim</a></div>';
                    html1 += '<div class="modal-body"><div class="row"><div class="col-md-12">';
                    html1 += '<p style="font-weight:bold;">DEPARTED FROM: <span style="font-weight:normal;">'+response.reminderDeparted.name+'</span></p>';
                    html1 += '<p style="font-weight:bold;">FINAL DESTINATION: <span style="font-weight:normal;">'+response.reminderfinalDestination.name+'</span></p>';
                    var check = response.reminder_claims.is_direct_flight == 0 ? 'No' : 'Yes';
                    html1 += '<p style="font-weight:bold;">Did you have any connecting flights?:<span style="font-weight:normal;">'+check+'</span></p>';
                    html1 += '<p style="font-weight:bold;">What happened to the flight?:<span style="font-weight:normal;">'+response.reminder_claims.what_happened_to_the_flight+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Date of '+response.reminder_claims.claim_table_type+':  <span style="font-weight:normal;">'+response.reminder_claims.created_at+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Airline:  <span style="font-weight:normal;">'+response.airline.name+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Flight no:  <span style="font-weight:normal;">'+response.flightDetails.flight_number+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Departure date:  <span style="font-weight:normal;">'+response.flightDetails.departure_date+'</span></p><hr>';
                    html1 += '<div class="row"><div class="col-md-12"><h4 style="font-weight:bold;">Passenger List</h4><table class="table table-borderless table-hover"><thead><th style="font-weight:bold;">First Name</th><th style="font-weight:bold;">Last Name</th><th style="font-weight:bold;">Ticket No</th></thead><tbody>';
                    $.each(response.passengers, function(i, val){
                        html1 += '<tr>';
                        html1 += '<td>'+val.first_name+'</td>';
                        html1 += '<td>'+val.last_name+'</td>';
                        html1 += '<td></td>';
                        html1 += '</tr>';
                    })
                    html1 += '</tbody></table></div></div>';
                    html1 += '<p style="font-weight:bold;">Status:  <span style="font-weight:normal;">'+response.reminder.status+'</span></p>'
                    html1 += '</div></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>';

                    

                    html1 += '<div id="reminder-edit-model-'+response.reminder.id+'" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Set Reminder</h4></div>';
                    html1 += '<div class="modal-body"><form action="/claim-ajax-update-reminder" method="post">';
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<input type="hidden" name="_token" value="'+csrf+'" >';
                    html1 += '<div class="row"><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Date</label><input type="date" name="callback_date" class="form-control" id="exampleInputEmail1" value="'+response.reminder.callback_date+'"  placeholder="Enter email"><input type="hidden" name="id" id="reminder_id_'+response.reminder.id+'" value="'+response.reminder.id+'"></div></div><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Time</label><input type="time" name="callback_time" class="form-control" value="'+response.reminder.callback_time+'" id="exampleInputEmail1"  placeholder="Enter email"></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><div class="form-group"><label for="exampleInputEmail1" class="control-label">Note</label><textarea name="note" class="form-control" id="exampleInputEmail1" cols="30" rows="3">'+response.reminder.note+'</textarea></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><button type="button" id="update-reminder-5" class="btn btn-success">Reminder</button></div></div>';
                    html1 += '</form>';
                    html1 += '</div><div class="modal-footer"></div></div></div></div>';
                    html1 += '<div id="myModalSchedule-'+response.reminder.id+'" class="modal fade" role="dialog">';
                    html1 += '<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Set Reminder</h4></div>';
                    html1 += '<div class="modal-body"><form action="/claim-ajax-update-reminder" method="post">';
                    var csrf1 = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<input type="hidden" name="_token" value="'+csrf1+'" >';
                    html1 += '<div class="row"><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Date</label><input type="date" name="callback_date" class="form-control" id="reschedule_callback_date_'+response.reminder.id+'" value="'+response.reminder.callback_date+'"  placeholder="Enter email"><input type="hidden" name="id" value="'+response.reminder.id+'"></div></div><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Time</label><input type="time" name="callback_time" class="form-control" value="'+response.reminder.callback_time+'" id="reschedule_callback_time_'+response.reminder.id+'"  placeholder="Enter email"></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><div class="form-group"><label for="exampleInputEmail1" class="control-label">Note</label><textarea name="note" class="form-control" id="reschedule_note_'+response.reminder.id+'" cols="30" rows="3">'+response.reminder.note+'</textarea></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><button type="button" id="'+response.reminder.id+'" class="btn btn-success reschedule-reminder">Reminder</button></div></div>';
                    html1 += '</form>';
                    html1 += '</div><div class="modal-footer"></div></div></div></div>';                  
                     
                     $('#reminder-data').prepend(html1);
                     $('#add_details')[0].reset();
                    }

                    $("#myModal").modal("hide"); 

                } else {
                    $('#msgs').html("<div class='alert alert-success'>Please Insert Vaild Data</div>");
                }
            } 
        });
        }
    });

    $(document).on('click', '.update-reminder', function(){

        var reminder_id   = $(this).attr('id');
        var callback_date = $("#callback_date_"+reminder_id).val();
        var callback_time = $("#callback_time_"+reminder_id).val();
        var note          = $("#note_"+reminder_id).val();
        $("#reminder-edit-model-"+reminder_id).modal("hide");
        console.log(callback_date);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        if(callback_date !== null){
        $.ajax({
            url: "/claim-ajax-update-reminder",
            type: 'POST',
            data: {
                callback_date : callback_date,
                callback_time : callback_time,
                note : note,
                reminder_id : reminder_id,
            },
            success: function(response){

                console.log(response);
                if (response.msg == "Success") {

                 var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                        <strong>Success!</strong> `+response.msg+`
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`;
                    $('#msgs').html(html);

                    if(response.reminder)
                    {

                var html1 = '<td>'+response.reminder.claim_id+'</td>';
                    html1 += '<td id="reminder-status-'+response.reminder.id+'">'+response.reminder.status+'</td>';
                    html1 += '<td>'+response.reminder.callback_date+' '+response.reminder.callback_time+'</td>';
                    html1 += '<td>'+response.reminder.snooze+'</td>';
                    html1 += '<td>'+response.reminder.note+'</td>';
                    html1 += '<td><a type="button" data-toggle="modal" class="btn btn-sm btn-primary" title="View Reminder" data-target="#reminder-model-'+response.reminder.id+'"><i class="fa fa-eye" aria-hidden="true"></i> View</a>';
                    html1 += '<a  type="button" data-toggle="modal" title="Edit Reminder" class="btn btn-sm btn-dark reminder-edit-view" data-target="#reminder-edit-model-'+response.reminder.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
                    var csrf2 = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<form action="/claim-ajax-delete-reminder/'+response.reminder.id+'" method="POST">';
                    html1 += '<input type="hidden" name="_method" value="DELETE"/>';
                    html1 += '<input type="hidden" name="_token" value="'+csrf2+'"/>';
                    html1 += '<button type="button" class="btn btn-sm btn-danger delete-reminder" title="Delete Reminder" id="'+response.reminder.id+'"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>';
                    html1 += '</form>';

                    html1 += '<div id="reminder-model-'+response.reminder.id+'" class="modal fade" role="dialog">';
                    html1 += '<div class="modal-dialog"><div class="modal-content"><div class="modal-header">';
                    html1 += '<button type="button" class="close" data-dismiss="modal">&times;</button>';
                    html1 += '<a type="button" id="'+response.reminder.id+'" class="btn btn-sm btn-success dismiss">Dismiss</a>';
                    html1 += '<a  class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModalSchedule-'+response.reminder.id+'" data-dismiss="modal">Reschedule</a>';
                    html1 += '<a href="#" class="btn btn-sm btn-success">Snooze</a>';
                    html1 += '<a type="button" id="'+response.reminder.id+'" class="btn btn-sm btn-success mark-as-done">Mark as done</a>';
                    html1 += '<a href="/claim-view/'+response.reminder.claim_id+'" class="btn btn-sm btn-primary">View Claim</a></div>';
                    html1 += '<div class="modal-body"><div class="row"><div class="col-md-12">';
                    html1 += '<p style="font-weight:bold;">DEPARTED FROM: <span style="font-weight:normal;">'+response.reminderDeparted.name+'</span></p>';
                    html1 += '<p style="font-weight:bold;">FINAL DESTINATION: <span style="font-weight:normal;">'+response.reminderfinalDestination.name+'</span></p>';
                    var check = response.reminder_claims.is_direct_flight == 0 ? 'No' : 'Yes';
                    html1 += '<p style="font-weight:bold;">Did you have any connecting flights?:<span style="font-weight:normal;">'+check+'</span></p>';
                    html1 += '<p style="font-weight:bold;">What happened to the flight?:<span style="font-weight:normal;">'+response.reminder_claims.what_happened_to_the_flight+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Date of '+response.reminder_claims.claim_table_type+':  <span style="font-weight:normal;">'+response.reminder_claims.created_at+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Airline:  <span style="font-weight:normal;">'+response.airline.name+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Flight no:  <span style="font-weight:normal;">'+response.flightDetails.flight_number+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Departure date:  <span style="font-weight:normal;">'+response.flightDetails.departure_date+'</span></p><hr>';
                    html1 += '<div class="row"><div class="col-md-12"><h4 style="font-weight:bold;">Passenger List</h4><table class="table table-borderless table-hover"><thead><th style="font-weight:bold;">First Name</th><th style="font-weight:bold;">Last Name</th><th style="font-weight:bold;">Ticket No</th></thead><tbody>';
                    $.each(response.passengers, function(i, val){
                        html1 += '<tr>';
                        html1 += '<td>'+val.first_name+'</td>';
                        html1 += '<td>'+val.last_name+'</td>';
                        html1 += '<td></td>';
                        html1 += '</tr>';
                    })
                    html1 += '</tbody></table></div></div>';
                    html1 += '<p style="font-weight:bold;">Status:  <span style="font-weight:normal;">'+response.reminder.status+'</span></p>'
                    html1 += '</div></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>';

                    

                    html1 += '<div id="reminder-edit-model-'+response.reminder.id+'" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Set Reminder</h4></div>';
                    html1 += '<div class="modal-body"><form action="/claim-ajax-update-reminder" method="post">';
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<input type="hidden" name="_token" value="'+csrf+'" >';
                    html1 += '<div class="row"><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Date</label><input type="date" name="callback_date" class="form-control" id="callback_date_'+response.reminder.id+'" value="'+response.reminder.callback_date+'"  placeholder="Enter email"></div></div><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Time</label><input type="time" name="callback_time" class="form-control" value="'+response.reminder.callback_time+'" id="callback_time_'+response.reminder.id+'"  placeholder="Enter email"></div></div></div>';
                    html1 += '<input type="hidden" id="reminder_id_'+response.reminder.id+'" name="id" value="'+response.reminder.id+'">';
                    html1 += '<div class="row"><div class="col-md-12"><div class="form-group"><label for="exampleInputEmail1" class="control-label">Note</label><textarea name="note" class="form-control" id="note_'+response.reminder.id+'" cols="30" rows="3">'+response.reminder.note+'</textarea></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><button type="button" id="'+response.reminder.id+'" class="btn btn-success update-reminder">Reminder</button></div></div>';
                    html1 += '</form>';
                    html1 += '</div><div class="modal-footer"></div></div></div></div>';
                    html1 += '<div id="myModalSchedule-'+response.reminder.id+'" class="modal fade" role="dialog">';
                    html1 += '<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Set Reminder</h4></div>';
                    html1 += '<div class="modal-body"><form action="/claim-ajax-update-reminder" method="post">';
                    var csrf1 = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<input type="hidden" name="_token" value="'+csrf1+'" >';
                    html1 += '<div class="row"><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Date</label><input type="date" name="callback_date" class="form-control" id="reschedule_callback_date_'+response.reminder.id+'" value="'+response.reminder.callback_date+'"  placeholder="Enter email"><input type="hidden" name="id" value="'+response.reminder.id+'"></div></div><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Time</label><input type="time" name="callback_time" class="form-control" value="'+response.reminder.callback_time+'" id="reschedule_callback_time_'+response.reminder.id+'"  placeholder="Enter email"></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><div class="form-group"><label for="exampleInputEmail1" class="control-label">Note</label><textarea name="note" class="form-control" id="reschedule_note_'+response.reminder.id+'" cols="30" rows="3">'+response.reminder.note+'</textarea></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><button type="button" id="'+response.reminder.id+'" class="btn btn-success reschedule-reminder">Reminder</button></div></div>';
                    html1 += '</form>';
                    html1 += '</div><div class="modal-footer"></div></div></div></div>';                  
                    html1 += '</td>';                  
                     
                     $('#reminder-update-'+reminder_id).html(html1);
                     $('#add_details')[0].reset();
                    }
                } else {
                    $('#msgs').html("<div class='alert alert-success'>Please Insert Vaild Data</div>");
                }
            } 
        });
        }
    });


$(document).on('click', '.reschedule-reminder', function(){
        var reminder_id   = $(this).attr('id');
        var callback_date = $("#reschedule_callback_date_"+reminder_id).val();
        var callback_time = $("#reschedule_callback_time_"+reminder_id).val();
        var note          = $("#reschedule_note_"+reminder_id).val();
        $("#myModalSchedule-"+reminder_id).modal("hide");
        $("#reminder-edit-model-"+reminder_id).modal("hide");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        if(callback_date !== null){
        $.ajax({
            url: "/claim-ajax-update-reminder",
            type: 'POST',
            data: {
                callback_date : callback_date,
                callback_time : callback_time,
                note : note,
                reminder_id : reminder_id,
            },
            success: function(response){

                console.log(response);
                if (response.msg == "Success") {

                 var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                        <strong>Success!</strong> `+response.msg+`
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`;
                    $('#msgs').html(html);

                    if(response.reminder)
                    {

                var html1 = '<td>'+response.reminder.claim_id+'</td>';
                    html1 += '<td id="reminder-status-'+response.reminder.id+'">'+response.reminder.status+'</td>';
                    html1 += '<td>'+response.reminder.callback_date+' '+response.reminder.callback_time+'</td>';
                    html1 += '<td>'+response.reminder.snooze+'</td>';
                    html1 += '<td>'+response.reminder.note+'</td>';
                    html1 += '<td><a type="button" data-toggle="modal" class="btn btn-sm btn-primary" title="View Reminder" data-target="#reminder-model-'+response.reminder.id+'"><i class="fa fa-eye" aria-hidden="true"></i> View</a>';
                    html1 += '<a  type="button" data-toggle="modal" title="Edit Reminder" class="btn btn-sm btn-dark reminder-edit-view" data-target="#reminder-edit-model-'+response.reminder.id+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
                    var csrf2 = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<form action="/claim-ajax-delete-reminder/'+response.reminder.id+'" method="POST">';
                    html1 += '<input type="hidden" name="_method" value="DELETE"/>';
                    html1 += '<input type="hidden" name="_token" value="'+csrf2+'"/>';
                    html1 += '<button type="button" class="btn btn-sm btn-danger delete-reminder" title="Delete Reminder" id="'+response.reminder.id+'"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>';
                    html1 += '</form>';

                    html1 += '<div id="reminder-model-'+response.reminder.id+'" class="modal fade" role="dialog">';
                    html1 += '<div class="modal-dialog"><div class="modal-content"><div class="modal-header">';
                    html1 += '<button type="button" class="close" data-dismiss="modal">&times;</button>';
                    html1 += '<a type="button" id="'+response.reminder.id+'" class="btn btn-sm btn-success dismiss">Dismiss</a>';
                    html1 += '<a  class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModalSchedule-'+response.reminder.id+'" data-dismiss="modal">Reschedule</a>';
                    html1 += '<a href="#" class="btn btn-sm btn-success">Snooze</a>';
                    html1 += '<a type="button" id="'+response.reminder.id+'" class="btn btn-sm btn-success mark-as-done">Mark as done</a>';
                    html1 += '<a href="/claim-view/'+response.reminder.claim_id+'" class="btn btn-sm btn-primary">View Claim</a></div>';
                    html1 += '<div class="modal-body"><div class="row"><div class="col-md-12">';
                    html1 += '<p style="font-weight:bold;">DEPARTED FROM: <span style="font-weight:normal;">'+response.reminderDeparted.name+'</span></p>';
                    html1 += '<p style="font-weight:bold;">FINAL DESTINATION: <span style="font-weight:normal;">'+response.reminderfinalDestination.name+'</span></p>';
                    var check = response.reminder_claims.is_direct_flight == 0 ? 'No' : 'Yes';
                    html1 += '<p style="font-weight:bold;">Did you have any connecting flights?:<span style="font-weight:normal;">'+check+'</span></p>';
                    html1 += '<p style="font-weight:bold;">What happened to the flight?:<span style="font-weight:normal;">'+response.reminder_claims.what_happened_to_the_flight+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Date of '+response.reminder_claims.claim_table_type+':  <span style="font-weight:normal;">'+response.reminder_claims.created_at+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Airline:  <span style="font-weight:normal;">'+response.airline.name+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Flight no:  <span style="font-weight:normal;">'+response.flightDetails.flight_number+'</span></p>';
                    html1 += '<p style="font-weight:bold;">Departure date:  <span style="font-weight:normal;">'+response.flightDetails.departure_date+'</span></p><hr>';
                    html1 += '<div class="row"><div class="col-md-12"><h4 style="font-weight:bold;">Passenger List</h4><table class="table table-borderless table-hover"><thead><th style="font-weight:bold;">First Name</th><th style="font-weight:bold;">Last Name</th><th style="font-weight:bold;">Ticket No</th></thead><tbody>';
                    $.each(response.passengers, function(i, val){
                        html1 += '<tr>';
                        html1 += '<td>'+val.first_name+'</td>';
                        html1 += '<td>'+val.last_name+'</td>';
                        html1 += '<td></td>';
                        html1 += '</tr>';
                    })
                    html1 += '</tbody></table></div></div>';
                    html1 += '<p style="font-weight:bold;">Status:  <span style="font-weight:normal;">'+response.reminder.status+'</span></p>'
                    html1 += '</div></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>';

                    

                    html1 += '<div id="reminder-edit-model-'+response.reminder.id+'" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Set Reminder</h4></div>';
                    html1 += '<div class="modal-body"><form action="/claim-ajax-update-reminder" method="post">';
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<input type="hidden" name="_token" value="'+csrf+'" >';
                    html1 += '<div class="row"><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Date</label><input type="date" name="callback_date" class="form-control" id="exampleInputEmail1" value="'+response.reminder.callback_date+'"  placeholder="Enter email"><input type="hidden" name="id" value="'+response.reminder.id+'"></div></div><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Time</label><input type="time" name="callback_time" class="form-control" value="'+response.reminder.callback_time+'" id="exampleInputEmail1"  placeholder="Enter email"></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><div class="form-group"><label for="exampleInputEmail1" class="control-label">Note</label><textarea name="note" class="form-control" id="exampleInputEmail1" cols="30" rows="3">'+response.reminder.note+'</textarea></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><button type="button" id="update-reminder-5" class="btn btn-success">Reminder</button></div></div>';
                    html1 += '</form>';
                    html1 += '</div><div class="modal-footer"></div></div></div></div>';
                    html1 += '<div id="myModalSchedule-'+response.reminder.id+'" class="modal fade" role="dialog">';
                    html1 += '<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Set Reminder</h4></div>';
                    html1 += '<div class="modal-body"><form action="/claim-ajax-update-reminder" method="post">';
                    var csrf1 = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<input type="hidden" name="_token" value="'+csrf1+'" >';
                    html1 += '<div class="row"><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Date</label><input type="date" name="callback_date" class="form-control" id="reschedule_callback_date_'+response.reminder.id+'" value="'+response.reminder.callback_date+'"  placeholder="Enter email"><input type="hidden" name="id" value="'+response.reminder.id+'"></div></div><div class="col-md-6"><div class="form-group"><label for="exampleInputEmail1">Reminder Time</label><input type="time" name="callback_time" class="form-control" value="'+response.reminder.callback_time+'" id="reschedule_callback_time_'+response.reminder.id+'"  placeholder="Enter email"></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><div class="form-group"><label for="exampleInputEmail1" class="control-label">Note</label><textarea name="note" class="form-control" id="reschedule_note_'+response.reminder.id+'" cols="30" rows="3">'+response.reminder.note+'</textarea></div></div></div>';
                    html1 += '<div class="row"><div class="col-md-12"><button type="button" id="'+response.reminder.id+'" class="btn btn-success reschedule-reminder">Reminder</button></div></div>';
                    html1 += '</form>';
                    html1 += '</div><div class="modal-footer"></div></div></div></div>';                  
                    html1 += '</td>';                  
                     
                     $('#reminder-update-'+reminder_id).html(html1);
                     $('#add_details')[0].reset();

                    }
                } else {
                    $('#msgs').html("<div class='alert alert-success'>Please Insert Vaild Data</div>");
                }
            } 
        });
        }
    });


    $(document).on('click', '#ticket-submit-btn', function(){
        // alert();
        var ticket_id          = $("#ticket_id").val();
        var ticket_description = $("#ticket_description").val();
        var claim_user_id      = $("#claim_user_id_for_ticket").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url : '/claim-ajax-ticket-description',
            type : 'POST',
            data : {
                ticket_id : ticket_id,
                ticket_description : ticket_description
            },
            success: function(response){
                var html = '<div class="alert alert-success alert-dismissible show" role="alert"><strong>Success!</strong> '+response.msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                $('#msgs').html(html);
                $("#ticket_description").val('');

                
                var ticket_des = '';
                $.each(response.ticketnote, function(i, val){
                    var date = moment(val.created_at);
                    ticket_des += '<article class="panel panel-primary">';
                    ticket_des += '<div class="panel-heading icon">';
                    ticket_des += '<i class="fa fa-comment"></i></div>';
                    ticket_des += '<div class="panel-heading"><h2 class="panel-title pull-left">';
                    if(val.user_id == claim_user_id){
                        ticket_des += 'User';
                    }else{
                        ticket_des += 'Admin';
                    }
                    ticket_des += '</h2>';
                    ticket_des += '<h2 class="panel-title pull-right">'+date.format("DD-MM-YYYY")+' at '+date.format("h:mm A")+'</h2>';
                    ticket_des += '</div>';
                    ticket_des += '<div class="panel-body">';  
                    ticket_des += val.description;
                    ticket_des += '</div></article>';
                    
                });
                $(".timeline").html(ticket_des);
                
            }
        });

    });

    $(document).on('click', '.close-ticket', function(){
        var ticket_id = $(this).attr("id");
        $.ajax({
            url : '/claim-ajax-close-ticket',
            type : 'GET',
            data : {
                ticket_id : ticket_id
            },
            success:function(response){
                var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> `+response.msg+`
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);
                $("#ticket_status").val(response.ticket.status);
                $("#description-design").hide(500);
            }
        });
    });

    $(document).on('click', '#affiliate-note-submit-btn', function(){
        var affiliate_note_des = $("#affiliate-note-des").val();
        var claim_id = $("#claim_id_for_affiliate_note").val();
        var i_value = $("#row-value").val()+1;
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '/claim-ajax-affiliate-note-add',
            type : 'POST',
            data : {
                affiliate_note_des : affiliate_note_des,
                claim_id : claim_id
            },
            success:function(response){
                console.log(response);
                var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> `+response.msg+`
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);
                var html1 = '<tr id="affiliate-note-update-'+response.affliatenote.id+'">';
                html1 += '<td>'+response.affliatenote.id+'</td>';
                html1 += '<td>'+response.affliatenote.affiliate_note+'</td>';
                html1 += '<td><form action="/claim-ajax-affiliate-note-delete/'+response.affliatenote.id+'" method="POST" style= "display:inline">';
                html1 += '<input type="hidden" name="_method" value="DELETE"/>';
                var csrf1 = $('meta[name="csrf-token"]').attr('content');
                html1 += '<input type="hidden" name="_token" value="'+csrf1+'"/>';
                html1 += '<input type="hidden" name="claim_id" id="claim_id_for_affiliate_note_delete" value="'+response.affliatenote.claim_id+'"/>';
                html1 += '<button type="button" class="btn btn-sm btn-danger delete-affiliate-note" title="Delete Reminder" id="'+response.affliatenote.id+'" style="margin-right: 4px !important;"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>';
                html1 += '</form>';

                html1 += '<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#editAffiliateNote-'+response.affliatenote.id+'"><i class="fa fa-edit"></i></a>';
                
                html1 += '<div class="modal fade" id="editAffiliateNote-'+response.affliatenote.id+'" role="dialog">';
                html1 += '<div class="modal-dialog"><div class="modal-content">';
                html1 += '<form action="/claim-ajax-update-affiliate-note" method="post" class="form-horizontal">';
                var csrf2 = $('meta[name="csrf-token"]').attr('content');
                html1 += '<input type="hidden" name="_token" value="'+csrf2+'" >';
                html1 += '<div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Edit Note Data</h4></div>';
                html1 += '<div class="modal-body"><div class="form-group">';
                html1 += '<textarea name="affiliate_note" id="affiliate-update-note-'+response.affliatenote.id+'" cols="30" rows="5" class="form-control">'+response.affliatenote.affiliate_note+'</textarea>';
                html1 += '<input type="hidden" name="affiliate_note_id" id="affiliate_note_id" value="'+response.affliatenote.id+'">';
                html1 += '<input type="hidden" name="claim_id" value="'+response.affliatenote.claim_id+'" id="claim_id_update_affiliate_note" />';
                html1 += '</div></div>';
                html1 += '<div class="modal-footer"><button type="button" class="btn btn-info affiliate-note-update-btn" id="'+response.affliatenote.id+'"><i class="fa fa-save"></i> Update</button></div>';
                html1 += '</form></div></div></div>';
                html1 += '</td></tr>'
                $("#affliate-note-info-table").append(html1);
                $("#affiliate-note-des").val('');
            }
        });
    });

    $(document).on('click', '.delete-affiliate-note', function(){
        var affiliate_id = $(this).attr("id");
        var claim_id = $("#claim_id_for_affiliate_note_delete").val();
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '/claim-ajax-affiliate-note-delete',
            type : 'POST',
            data : {
                affiliate_id : affiliate_id,
                claim_id : claim_id
            },
            success: function(response){
                var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> `+response.msg+`
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);
                $("#affiliate-note-update-"+affiliate_id).hide(500);
            }
        });
    });

    $(document).on('click','.affiliate-note-update-btn',function(){
        var affiliate_note_id = $(this).attr('id');
        var affiliate_note_des = $("#affiliate-update-note-"+affiliate_note_id).val();
        var claim_id = $("#claim_id_update_affiliate_note_"+affiliate_note_id).val();
        // alert(claim_id);
        console.log(affiliate_note_id);
        $('#editAffiliateNote-'+affiliate_note_id).modal("hide");
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '/claim-ajax-update-affiliate-note',
            type : 'POST',
            data : {
                affiliate_note_des : affiliate_note_des,
                affiliate_id : affiliate_note_id,
                claim_id : claim_id
            },
            success: function(response){
                console.log(response);
                
                var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> `+response.msg+`
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);
                 
                var html1 = '<td>'+response.affliatenote.id+'</td>';
                    html1 += '<td>'+response.affliatenote.affiliate_note+'</td>';
                    html1 += '<td><form action="/claim-ajax-affiliate-note-delete/'+response.affliatenote.id+'" method="POST" style= "display:inline">';
                    html1 += '<input type="hidden" name="_method" value="DELETE"/>';
                    var csrf1 = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<input type="hidden" name="_token" value="'+csrf1+'"/>';
                    html1 += '<input type="hidden" name="claim_id" id="claim_id_for_affiliate_note_delete" value="'+response.affliatenote.claim_id+'"/>';
                    html1 += '<button type="button" class="btn btn-sm btn-danger delete-affiliate-note" title="Delete Reminder" id="'+response.affliatenote.id+'" style="margin-right: 4px !important;"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>';
                    html1 += '</form>';

                    html1 += '<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#editAffiliateNote-'+response.affliatenote.id+'"><i class="fa fa-edit"></i></a>';
                    
                    html1 += '<div class="modal fade" id="editAffiliateNote-'+response.affliatenote.id+'" role="dialog">';
                    html1 += '<div class="modal-dialog"><div class="modal-content">';
                    html1 += '<form action="/claim-ajax-update-affiliate-note" method="post" class="form-horizontal">';
                    var csrf2 = $('meta[name="csrf-token"]').attr('content');
                    html1 += '<input type="hidden" name="_token" value="'+csrf2+'" >';
                    html1 += '<div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Edit Note Data</h4></div>';
                    html1 += '<div class="modal-body"><div class="form-group">';
                    html1 += '<textarea name="affiliate_note" id="affiliate-update-note-'+response.affliatenote.id+'" cols="30" rows="5" class="form-control">'+response.affliatenote.affiliate_note+'</textarea>';
                    html1 += '<input type="hidden" name="affiliate_note_id" id="affiliate_note_id_'+response.affliatenote.id+'" value="'+response.affliatenote.id+'">';
                    html1 += '<input type="hidden" name="claim_id" value="'+response.affliatenote.claim_id+'" id="claim_id_update_affiliate_note_'+response.affliatenote.id+'" />';
                    html1 += '</div></div>';
                    html1 += '<div class="modal-footer"><button type="button" class="btn btn-info affiliate-note-update-btn" id="'+response.affliatenote.id+'"><i class="fa fa-save"></i> Update</button></div>';
                    html1 += '</form></div></div></div>';
                    html1 += '</td>';
                $("#affiliate-note-update-"+response.affliatenote.id).html(html1);
                $("#affiliate-update-note").text('');

            }
        });
    });


$(document).on('click', '#file-upload-btn', function(){
    var name = $("#file_name").val();
    var claim_id = $("#claim_id_for_file_uploads").val();
    var form_data = new FormData();
    form_data.append('file_upload', $('#file-upload')[0].files[0]);
    form_data.append('file_name', name);
    form_data.append('claim_id', claim_id);

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/claim-ajax-file-upload',
        type : 'POST',
        data : form_data,
        processData : false,
        contentType : false,
        success:function(response){

            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> `+response.msg+`
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);
            var html1 = '<tr id="claim-file-'+response.claim_file.id+'">';
                html1 += '<td>'+response.claim_file.name+'</td>';
                var date = moment(response.claim_file.created_at);
                html1 += '<td>'+date.format('DD-MM-YYYY')+'</td>';

                html1 += '<td>'+response.claim_file.user_id+'</td>';
                html1 += '<td>';
                var down_url = '/uploads/'+response.claim_file.claim_id+'/'+response.claim_file.file_name;
                html1 += '<a href="'+down_url+'" class="btn btn-sm btn-primary" download><i class="fa fa-download"></i> Download</a>';
                html1 += '<a id="'+response.claim_file.id+'" class="btn btn-sm btn-danger claim-file-delete"><i class="fa fa-trash"></i> Delete</a>';
                var str = response.claim_file.file_name;
                var ext = str.split(".");
                if(ext[1] == 'pdf'){
                    var pdf_url = '/uploads/'+response.claim_file.claim_id+'/'+response.claim_file.file_name;
                    html1 += '<a type="button" target="_blank" class="btn btn-sm btn-primary pdf-file-down" id="'+pdf_url+'"><i class="fa fa-pdf"></i> PDF</a>';
                }
                html1 += '</td></tr>';
                $("#claim-file-tbody").append(html1);
                $("#claim_id_for_file_uploads").val('');
                $("#file_name").val('');
        }
    });
});

$(document).on('click', '.claim-file-delete', function(){
    var claim_file_id = $(this).attr('id');
    $.ajax({
        url : '/claim-ajax-file-delete',
        type : 'GET',
        data : {
            claim_file_id : claim_file_id
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> Success
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);
            $("#claim-file-"+claim_file_id).hide(500);
        }
    });
});

$(document).on('click', '#passenger-add-btn', function(){
    var claim_id = $("#claim_id").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var address = $("#address").val();
    var post_code = $("#post_code").val();
    var date_of_birth = $("#date_of_birth").val();
    var email = $("#email").val();
    var is_booking_reference = $("#is_booking_reference").val();
    var booking_refernece = $("#booking_refernece").val();
    var phone = $("#phone").val();
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/claim-ajax-passenger-add-for-claim',
        type : 'POST',
        data : {
            claim_id : claim_id,
            first_name : first_name,
            last_name : last_name,
            address : address,
            post_code : post_code,
            date_of_birth : date_of_birth,
            email : email,
            is_booking_reference : is_booking_reference,
            booking_refernece : booking_refernece,
            phone : phone
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> Success
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);
            var html1 = '<tr id="current-passenger-'+response.passenger.id+'">';
                html1 += '<td>';
                html1 += '<a type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#passenger-edit-'+response.passenger.id+'" >';
                html1 += response.passenger.first_name+' '+response.passenger.last_name;
                html1 += '</a>';
                html1 += '<div id="passenger-edit-'+response.passenger.id+'" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Edit Passenger</h4></div>';
                html1 += '<div class="modal-body"><form>';
                html1 += '<div class="form-group"><label class="control-label">First Name</label>';
                html1 += '<input type="text" class="form-control" name="first_name" id="first_name_'+response.passenger.id+'" value="'+response.passenger.first_name+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Last Name</label>';
                html1 += '<input type="text" class="form-control" name="last_name" id="last_name_'+response.passenger.id+'" value="'+response.passenger.last_name+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Address</label>';
                html1 += '<input type="text" class="form-control" name="address" id="address_'+response.passenger.id+'" value="'+response.passenger.address+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Post Code</label>';
                html1 += '<input type="text" class="form-control" name="post_code" id="post_code_'+response.passenger.id+'" value="'+response.passenger.post_code+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Date Of Birth</label>';
                html1 += '<input type="text" class="form-control datepicker" name="date_of_birth" id="date_of_birth_'+response.passenger.id+'" value="'+response.passenger.date_of_birth+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Email</label>';
                html1 += '<input type="text" class="form-control" name="address" id="email_'+response.passenger.id+'" value="'+response.passenger.email+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Is Booking Reference</label>';
                html1 += '<select class="form-control" id="is_booking_reference_'+response.passenger.id+'" name="is_booking_reference">';
                if(response.passenger.is_booking_reference == 0){
                    html1 += '<option value="0">Yes</option>';
                    html1 += '<option value="1" selected>No</option>';
                }else{
                    html1 += '<option value="1" selected>Yes</option>';
                    html1 += '<option value="0">No</option>';
                }
                html1 += '</select>';
                html1 += '<div class="form-group"><label class="control-label">Booking Refernece</label>';
                html1 += '<input type="text" class="form-control" name="booking_refernece" id="booking_refernece_'+response.passenger.id+'" value="'+response.passenger.booking_refernece+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Booking Refernece</label>';
                html1 += '<input type="text" class="form-control" name="phone" id="phone_'+response.passenger.id+'" value="'+response.passenger.phone+'"></div>';
                html1 += '<input type="hidden" name="claim_id" id="claim_id" value="'+response.passenger.claim_id+'">';
                html1 += '<div class="form-group"><button type="button" class="btn btn-sm btn-primary passenger-update-btn" id="'+response.passenger.id+'">Update</button></div>'
                html1 += '</form></div>';
                html1 += '<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>';
                html1 += '</td>';
                html1 += '<td>'+response.passenger.address+'</td>';
                html1 += '<td>'+response.passenger.post_code+'</td>';
                html1 += '<td>'+response.passenger.date_of_birth+'</td>';
                html1 += '<td>'+response.passenger.email+'</td>';
                html1 += '<td>'+response.passenger.phone+'</td>';
                html1 += '<td>';
                if(response.passenger.is_booking_reference == 0){
                    html1 += '<span style="color: red;">No</span>';
                }else{
                    html1 += '<span style="color: green;">Yes</span>';
                }
                html1 += '</td>';
                html1 += '<td>'+response.passenger.booking_refernece+'</td>';
                $("#passenger-table").append(html1);
                $("#passenger-add").modal("hide");
        }
    });
});

$(document).on('click', '.passenger-update-btn', function(){
    var passenger_id         = $(this).attr('id');
    var first_name           = $("#first_name_"+passenger_id).val();
    var last_name            = $("#last_name_"+passenger_id).val();
    var address              = $("#address_"+passenger_id).val();
    var post_code            = $("#post_code_"+passenger_id).val();
    var date_of_birth        = $("#date_of_birth_"+passenger_id).val();
    var is_booking_reference = $("#is_booking_reference_"+passenger_id).val();
    var booking_reference    = $("#booking_refernece_"+passenger_id).val();
    var claim_id             = $("#claim_id").val();
    var phone                = $("#phone_"+passenger_id).val();
    var email                = $("#email_"+passenger_id).val();
    console.log(passenger_id, first_name, last_name, address, post_code, date_of_birth, is_booking_reference, booking_reference, claim_id, email, phone);
    $("#passenger-edit-"+passenger_id).modal("hide");
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url : '/claim-ajax-passenger-update',
        type : 'POST',
        data : {
            passenger_id : passenger_id,
            first_name : first_name,
            last_name : last_name,
            address : address,
            post_code : post_code,
            date_of_birth : date_of_birth,
            is_booking_reference : is_booking_reference,
            booking_reference : booking_reference,
            claim_id : claim_id,
            phone : phone,
            email : email
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> Success
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);

            var html1 = '<td>';
                html1 += '<a type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#passenger-edit-'+response.passenger.id+'" >';
                html1 += response.passenger.first_name+' '+response.passenger.last_name;
                html1 += '</a>';
                html1 += '<div id="passenger-edit-'+response.passenger.id+'" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Edit Passenger</h4></div>';
                html1 += '<div class="modal-body"><form>';
                html1 += '<div class="form-group"><label class="control-label">First Name</label>';
                html1 += '<input type="text" class="form-control" name="first_name" id="first_name_'+response.passenger.id+'" value="'+response.passenger.first_name+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Last Name</label>';
                html1 += '<input type="text" class="form-control" name="last_name" id="last_name_'+response.passenger.id+'" value="'+response.passenger.last_name+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Address</label>';
                html1 += '<input type="text" class="form-control" name="address" id="address_'+response.passenger.id+'" value="'+response.passenger.address+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Post Code</label>';
                html1 += '<input type="text" class="form-control" name="post_code" id="post_code_'+response.passenger.id+'" value="'+response.passenger.post_code+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Date Of Birth</label>';
                html1 += '<input type="text" class="form-control datepicker" name="date_of_birth" id="date_of_birth_'+response.passenger.id+'" value="'+response.passenger.date_of_birth+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Email</label>';
                html1 += '<input type="text" class="form-control" name="address" id="email_'+response.passenger.id+'" value="'+response.passenger.email+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Is Booking Reference</label>';
                html1 += '<select class="form-control" id="is_booking_reference_'+response.passenger.id+'" name="is_booking_reference">';
                if(response.passenger.is_booking_reference == 0){
                    html1 += '<option value="0">Yes</option>';
                    html1 += '<option value="1" selected>No</option>';
                }else{
                    html1 += '<option value="1" selected>Yes</option>';
                    html1 += '<option value="0">No</option>';
                }
                html1 += '</select>';
                html1 += '<div class="form-group"><label class="control-label">Booking Refernece</label>';
                html1 += '<input type="text" class="form-control" name="booking_refernece" id="booking_refernece_'+response.passenger.id+'" value="'+response.passenger.booking_reference+'"></div>';
                html1 += '<div class="form-group"><label class="control-label">Booking Refernece</label>';
                html1 += '<input type="text" class="form-control" name="phone" id="phone_'+response.passenger.id+'" value="'+response.passenger.phone+'"></div>';
                html1 += '<input type="hidden" name="claim_id" id="claim_id" value="'+response.passenger.claim_id+'">';
                html1 += '<div class="form-group"><button type="button" class="btn btn-sm btn-primary passenger-update-btn" id="'+response.passenger.id+'">Update</button></div>';
                html1 += '</form></div>';
                html1 += '<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>';
                html1 += '</td>';

                html1 += '<td>'+response.passenger.address+'</td>';
                html1 += '<td>'+response.passenger.post_code+'</td>';
                html1 += '<td>'+response.passenger.date_of_birth+'</td>';
                html1 += '<td>'+response.passenger.email+'</td>';
                html1 += '<td>'+response.passenger.phone+'</td>';
                html1 += '<td>';
                if(response.passenger.is_booking_reference == 0){
                    html1 += '<span style="color: red;">No</span>';
                }else{
                    html1 += '<span style="color: green;">Yes</span>';
                }
                html1 += '</td>';
                html1 += '<td>'+response.passenger.booking_refernece+'</td>';
                $("#current-passenger-"+response.passenger.id).html(html1);
                
        }
    });
});

$(document).on('click', '.pdf-file-down', function(){
    var url = $(this).attr("id");
    window.open(url, '_blank');
});

$(document).on('click', '#time-update-for-flight', function(){
    var airline_id = $("#airline_id").val();
    var flight_no = $("#flight_no").val();
    var date = $("#date").val();
    var scheduled_departure_time_and_date = $("#scheduled_departure_time_and_date").val();
    var actual_departure_time_and_date = $("#actual_departure_time_and_date").val();
    var scheduled_arrival_time_and_date = $("#scheduled_arrival_time_and_date").val();
    var actual_arrival_time_and_date = $("#actual_arrival_time_and_date").val();

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : '/claim-ajax-time-update-for-claim',
        type : 'POST',
        data : {
            airline_id : airline_id,
            flight_no : flight_no,
            date : date,
            scheduled_departure_time_and_date : scheduled_departure_time_and_date,
            actual_departure_time_and_date : actual_departure_time_and_date,
            scheduled_arrival_time_and_date : scheduled_arrival_time_and_date,
            actual_arrival_time_and_date : actual_arrival_time_and_date
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> Success
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);
            console.log(response.flight);
            $("#flight_one").html(response.flight.scheduled_departure_time_and_date);
            $("#flight_two").html(response.flight.actual_departure_time_and_date);
            $("#flight_three").html(response.flight.scheduled_arrival_time_and_date);
            $("#flight_four").html(response.flight.actual_arrival_time_and_date);
            $("#update-time").modal('hide');
            $("#scheduled_departure_time_and_date").val('');
            $("#actual_departure_time_and_date").val('');
            $("#scheduled_arrival_time_and_date").val('');
            $("#actual_arrival_time_and_date").val('');
        }
    });
});

$(document).on('click', '#time-set-for-claim', function(){
    var airline_id = $("#airline_id").val();
    var flight_no = $("#flight_no").val();
    var date = $("#date").val();
    var scheduled_departure_time_and_date = $("#scheduled_departure_time_and_date").val();
    var actual_departure_time_and_date = $("#actual_departure_time_and_date").val();
    var scheduled_arrival_time_and_date = $("#scheduled_arrival_time_and_date").val();
    var actual_arrival_time_and_date = $("#actual_arrival_time_and_date").val();

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : '/claim-ajax-time-set-for-claim',
        type : 'POST',
        data : {
            airline_id : airline_id,
            flight_no : flight_no,
            date : date,
            scheduled_departure_time_and_date : scheduled_departure_time_and_date,
            actual_departure_time_and_date : actual_departure_time_and_date,
            scheduled_arrival_time_and_date : scheduled_arrival_time_and_date,
            actual_arrival_time_and_date : actual_arrival_time_and_date
        },
        success: function(response){
            var html = `<div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Success!</strong> Success
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
                $('#msgs').html(html);
            console.log(response.flight);
            $("#flight_one").html(response.flight.scheduled_departure_time_and_date);
            $("#flight_two").html(response.flight.actual_departure_time_and_date);
            $("#flight_three").html(response.flight.scheduled_arrival_time_and_date);
            $("#flight_four").html(response.flight.actual_arrival_time_and_date);
            $("#set-time").modal('hide');
            $("#scheduled_departure_time_and_date").val('');
            $("#actual_departure_time_and_date").val('');
            $("#scheduled_arrival_time_and_date").val('');
            $("#actual_arrival_time_and_date").val('');
            $("#itter").show(500);
            ("#check_itter").val(1)
        }
    });
});




});
