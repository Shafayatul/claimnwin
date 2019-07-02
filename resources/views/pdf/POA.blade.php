<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Poa</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">



    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    <!-- Latest compiled JavaScript -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
      /* textarea {
        min-height: 1000px;
      } */
      .total_div {
        width: 100%;
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
        left: 12.5%;
      }
    </style>
</head>

<body>

    <textarea class="tinymce-editor" rows="50">

    <div class="container" style="margin:20px auto;">

      <div class="total_div">
        <div class="logo_div">
          <div class="logo_img_div">
            <img src="{{asset('front_asset/img/logo.png')}}" alt="" >
          </div>
        </div>
        <div class="text_div text-right">
          <h4 style="color: #76A154;">Claim'n Win Ltd</h4>
          <h4 style="color: #76A154;">T: <span style="color: #000000;font-size: 15px; font-weight:bold;">020 3808 6632</span></h4>
          <h4 style="color: #76A154;">E: <span style="color: #000000;font-size: 15px; font-weight:bold;">info@claimnwin@co.uk</span></h4>
        </div>
      </div>
      <div class="total_div">
        <h5 style="font-size: 15px;padding: 25px 0px 15px 0px; font-weight:bold; text-align: right;">Private and Confidential</h5>
      </div>
      <div class="total_div">
        <div class="address_div">
          <h5 style="width: 150px; line-height: 30px;">{{$passenger->address}}</h5>
        </div>
        <div class="date_time_div text-right">
          <h5>Date: {{Carbon\Carbon::today()}}</h5>
          <h5>Our Ref: CLAIM/{{$claim->id}}</h5>
          <h5>Your Ref:
            @if ($passenger->booking_refernece != "")
              {{$passenger->booking_refernece." - ".$passenger->created_at}}</h5>
            @else
            {{"No Reference Found"}}</h5>
          @endif
        </div>
      </div>

        {{-- <div class="row">
          <div class="col-md-4">
            <div class="logo_div">
              <img src="{{asset('front_asset/img/logo.png')}}" alt="" >
            </div>
          </div>

        </div> --}}
        {{-- <div class="row">

            <div class="col-md-4">


            </div>

            <div class="col-md-4"></div>

            <div class="col-md-4" style="text-align: right;">


            </div>

        </div>
 --}}
        {{-- <div class="row">
            <div class="col-md-12"></div>
        </div> --}}

        {{-- <div class="row">
            <div class="col-md-6" style="text-align:left;"></div>
            <div class="col-md-6" style="text-align:right;"></div>
        </div> --}}

        <div class="total_div">
          <h4 style="font-weight: bold; padding: 20px 0px 10px 0px;">I undersigned, ??????? hereby formally assign to:</h4>
          <h5 style="line-height: 30px;">Claim’N Win Ltd, a company organized and existing under the laws of England, registration number 09748199, with its head office located at 39 Montefiore Court, London N16 5TY; (hereinafter "Claim’N Win") </h5>
          <h4 style="font-weight: bold; padding: 20px 0px 10px 0px;">The entirety of the claims in connection with:</h4>
          <h5 style="line-height: 30px;">
            Flight: <span style="font-weight: bold; padding-right: 15px;">{{$itinerary_details->flight_number}}</span>
            {{-- From: <span style="font-weight: bold; padding-right: 15px;">----</span> --}}
            Airport From: <span style="font-weight: bold; padding-right: 15px;">{{ $airport_from->name}}</span>
            Airport To: <span style="font-weight: bold; padding-right: 15px;">{{ $airport_to->name }}</span>
          </h5>
          <h5 style="line-height: 30px;">
            As an accessory, the transfer of the Claim includes the automatic transfer of the security interests, rights, accessories and actions attached to the Claim. The assignment of the Claim also includes claims of passengers travelling with me and for whom I have the authority as legal representative.

          </h5>
        </div>

        <div class="total_div">
          <h4>Passenger Name  : {{$passenger->first_name." ".$passenger->last_name}}</h4>
        </div>

        {{-- <div class="row">
            <div class="col-md-12">
                <h4>Flight: {{$itinerary_details->flight_number." ".$itinerary_details->created_at}}</h4>
            </div>
        </div> --}}



        {{-- <div class="row">

            <div class="col-md-12">

                <h4>Power of attorney</h4>

                <h4>I {{$passenger->first_name." ".$passenger->last_name}}</h4>

                <p>

                    hereby authorize Claim'N Win Ltd, to act on my behalf in all manners relating to flight {{$passenger->booking_refernece}} with a

                    planned departure on {{ $itinerary_details->departure_date }}, and to receive the compensation on my

                    behalf. Any and all acts carried out by Claim'N Win Ltd on my behalf shall have the same affects as

                    acts of my own.

                </p>

            </div>

        </div> --}}

        <footer>
          <div class="footer_text" style="text-align: center;">
            <h5 style="font-size: 10px;">Registered Office: 39 Montefiore Court, 69 Stamford Hill, London N16 5TY / Registered in England Company No: 9748199</h5>
          </div>
        </footer>

    </div>

</textarea>
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
