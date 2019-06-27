
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Letter Before Action</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin_asset/pdf/style.css') }}">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        /* textarea {
        min-height: 1000px;
      } */
/*      .total_div {
        width: 968px;
        margin: 0 auto;
        display: block;
        overflow: hidden;
      }
      .logo_div {
        width: 30%;
        float: left;
      }
      .text_div {
        width: 70%;
        float: right;
        padding-top: 10px;
      }
      .text_div h4 {
        margin: 0px;
        padding-top: 8px;
      }
      .text_div h4:first-child {
        padding-top: 0px;
      }
      .address_div {
        width: 50%;
        float: left;
        text-align: left;
      }
      .date_time_div {
        width: 50%;
        float: left;
        text-align: right;
      }
      .address_div h5 {
        margin: 0px;
      }
      .footer_text {
        position: absolute;
        bottom: 1%;
        padding-top: 30px;
        left: 25%;
      }*/


    </style>
</head>

<body>
    <form action="{{route('letter.before.email')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="claim_id" value="{{$claim->id}}" />
        <input type="hidden" name="airline_id" value="{{$claim->airline_id}}" />
        <input type="hidden" name="cpanel_email" value="{{$claim->cpanel_email}}" />
        <textarea id="pdf" name="letter_before_content" class="tinymce-editor" rows="50">
            @php
                $claim_type = ucwords(str_replace("_"," ",$claim->claim_table_type));
            @endphp
            <div class="container">

            <div class="total_div" style="width: 100%; display: block; overflow: hidden;">
              <div class="logo_div" style="width: 50%;  float: left; padding-top: 20px; ">
                <div class="logo_img_div">
                  <img src="{{asset('front_asset/img/logo.webp')}}" alt="" >
                </div>
              </div>
              <div class="text_div text-right" style="width: 50%;  float: left; text-align: right">
                <h4 style="color: #76A154;">Claim'n Win Ltd</h4>
                <h4 style="color: #76A154;">T: <span style="color: #000000;font-size: 15px; font-weight:bold;">020 3808 6632</span></h4>
                <h4 style="color: #76A154;">E: <span style="color: #000000;font-size: 15px; font-weight:bold;">info@claimnwin@co.uk</span></h4>
              </div>
            </div>



  <div class="total_div">
    <h5 style="font-size: 15px;font-weight:bold; text-align: right;">Private and Confidential</h5>
  </div>
  <div class="total_div" style="width: 100%; display: block; overflow: hidden;">
    <div class="address_div" style="width: 50%;  float: left;">
      {{-- <h5 style="width: 150px; line-height: 30px;">{{$passenger->address}}</h5> --}}

      @if ($airline->name)
      <h5 style="padding-bottom: 15px;">{{ $airline->name }}</h5>
      @endif

      @if ($airline->address_line_1)
      <h5 style="padding-bottom: 15px;">{{ $airline->address_line_1 }}</h5>
      @endif

      @if ($airline->address_line_2)
      <h5 style="padding-bottom: 15px;">{{ $airline->address_line_2 }}</h5>
      @endif

      @if ($airline->country)
      <h5 style="padding-bottom: 15px;">{{ $airline->country }}</h5>
      @endif


      {{-- <h5>{{$airline->address_line_1}} {{$airline->address_line_1 == null ? '' : $airline->address_line_1}}</h5> --}}
      {{-- <h5>{{$airline->address_line_2}}</h5> --}}
      {{-- <h5>{{$airline->country}}</h5> --}}
    </div>
    <div class="date_time_div text-right"  style="width: 50%;  float: left; text-align: right">
      <!-- <h5>Date: {{Carbon\Carbon::today()}}</h5> -->
      <h5>Date: {{$itt_details->departure_date}}</h5>
      <h5>Our Ref: CLAIM/000{{$claim->id}}</h5>
      <h5>Your Ref: Your Ref: {{$current_passenger->booking_refernece == null ? 'No Reference Found' : $current_passenger->booking_refernece}}
    </div>
  </div>

  {{-- <div class="common_row">
    <div class="first_child">
      <div class="logo">
        <img src="http://webencoder.net/demo/logo.webp" alt="QR" title="QR" style="display:block;" data-auto-embed="attachment" />
      </div>
      <div class="total_div">
        <h5 style="font-size: 15px; font-weight:bold;">Private and Confidential</h5>
      </div>
      <div class="total_div">
        <h5>{{$airline->name}}</h5>
        <h5>{{$airline->address_line_1}}</h5>
        <h5>{{$airline->address_line_2}}</h5>
        <h5>{{$airline->country}}</h5>
      </div>

    </div>
    <div class="second_child">
      <div class="second_child_total_div">
        <h4 style="color: #76A154;">Claim'n Win Ltd</h4>
      </div>
      <div class="second_child_total_div">
        <h4 style="color: #76A154;">T: <span style="color: #000000;font-size: 15px; font-weight:bold;">020 3808 6632</span></h4>
      </div>
      <div class="second_child_total_div">
        <h4 style="color: #76A154;">E: <span style="color: #000000;font-size: 15px; font-weight:bold;">info@claimnwin@co.uk</span></h4>
      </div>
      <div class="second_child_total_div">
        <h5>Date: {{Carbon\Carbon::now()->format("d-m-Y")}}</h5>
      </div>
      <div class="second_child_total_div">
        <h5>Our Ref: CLAIM/000{{$claim->id}}</h5>
      </div>
      <div class="second_child_total_div">
        <h5>Your Ref: {{$current_passenger->booking_refernece == null ? 'No Reference Found' : $current_passenger->booking_refernece}}</h5>
      </div>
    </div>
  </div> --}}

  <div class="common_row">
    <div class="total_div">
      <p>Dear Sirs,</p>
      <p style="font-weight: bold;">Re: {{$claim_type}}</p>
    </div>
  </div>

  <div class="common_row">
    <div class="total_div">
      <p>
          We have been instructed to represent the passengers listed at {{$current_passenger->first_name.' '.$current_passenger->last_name}} of this letter (hereinafter "the
          Claimants") to pursue a claim for compensation arising out of the {{$claim_type}}.
      </p>
    </div>
  </div>

  <div class="common_row">
    <div class="total_div">
      <p style="text-decoration:underline; padding-top: 5px; padding-bottom: 1px;">Claim Details</p>
      <p>
        @if ($claim->what_happened_to_the_flight == 'canceled_flight')
          The claim relates to flight number {{ $airline->name }} {{ $itt_details->departure_date }}, which was scheduled to depart from {{ $departed_airport->name }}({{ $departed_airport->iata_code }}) on {{ $flights->scheduled_departure_time_and_date }} and arrive at {{ $final_destination_airport->name }}({{ $final_destination_airport->iata_code }}) on {{ $flights->scheduled_arrival_time_and_date }}. Unfortunately, the flight was cancelled.</br>
          @if ($is_connecting_flight)
          Due to this, the passengers listed in Annex A of this letter missed their connecting flight.
          @foreach ($iternery as $row)
            @php
              $flight_segments = $row->flight_segment;
              $flight_segment_array = explode('-', $flight_segments);
            @endphp
           flight number {{$row->flight_number}} {{ $row->departure_date }}, which was scheduled to depart from {{ $all_iternery_airport[$flight_segment_array[0]]->name }}({{ $all_iternery_airport[$flight_segment_array[0]]->iata_code }}) on {{ $all_iternery_flight[$row->flight_number]->scheduled_departure_time_and_date }} and arrive at {{ $all_iternery_airport[$flight_segment_array[1]]->name }}({{ $all_iternery_airport[$flight_segment_array[1]]->iata_code }}) on {{ $all_iternery_flight[$row->flight_number]->scheduled_arrival_time_and_date }}.
         @endforeach
          @endif
          <br>
          The distance between the departure airport and the final destination airport is {{ $claim->distance }} and in accordance with {{$law}} we submit that each passenger is entitled to {{$claim->amount == '' ? '0' : $claim->amount}}.

        @elseif ($claim->what_happened_to_the_flight == 'delayed_flight')
          @if ($is_connecting_flight)
            @if ($claim->total_delay == 'less_than_3_hours')
              The claim relates to flight number {{ $airline->name }} {{ $itt_details->departure_date }}, which was scheduled to depart from {{ $departed_airport->name }}({{ $departed_airport->iata_code }}) on {{ $flights->scheduled_departure_time_and_date }} and arrive at {{ $final_destination_airport->name }}({{ $final_destination_airport->iata_code }}) on {{ $flights->scheduled_arrival_time_and_date }}. Unfortunately, the flight was delayed.</br></br>
              Due to this, the passengers listed in Annex A of this letter missed their connecting flight.
              @foreach ($iternery as $row)
                @php
                  $flight_segments = $row->flight_segment;
                  $flight_segment_array = explode('-', $flight_segments);
                @endphp
               flight number {{$row->flight_number}} {{ $row->departure_date }}, which was scheduled to depart from {{ $all_iternery_airport[$flight_segment_array[0]]->name }}({{ $all_iternery_airport[$flight_segment_array[0]]->iata_code }}) on {{ $all_iternery_flight[$row->flight_number]->scheduled_departure_time_and_date }} and arrive at {{ $all_iternery_airport[$flight_segment_array[1]]->name }}({{ $all_iternery_airport[$flight_segment_array[1]]->iata_code }}) on {{ $all_iternery_flight[$row->flight_number]->scheduled_arrival_time_and_date }}.
             @endforeach
             The distance between the departure airport and the final destination airport is {{ $claim->distance }} and in accordance with {{$law}} we submit that each passenger is entitled to {{$claim->amount == '' ? '0' : $claim->amount}}.
             @else
               @if ($claim->total_delay == '3_to_8_hours')
                 The claim relates to flight number {{ $airline->name }} {{ $itt_details->departure_date }}, which was scheduled to depart from {{ $departed_airport->name }}({{ $departed_airport->iata_code }}) on {{ $flights->scheduled_departure_time_and_date }} and arrive at {{ $final_destination_airport->name }}({{ $final_destination_airport->iata_code }}) on {{ $flights->scheduled_arrival_time_and_date }}. Unfortunately, the flight was delayed more than 3 hours.</br></br>
                 The distance between the departure airport and the final destination airport is {{ $claim->distance }} and in accordance with {{$law}} we submit that each passenger is entitled to {{$claim->amount == '' ? '0' : $claim->amount}}.
               @endif
            @endif
          @else
          @endif

        @elseif ($claim->what_happened_to_the_flight == 'denied_boarding')
          @if ($is_connecting_flight)
            The claim relates to flight number {{ $airline->name }} {{ $itt_details->departure_date }}, which was scheduled to depart from {{ $departed_airport->name }}({{ $departed_airport->iata_code }}) on {{ $flights->scheduled_departure_time_and_date }} and arrive at {{ $final_destination_airport->name }}({{ $final_destination_airport->iata_code }}) on {{ $flights->scheduled_arrival_time_and_date }}. Unfortunately, the passengers listed at Annex A of this letter were denied boarding against their will.</br></br>
            Due to this, the passengers listed in Annex A of this letter missed their connecting flight.
            @foreach ($iternery as $row)
              @php
                $flight_segments = $row->flight_segment;
                $flight_segment_array = explode('-', $flight_segments);
              @endphp
             flight number {{$row->flight_number}} {{ $row->departure_date }}, which was scheduled to depart from {{ $all_iternery_airport[$flight_segment_array[0]]->name }}({{ $all_iternery_airport[$flight_segment_array[0]]->iata_code }}) on {{ $all_iternery_flight[$row->flight_number]->scheduled_departure_time_and_date }} and arrive at {{ $all_iternery_airport[$flight_segment_array[1]]->name }}({{ $all_iternery_airport[$flight_segment_array[1]]->iata_code }}) on {{ $all_iternery_flight[$row->flight_number]->scheduled_arrival_time_and_date }}.
           @endforeach
           The distance between the departure airport and the final destination airport is {{ $claim->distance }} and in accordance with {{$law}} we submit that each passenger is entitled to {{$claim->amount == '' ? '0' : $claim->amount}}.
          @else
            The claim relates to flight number {{ $airline->name }} {{ $itt_details->departure_date }}, which was scheduled to depart from {{ $departed_airport->name }}({{ $departed_airport->iata_code }}) on {{ $flights->scheduled_departure_time_and_date }} and arrive at {{ $final_destination_airport->name }}({{ $final_destination_airport->iata_code }}) on {{ $flights->scheduled_arrival_time_and_date }}. Unfortunately, the passengers listed at Annex A of this letter were denied boarding against their will.</br></br>
            The distance between the departure airport and the final destination airport is {{ $claim->distance }} and in accordance with {{$law}} we submit that each passenger is entitled to {{$claim->amount == '' ? '0' : $claim->amount}}.
        @endif

@endif











          {{-- The claim relates to flight number {{$itt_details->flight_number}} {{$itt_details->departure_date}}, which was scheduled to depart from

          {{$dept_and_arrival_airport[0]['name']}} ({{$dept_and_arrival_airport[0]['iata_code']}}) on {{$dept_and_arrival_airport[1]['name']}} ({{$dept_and_arrival_airport[1]['iata_code']}}) at {{$itt_details->departure_date}}

          and arrive at {{(isset($connection_airport->name)) ? $connection_airport->name : ''}} ({{(isset($connection_airport->iata_code)) ? $connection_airport->iata_code : ''}}) on {{$itt_details->departure_date}}. Unfortunately,
          @if($claim->claim_table_type == 'flight_cancellation')
          the flight was cancelled.
          @elseif($claim->claim_table_type == 'flight_delay' && $claim->is_contacted_airline == '0' && $claim->total_delay == 'less_than_3_hours')
          the flight was delayed more than 3 hours.
          @elseif($claim->claim_table_type == 'flight_delay' && $claim->is_contacted_airline == '1' && $claim->total_delay == 'less_than_3_hours')
          the flight was delayed.
          @elseif($claim->claim_table_type == 'denied_boarding')
          the passengers listed at {{$current_passenger->first_name.' '.$current_passenger->last_name}} of this letter were denied boarding against their will
          @endif --}}
      </p>
      {{-- <p>
          The distance between these 2 airports is {{$claim->distance}} Km and in accordance with the {{$claim_type}} we submit that each passenger is entitled to {{$claim->amount == '' ? '0' : $claim->amount}}.
      </p> --}}
      <p>
          Please note that we are instructed exclusively in relation to statutory compensation unless otherwise
          specified. Any settlement achieved is strictly without prejudice to any other losses our client may have
          incurred relating to this flight.
      </p>
    </div>
  </div>

  <div class="common_row">
    <div class="total_div">
      <p style="text-decoration:underline; padding-top: 5px; padding-bottom: 1px;">Expected Pre-Action Conduct</p>
      <p>
          This letter should be accepted as the requisite letter before claim, pursuant to the Practice Direction on Pre-Action Conduct (“Practice Direction”).
          In accordance with the Practice Direction we anticipate receiving your acknowledgement within 14 days and then a full response within 30 days.
      </p>
      <p>
          If we do not hear from you within the initial 30 days or alternatively if you do not respond within the timeframe you provide in accordance point 3 above then
          we reserve the right to make an application to the Court for Pre-Action Disclosure and/or Issue Court Proceedings without further notice.
      </p>
    </div>
  </div>

  <div class="common_row">
    <div class="total_div">
      <p style="text-decoration:underline; padding-top: 5px; padding-bottom: 1px;">If Liability To Compensate Is Accepted</p>
      <p>
          If you are accepting a liability to compensate each of the passengers, then we look forward to
          receiving payment within 21 days of that admission.
      </p>
    </div>
  </div>

  <div class="common_row">
    <div class="total_div">
      <p>
          Payment can be made by cheque or alternatively by bank transfer to: -
      </p>
    </div>
  </div>

  <div class="common_row">
    <div class="total_div">
      <p>Account Name: <span>{{isset(($bank_info->account_name)) ? $bank_info->account_name : '---'}}</span></p>
      <p>Bank Name: <span>{{isset(($bank_info->bank_name)) ? $bank_info->bank_name : '---'}}</span></p>
      <p>Iban Number: <span>{{isset(($bank_info->iban_no)) ? $bank_info->iban_no : '---'}}</span></p>
      <p>Swift/Bic Code: <span>{{isset(($bank_info->swift_bic_code)) ? $bank_info->swift_bic_code : '---'}}</span></p>
      <p>Currency Of Account: <span>{{isset(($currency->code)) ? $currency->code : '---'}}</span></p>
      <p>Ref: <span>000{{$claim->id}}</span></p>
    </div>
  </div>

  <div class="common_row">
    <div class="total_div">
      <p>We will accept payment of {{$claim->amount == '' ? '0' : $claim->amount}}</p>
    </div>
  </div>

  <div class="common_row">
    <div class="total_div">
      <p style="text-decoration:underline; padding-top: 5px; padding-bottom: 1px;">Information Required If Defence Raised</p>
      <p>
          If you intend on arguing that the statutory defence of extraordinary circumstances applies, then we
          require you to clarify the exact nature of the circumstances and provide disclosure in support of the
          same.
      </p>
    </div>
  </div>

  <div class="common_row">
    <div class="total_div">
      <p>Yours faithfully</p>
    </div>
  </div>

  <div class="common_row">
      <div class="total_div">
        <p>{{$current_passenger->first_name.' '.$current_passenger->last_name}}</p>
      </div>
  </div>
  @if((($claim->claim_table_type == 'flight_cancellation') && ($claim->total_delay == 'less_than_3_hours') && ($claim->is_contacted_airline == '1'))||(($claim->claim_table_type == 'denied_boarding') && ($claim->total_delay == 'less_than_3_hours') && ($claim->is_contacted_airline == '1'))||(($claim->claim_table_type == 'flight_delay') && ($claim->total_delay == 'less_than_3_hours') && ($claim->is_contacted_airline == '1')))
  <div class="common_row">
      <div class="first_child">
        <p>Name</p>
      </div>
      <div class="second_child">
          <p>Ticket No.</p>
      </div>
  </div>

  @foreach($all_passenger as $passenger_row)
  <div class="common_row">
      <div class="first_child">
        <p>{{$passenger_row->first_name.' '.$passenger_row->last_name}}</p>
      </div>
      <div class="second_child">
        <p class="text-center">656</p>
      </div>
  </div>
  @endforeach
  @endif

  <footer>
    <div class="footer_text" style="text-align: center;">
      <h5 style="font-size: 10px;">Registered Office: 39 Montefiore Court, 69 Stamford Hill, London N16 5TY / Registered in England Company No: 9748199</h5>
    </div>
  </footer>



</textarea>
        {{-- <div class="col-md-4 col-md-offset-4">
            <br>
            <br>
            <button type="submit" class="btn btn-lg btn-success btn-block"> <i class="fa fa-envelope"></i> Email</button>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br> --}}
        </div>
    </form>
{{-- Tinymce with file upload option --}}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
        path_absolute : "/",
        selector: ".tinymce-editor",
        plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
        });
        }
    };

    tinymce.init(editor_config);
</script>
</body>

</html>
