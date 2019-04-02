@extends('front-end.user.user_panel_layout')

@section('user_panel_main_section')

<div class="user_panel_main_section">
  <div class="container">
    <div class="affiliate_mother_div ">
      <div class="affiliate_link_div text-center">
        <br>
        <br>
        <h1 class="text-center">Share link and earn</h1>
        <br>
        <br>
        <input class="form-control text-center" style='width:300px; margin: 0 auto; padding: 1%;' type="text" name="" value="{{url('user/signup/'.$encrypt_user_id)}}">
      </div>

      <div class="affiliate_icon_div text-center">
        <a href="https://twitter.com/minimalmonkey" class="icon-button twitter"><i class="fab fa-twitter"></i><span></span></a>
        <a href="https://facebook.com" class="icon-button facebook"><i class="fab fa-facebook-f"></i><span></span></a>
        <a href="https://plus.google.com" class="icon-button envelope"><i class="far fa-envelope"></i><span></span></a>
        <a href="https://plus.google.com" class="icon-button whatsapp"><i class="fab fa-whatsapp"></i><span></span></a>
      </div>
    </div>
  </div>
</div>


@endsection
