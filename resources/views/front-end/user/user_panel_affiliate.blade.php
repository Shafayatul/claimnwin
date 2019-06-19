@extends('layouts.user_front_layout')

@section('header-script')
  <style>
      ul{
          padding: 0px;
          margin: 0px;
      }
      ul li{
          list-style: none;
          float: left;
      }

      #facebook{
          color: blue;
          font-size: 60px;
          margin-right: 20px;
      }


      #twitter{
          color: #2EFAFA;
          font-size: 60px;
          margin-right: 20px;
      }

      #linkedin{
          color: #0077B5;
          font-size: 60px;
          margin-right: 20px;
      }

      #whatsapp{
          color: #82DC28;
          font-size: 60px;
      }

  </style>
@endsection

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >

<div class="user_panel_main_section">
  <div class="container">
    <div class="affiliate_mother_div ">
      <div class="affiliate_link_div text-center">
        <br>
        <br>
        <h1 class="text-center">
          @if ($responseDecoded)
            {!! $responseDecoded['data']['translations'][0]['translatedText'] !!}
          @else
            {!! $text[0] !!}
          @endif
        </h1>
        <br>
        <br>
        <input class="form-control text-center" style='width:300px; margin: 0 auto; padding: 1%;' type="text" name="" value="{{url('user/signup/'.$encrypt_user_id)}}">
      </div>

      <div class="affiliate_icon_div text-center">

        {!! $facebook !!}

        {!! $twitter !!}

        {!! $linkedin !!}

        {!! $whatsapp !!}


        {{-- <a href="https://twitter.com/minimalmonkey" class="icon-button twitter"><i class="fab fa-twitter"></i><span></span></a>
        {{--  --}}
        {{-- <a href="https://plus.google.com" class="icon-button envelope"><i class="far fa-envelope"></i><span></span></a> --}}
        {{-- <a href="https://plus.google.com" class="icon-button whatsapp"><i class="fab fa-whatsapp"></i><span></span></a> --}}
      </div>

    {{-- @php
        echo $share;
    @endphp --}}
    </div>
  </div>
</div>


@endsection
