<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>

    </style>
</head>

<body>
  <textarea class="tinymce-editor" rows="50">
  <div class="wrapper">
    <div class="parent-div">
      <div class="row">
        <div class="col-md-12">
          <div class="logo-img-div">
            <img src="{{asset('front_asset/img/logo.png')}}" alt="" >
          </div>
        </div>
      </div>
    </div>
    <div class="parent-div">
      <div class="row">
        <div class="col-md-12">
          <h1>Assignment form</h1>
        </div>
      </div>
    </div>
    <div class="parent-div">
      <div class="left-child">
        <p class="vb">{{$passenger->first_name." ".$passenger->last_name}}</p>
      </div>
      <div class="right-child">
        <p class="vb">
          @if ($passenger->booking_refernece != 0)
            {{ $passenger->booking_refernece." - ".Carbon\Carbon::parse($passenger->created_at)->format('jS F, Y') }}</h5>
          @else
            {{"No Reference Found"}}
          @endif
        </p>
      </div>
      <div class="left">
        <p class="fs-16">First name and Last name (the “Client”)</p>
      </div>
      <div class="right">
        <p class="fs-16">Booking reference</p>
      </div>
    </div>
    <div class="parent-div">
      <div class="address">
        <p class="vb">{{$passenger->address}}</p>
      </div>
      <div class="address-botttom">
        <p class="fs-16">Address</p>
      </div>
    </div>
    <div class="parent-div">
      <div class="paragraph-div">
        <p class="pb-20">The Client hereby assigns to Claim'N Win full ownership and legal title to his/her Claim, meaning any claim against the airline for monetary and goodwill compensation, damages or refund pursuant to any Air Passenger Rights Regulation, or as a gesture of goodwill in relation to the above operated flight(s) identified by the booking reference pursuant to the T&C.
        </p>
        <p>The Client authorizes Claim'N Win to request the operating carrier not to process his/her personal data in relation to the Claim pursuant to applicable personal data protection laws, except only to verify the Claim.
        </p>
        <p>
          The Client understands that this means that he/she cannot accept any direct contact or payment from the operating carrier. If the assignment pursuant to this assignment form is declared invalid for any reason, the assignment form shall be considered a power of attorney granted by the Client to Claim'N Win, pursuant to which Claim’N Win is granted exclusive power, with full substitution right, to:
        </p>
        <p>
          - represent the Client legally before third parties in relation to the Claim;
        </p>
        <p>
          - obtain every type of information required, as well as to initiate information requests with respect to any civil or administrative law proceeding and to initiate complaints with the respective courts or administrative bodies responsible for the enforcement of air passenger rights regulation on behalf of the Client;
        </p>
        <p>
          - initiate, conduct and undertake every type of negotiations as well as legal - judicial and extrajudicial - measures appropriate to collect Client's Claim from the operating carrier;
        </p>
        <p>
          - request the operating carrier not to process his/her personal data in relation to the Claim pursuant to applicable personal data protection laws, except only to verify the Claim;
        </p>
        <p>
          - collect and receive payments in relation to the Claim on the Client's behalf.
        </p>
      </div>
    </div>
    <div class="parent-div">
      <div class="signature-date-div">
        <div class="signature-div">
          @if($empty_sig)
            <img class="vb" src="{{ asset('empty-sig.png') }}" alt="">
          @else
            <img class="vb" src="{{ asset('/uploads/sig/'.$claim->id.'.png') }}" alt="">
          @endif
          <p class="fs-16 tc pr">Signature</p>
        </div>
        <div class="date-div">
          <p class="vb-c">{{Carbon\Carbon::today()->format('jS F, Y')}}</p>
          <p class="fs-16 tc pr-2">Date</p>
        </div>
{{--         <div class="left">
          
        </div>
        <div class="right">
          
        </div> --}}
      </div>
    </div>
    <div class="parent-div">
      <div class="terms-n-condition">
        <p>* The defined terms in this Assignment Form shall have the meaning given to them in our Terms and Conditions</p>
      </div>
    </div>
  </div>

    <footer>
      <div class="wrapper">
        <div class="parent-div">
          <div class="left">
            <p class="fb">
              Got questions? Ask here info@claimnwin.com
              <br>
              www.claimnwin.com
            </p>
          </div>
          <div class="right">
            <p class="fb tr"></p>
          </div>
        </div>
        <p class="nm">Registered Office: 39 Montefiore Court, 69 Stamford Hill, London N16 5TY / Registered in England Company No: 9748199</p>
      </div>
    </footer>

</textarea>





<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
        path_absolute : "{{url('/').'/'}}",
        selector: ".tinymce-editor",
        plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
        ],
        content_css: "{{ asset('css/mytinymice.css') }}",
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
