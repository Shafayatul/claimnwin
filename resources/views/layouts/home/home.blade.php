@extends('layouts.front_layout_home')

@section('header-script')
<style>
html{font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}body{margin:0}header,nav{display:block}a{background-color:transparent}h1{margin:.67em 0;font-size:2em}img{border:0}button{margin:0;font:inherit;color:inherit}button{overflow:visible}button{text-transform:none}button{-webkit-appearance:button}button::-moz-focus-inner{padding:0;border:0}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{font-size:10px}body{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff}button{font-family:inherit;font-size:inherit;line-height:inherit}a{color:#337ab7;text-decoration:none}img{vertical-align:middle}h1,h5{font-family:inherit;font-weight:500;line-height:1.1;color:inherit}h1{margin-top:20px;margin-bottom:10px}h5{margin-top:10px;margin-bottom:10px}h1{font-size:36px}h5{font-size:14px}p{margin:0 0 10px}.text-center{text-align:center}.text-uppercase{text-transform:uppercase}ul{margin-top:0;margin-bottom:10px}ul ul{margin-bottom:0}.container{padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.row{margin-right:-15px;margin-left:-15px}.col-md-12,.col-md-6,.col-md-9,.col-xs-6{position:relative;min-height:1px;padding-right:15px;padding-left:15px}.col-xs-6{float:left}.col-xs-6{width:50%}@media (min-width:992px){.col-md-12,.col-md-6,.col-md-9{float:left}.col-md-12{width:100%}.col-md-9{width:75%}.col-md-6{width:50%}}.btn{display:inline-block;padding:6px 12px;margin-bottom:0;font-size:14px;font-weight:400;line-height:1.42857143;text-align:center;white-space:nowrap;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;background-image:none;border:1px solid transparent;border-radius:4px}.btn-primary{color:#fff;background-color:#337ab7;border-color:#2e6da4}.fade{opacity:0}.collapse{display:none}.caret{display:inline-block;width:0;height:0;margin-left:2px;vertical-align:middle;border-top:4px dashed;border-top:4px solid\9;border-right:4px solid transparent;border-left:4px solid transparent}.dropdown{position:relative}.btn .caret{margin-left:0}.nav{padding-left:0;margin-bottom:0;list-style:none}.nav>li{position:relative;display:block}.nav>li>a{position:relative;display:block;padding:10px 15px}.navbar{position:relative;min-height:50px;margin-bottom:20px;border:1px solid transparent}@media (min-width:768px){.navbar{border-radius:4px}}@media (min-width:768px){.navbar-header{float:left}}.navbar-collapse{padding-right:15px;padding-left:15px;overflow-x:visible;-webkit-overflow-scrolling:touch;border-top:1px solid transparent;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.1);box-shadow:inset 0 1px 0 rgba(255,255,255,.1)}@media (min-width:768px){.navbar-collapse{width:auto;border-top:0;-webkit-box-shadow:none;box-shadow:none}.navbar-collapse.collapse{display:block!important;height:auto!important;padding-bottom:0;overflow:visible!important}}.container>.navbar-collapse,.container>.navbar-header{margin-right:-15px;margin-left:-15px}@media (min-width:768px){.container>.navbar-collapse,.container>.navbar-header{margin-right:0;margin-left:0}}.navbar-brand{float:left;height:50px;padding:15px 15px;font-size:18px;line-height:20px}.navbar-brand>img{display:block}@media (min-width:768px){.navbar>.container .navbar-brand{margin-left:-15px}}.navbar-toggle{position:relative;float:right;padding:9px 10px;margin-top:8px;margin-right:15px;margin-bottom:8px;background-color:transparent;background-image:none;border:1px solid transparent;border-radius:4px}@media (min-width:768px){.navbar-toggle{display:none}}.navbar-nav{margin:7.5px -15px}.navbar-nav>li>a{padding-top:10px;padding-bottom:10px;line-height:20px}@media (min-width:768px){.navbar-nav{float:left;margin:0}.navbar-nav>li{float:left}.navbar-nav>li>a{padding-top:15px;padding-bottom:15px}}@media (min-width:768px){.navbar-right{float:right!important;margin-right:-15px}.navbar-right~.navbar-right{margin-right:0}}.close{float:right;font-size:21px;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;filter:alpha(opacity=20);opacity:.2}button.close{-webkit-appearance:none;padding:0;background:0 0;border:0}.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;overflow:hidden;-webkit-overflow-scrolling:touch;outline:0}.modal.fade .modal-dialog{-webkit-transform:translate(0,-25%);-ms-transform:translate(0,-25%);-o-transform:translate(0,-25%);transform:translate(0,-25%)}.modal-dialog{position:relative;width:auto;margin:10px}.modal-content{position:relative;background-color:#fff;-webkit-background-clip:padding-box;background-clip:padding-box;border:1px solid #999;border:1px solid rgba(0,0,0,.2);border-radius:6px;outline:0;-webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);box-shadow:0 3px 9px rgba(0,0,0,.5)}.modal-header{padding:15px;border-bottom:1px solid #e5e5e5}.modal-header .close{margin-top:-2px}.modal-title{margin:0;line-height:1.42857143}.modal-body{position:relative;padding:15px}.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}@media (min-width:768px){.modal-dialog{width:600px;margin:30px auto}.modal-content{-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}}.clearfix:after,.clearfix:before,.container:after,.container:before,.modal-footer:after,.modal-footer:before,.modal-header:after,.modal-header:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.row:after,.row:before{display:table;content:" "}.clearfix:after,.container:after,.modal-footer:after,.modal-header:after,.nav:after,.navbar-collapse:after,.navbar-header:after,.navbar:after,.row:after{clear:both}@-ms-viewport{width:device-width}@charset "UTF-8";.hamburger{font:inherit;display:inline-block;overflow:visible;margin:0;padding:15px;text-transform:none;color:inherit;border:0;background-color:transparent}.hamburger-box{position:relative;display:inline-block;width:40px;height:24px}.hamburger-inner{top:50%;display:block;margin-top:-2px}.hamburger-inner,.hamburger-inner:after,.hamburger-inner:before{position:absolute;width:40px;height:4px;border-radius:4px;background-color:#000}.hamburger-inner:after,.hamburger-inner:before{display:block;content:""}.hamburger-inner:before{top:-10px}.hamburger-inner:after{bottom:-10px}.hamburger--collapse .hamburger-inner{top:auto;bottom:0}.hamburger--collapse .hamburger-inner:after{top:-20px}*{margin:0;padding:0;border:0;outline:0;-webkit-box-sizing:border-box!important;-moz-box-sizing:border-box!important;-ms-box-sizing:border-box!important;-o-box-sizing:border-box!important;box-sizing:border-box!important}a,a:visited{color:inherit;text-decoration:none!important;outline:0!important}li,ul{list-style-type:none}body{font-family:Poppins,sans-serif!important;background:#fff}.page-wrapper{overflow:hidden}body::-webkit-scrollbar-track{background-color:#fff}body::-webkit-scrollbar{width:10px}body::-webkit-scrollbar-thumb{background-color:#1d1e22}li,ul{list-style-type:none;margin-top:0;margin-bottom:0;padding-left:0}h1,h5{margin:0}p{margin-bottom:0}button{background-color:transparent;border:0;outline:0!important}img{max-width:100%}nav{margin-bottom:0}[data-target="#mainMenu"]{position:relative;z-index:999;display:none}.hamburger{padding:15px 15px 10px}.hamburger-inner,.hamburger-inner::after,.hamburger-inner::before{background:#000!important}.main-nav .navbar-brand{padding:0}#mainMenu a{font-weight:600;color:#242424;text-transform:uppercase;background:0 0!important}::-webkit-scrollbar{width:.2em;height:2em}::-webkit-scrollbar-button{background:#ccc}::-webkit-scrollbar-track-piece{background:#888}::-webkit-scrollbar-thumb{background:#eee}.signup{margin-top:12px}.signup a{padding:3px 5px!important;border-radius:3px;border:1px solid #3c3c3c}#mainMenu ul{margin-top:10px}@media (max-width:1199px){[data-target="#mainMenu"]{display:block;-webkit-transform:translateY(14px);-ms-transform:translateY(14px);-o-transform:translateY(14px);transform:translateY(14px)}.navbar-header{float:none}.navbar-right{float:none!important}.navbar-toggle{display:block}.navbar-collapse.collapse{display:none!important}.navbar-nav{float:none!important}.navbar-nav>li{float:none}#mainMenu>ul{text-align:center}#mainMenu>ul:first-of-type{padding-right:10px}}@media (max-width:767px){.main-nav{padding-bottom:5px}.main-nav .navbar-brand{padding-top:5px;padding-left:15px;padding-bottom:5px}#mainMenu{margin-top:20px;overflow-x:hidden}}@charset "UTF-8";@charset 'UTF-8';.options_div{width:100%;display:block;overflow:hidden;padding-top:50px}.total_box_1{width:19%;display:block;overflow:hidden;float:left;margin-right:10px}.total_box_2{width:26%;display:block;overflow:hidden;float:left;margin-right:10px}.total_box_3{width:20%;display:block;overflow:hidden;float:left;margin-right:10px}.total_box_4{width:30%;display:block;overflow:hidden;float:left}.box_left_part_1{width:37%;float:left}.box_right_part_1{width:63%;float:left}.box_left_part_2{width:27%;float:left}.box_right_part_2{width:73%;float:left}.box_left_part_3{width:36%;float:left}.box_right_part_3{width:64%;float:left}.box_left_part_4{width:24%;float:left}.box_right_part_4{width:76%;float:left}.box_left_part_img_container{width:50px;height:50px}.box_left_part_img_container img{width:100%;display:block}*{box-sizing:border-box}.main_nav_container{background-image:url(../img/homepage_header_img.jpg);background-repeat:no-repeat;background-position:center;background-size:cover;border-bottom:1px solid #8dac2d}.clearfix_display_none{display:none}.home_top_header_div{padding:100px 0 100px 0}.home_top_header_title_h1_div h1{font-size:30px;color:#124478;line-height:45px}.extra_color{color:#99b53b}.home_top_header_title_p_div{padding-top:10px}.home_top_header_title_ul_div{padding-top:10px}.fa-ul{margin-left:0!important}.fa-ul li{line-height:30px}.li_mother_div{width:100%;display:block;overflow:hidden}.li_icon_div{width:5%;float:left}.li_icon_div i{vertical-align:middle}.li_text_div{width:95%;float:left}.fa-check-circle{padding-right:20px;color:#124479}.home_top_header_departed_destination_div{padding-top:25px}.common_button{margin:0 auto;width:300px;padding:10px;height:45px;background-color:#8dac2d;color:#fff;font-weight:700}.home_top_header_option_text_p_title_div{font-size:20px;color:#124479;font-weight:700}.home_top_header_option_text_p_normal_div{font-size:12px;font-weight:700}.how_it_works_div{padding:80px 0 80px 0}.how_it_works_lower_div{padding:100px 0}.how_it_works_title_div{width:50%;margin:0 auto;padding:40px 0;background-image:url(../img/homepage_how_it_works_background.png);background-position:center;background-repeat:no-repeat}.how_it_works_title_div h1{font-size:30px;color:#124478}@media (min-width:320px) and (max-width:480px){.total_box_1{width:45%;margin-right:0}.total_box_2{width:55%;margin-right:0}.total_box_3{width:45%;margin-right:0;margin-top:20px}.total_box_4{width:55%;margin-right:0;margin-top:20px}.box_left_part_4{width:30%}.box_right_part_4{width:70%}.box_left_part_img_container{width:40px;height:40px}.home_top_header_div{padding:30px 0 30px 0}.home_top_header_title_h1_div h1{text-align:center;font-size:25px;padding:0 10px;line-height:35px}.home_top_header_title_h1_div h1 br{display:none}.home_top_header_title_p_div,.home_top_header_title_ul_div{padding-left:10px;padding-right:10px;font-size:12px}.home_top_header_departed_destination_div{padding-left:10px;padding-right:10px}.common_button{margin:0 auto;width:100%;font-size:10px}.li_icon_div{width:7%}.li_text_div{width:93%}::-webkit-input-placeholder{font-size:10px}:-ms-input-placeholder{font-size:10px}::-moz-placeholder{font-size:10px;opacity:1}:-moz-placeholder{font-size:10px;opacity:1}.home_top_header_option_text_p_title_div{font-size:13px}.how_it_works_title_div{background-image:none;padding:10px 0;width:100%}.how_it_works_div{padding:30px 0 0 0}.how_it_works_lower_div{padding:40px 0 0 0}}@media (min-width:481px) and (max-width:767px){.total_box_1{width:45%;margin-right:0}.total_box_2{width:55%;margin-right:0}.total_box_3{width:45%;margin-right:0;margin-top:20px}.total_box_4{width:55%;margin-right:0;margin-top:20px}.box_left_part_4{width:30%}.box_right_part_4{width:70%}.box_left_part_img_container{width:40px;height:40px}.home_top_header_div{padding:30px 0 30px 0}.home_top_header_title_h1_div h1{text-align:center;font-size:25px;padding:0 10px}.home_top_header_title_h1_div h1 br{display:none}.home_top_header_title_p_div,.home_top_header_title_ul_div{padding-left:10px;padding-right:10px;font-size:14px}.home_top_header_departed_destination_div{padding-left:10px;padding-right:10px}.common_button{margin:0 auto;width:100%;font-size:11px}.how_it_works_title_div{background-image:none;padding:10px 0;width:100%}.how_it_works_div{padding:30px 0 0 0}.how_it_works_lower_div{padding:50px 0 0 0}}@media (min-width:768px) and (max-width:1024px){.home_top_header_option_text_p_title_div{font-size:17px}.box_left_part_img_container{width:40px;height:40px}.home_top_header_div{padding:30px 0 30px 0}.home_top_header_title_h1_div h1{text-align:center;font-size:25px;padding:0 10px}.home_top_header_title_h1_div h1 br{display:none}.home_top_header_title_p_div,.home_top_header_title_ul_div{padding-left:10px;padding-right:10px;font-size:14px}.home_top_header_departed_destination_div{padding-left:10px;padding-right:10px}.common_button{margin:0 auto;width:100%;font-size:11px}.how_it_works_title_div{background-image:none;padding:10px 0;width:100%}.how_it_works_div{padding:30px 0 0 0}.how_it_works_lower_div{padding:50px 0 0 0}}.sprite{background-image:url(../../../spritesheet.png);background-repeat:no-repeat;display:block}.sprite-homepage_top_header_bank_icon{width:48px;height:46px;background-position:-272px -5px}.sprite-homepage_top_header_group_icon{width:53px;height:46px;background-position:-431px -5px}.sprite-lock{width:12px;height:15px;background-position:-494px -5px;display:inline-block}.sprite-phone{width:15px;height:15px;background-position:-516px -5px;display:inline-block}@media screen and (-webkit-min-device-pixel-ratio:0) and (min-resolution:.001dpcm){.main_nav_container{background-image:url(../img/homepage_header_img.webp)}}@media screen and(-webkit-min-device-pixel-ratio:0){.main_nav_container{-chrome-:only(;
     background-image:url(../img/homepage_header_img.webp);
  )}}
</style>
@endsection

@section('page-title')
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="home_top_header_div">
          <div class="row">
            <div class="col-md-12" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_title_h1_div">
                <h1>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][0]['translatedText'] !!}
                  @else
                    {!! $text[0] !!}
                  @endif
                </h1>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_title_p_div">
                <p>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][1]['translatedText'] !!}
                  @else
                    {!! $text[1] !!}
                  @endif
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_title_ul_div">
                <ul class="fa-ul">
                  <li>
                    <div class="li_mother_div">
                      <div class="li_icon_div">
                        <i class="fas fa-check-circle"></i>
                      </div>
                      <div class="li_text_div">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                        @else
                          {!! $text[2] !!}
                        @endif
                        {!! $amount1 !!}
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                        @else
                          {!! $text[3] !!}
                        @endif
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="li_mother_div">
                      <div class="li_icon_div">
                        <i class="fas fa-check-circle"></i>
                      </div>
                      <div class="li_text_div">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                        @else
                          {!! $text[2] !!}
                        @endif
                        {!! $amount2 !!}
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                        @else
                          {!! $text[4] !!}
                        @endif
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="li_mother_div">
                      <div class="li_icon_div">
                        <i class="fas fa-check-circle"></i>
                      </div>
                      <div class="li_text_div">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                        @else
                          {!! $text[2] !!}
                        @endif
                        {!! $amount3 !!}
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
                        @else
                          {!! $text[5] !!}
                        @endif
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="home_top_header_departed_destination_div">
                {{-- <form class="" action="index.html" method="post"> --}}
                  <div class="row">
                    <div class="col-md-6 col-xs-6 " style="margin: 0px; padding: 0px;">
                      <button class="common_button set_cache_claim" type="button" name="button">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                        @else
                          {!! $text[6] !!}
                        @endif
                      </button>
                    </div>
                  </div>
                {{-- </form> --}}
              </div>
            </div>
          </div>

          <div class="options_div">
            <div class="total_box_1">
              <div class="box_left_part_1">
                <div class="box_left_part_img_container">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_free_icon.png') }}" alt="">
                </div>
              </div>
              <div class="box_right_part_1">
                <div class="box_right_part_text_container">
                  <p class="home_top_header_option_text_p_title_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][7]['translatedText'] !!}
                    @else
                      {!! $text[7] !!}
                    @endif
                  </p>
                  <p class="home_top_header_option_text_p_normal_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][8]['translatedText'] !!}
                    @else
                      {!! $text[8] !!}
                    @endif
                  </p>
                </div>
              </div>
            </div>
            <div class="total_box_2">
              <div class="box_left_part_2">
                <div class="box_left_part_img_container">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_dollar_icon.png') }}" alt="">
                  {{-- <i class="sprite sprite-homepage_top_header_dollar_icon"></i> --}}
                </div>
              </div>
              <div class="box_right_part_2">
                <div class="box_right_part_text_container">
                  <p class="home_top_header_option_text_p_title_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][9]['translatedText'] !!}
                    @else
                      {!! $text[9] !!}
                    @endif
                    {{$amount4}}
                  </p>
                  <p class="home_top_header_option_text_p_normal_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][10]['translatedText'] !!}
                    @else
                      {!! $text[10] !!}
                    @endif
                  </p>
                </div>
              </div>
            </div>
            <div class="total_box_3">
              <div class="box_left_part_3">
                <div class="box_left_part_img_container">
                  {{-- <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_group_icon.png') }}" alt=""> --}}
                  <i class="sprite sprite-homepage_top_header_group_icon"></i>
                </div>
              </div>
              <div class="box_right_part_3">
                <div class="box_right_part_text_container">
                  <p class="home_top_header_option_text_p_title_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][11]['translatedText'] !!}
                    @else
                      {!! $text[11] !!}
                    @endif
                  </p>
                  <p class="home_top_header_option_text_p_normal_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][12]['translatedText'] !!}
                    @else
                      {!! $text[12] !!}
                    @endif
                  </p>
                </div>
              </div>
            </div>
            <div class="total_box_4">
              <div class="box_left_part_4">
                <div class="box_left_part_img_container">
                  {{-- <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_bank_icon.png') }}" alt=""> --}}
                  <i class="sprite sprite-homepage_top_header_bank_icon"></i>
                </div>
              </div>
              <div class="box_right_part_4">
                <div class="box_right_part_text_container">
                  <p class="home_top_header_option_text_p_title_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][13]['translatedText'] !!}
                    @else
                      {!! $text[13] !!}
                    @endif
                  </p>
                  <p class="home_top_header_option_text_p_normal_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][14]['translatedText'] !!}
                    @else
                      {!! $text[14] !!}
                    @endif
                  </p>
                </div>
              </div>
            </div>

          </div>
          {{-- <div class="row">
            <div class="col-md-12" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_options_div">
                <div class="row">
                  <div class="col-md-3 col-xs-6 padding_left_right_none">
                    <div class="row padding_bottom">
                      <div class="col-md-3 col-xs-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_free_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">It's FREE</p>
                          <p class="home_top_header_option_text_p_normal_div">to claim</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6 padding_left_right_none">
                    <div class="row padding_bottom">
                      <div class="col-md-3 col-xs-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_dollar_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">Up to {!! $amount4 !!}</p>
                          <p class="home_top_header_option_text_p_normal_div">compensation</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6 padding_left_right_none">
                    <div class="row padding_bottom">
                      <div class="col-md-3 col-xs-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_group_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">Trusted</p>
                          <p class="home_top_header_option_text_p_normal_div">by millions</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6 padding_left_right_none">
                    <div class="row padding_bottom">
                      <div class="col-md-3 col-xs-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_bank_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">8 Billion EUR</p>
                          <p class="home_top_header_option_text_p_normal_div">available to claim</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="container">
  <!-- How it works div starts -->
  <div class="how_it_works_div">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <div class="how_it_works_title_div text-center">
              <h1>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][15]['translatedText'] !!}
                @else
                  {!! $text[15] !!}
                @endif
              </h1>
            </div>
          </div>
        </div>
        <div class="how_it_works_lower_div">
          <div class="row">
            <div class="col-md-4 text-center margin_bottom">
              <div class="how_it_works_background_icon_div">
                <div class="how_it_works_icon_div">
                  {{-- <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_how_it_works_compensation.png') }}" alt=""> --}}
                  <i class="sprite sprite-homepage_how_it_works_compensation"></i>
                </div>
              </div>
              <div class="how_it_works_text_div">
                <p class="how_it_works_text_upper_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][16]['translatedText'] !!}
                  @else
                    {!! $text[16] !!}
                  @endif
                </p>
                <p class="how_it_works_text_lower_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][17]['translatedText'] !!}
                  @else
                    {!! $text[17] !!}
                  @endif
                </p>
              </div>
            </div>
            <div class="col-md-4 text-center margin_bottom">
              <div class="how_it_works_background_icon_div">
                <div class="how_it_works_icon_div">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_how_it_works_admin_setting_male.png') }}" alt="">
                </div>
              </div>
              <div class="how_it_works_text_div">
                <p class="how_it_works_text_upper_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][18]['translatedText'] !!}
                  @else
                    {!! $text[18] !!}
                  @endif
                </p>
                <p class="how_it_works_text_lower_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][19]['translatedText'] !!}
                  @else
                    {!! $text[19] !!}
                  @endif
                </p>
              </div>
            </div>
            <div class="col-md-4 text-center margin_bottom">
              <div class="how_it_works_background_icon_div">
                <div class="how_it_works_icon_div">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_how_it_works_receive_cash.png') }}" alt="">
                </div>
              </div>
              <div class="how_it_works_text_div">
                <p class="how_it_works_text_upper_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][20]['translatedText'] !!}
                  @else
                    {!! $text[20] !!}
                  @endif
                </p>
                <p class="how_it_works_text_lower_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][21]['translatedText'] !!}
                  @else
                    {!! $text[21] !!}
                  @endif
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- How it works div ends -->

  <!-- What customer say div starts -->

<div class="what_customer_say_div">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="what_customer_say_title_div text-center">
                <h1>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][22]['translatedText'] !!}
                  @else
                    {!! $text[22] !!}
                  @endif
                </h1>
                </div>
            </div>
        </div>
        <div class="what_customer_say_lower_div">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-area slider">
                        @foreach($reviews as $review)
                        <div class="sliding_div">
                            <div class="sliding_div_rating_div">
                                @if($review->star == 5)
                                {{-- <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span> --}}
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                @elseif($review->star == 4)
                                {{-- <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span> --}}
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                @elseif($review->star == 3)
                                {{-- <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span> --}}
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                @elseif($review->star == 2)
                                {{-- <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span> --}}
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                @else
                                {{-- <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span> --}}
                                <span class="rating_span"><i class="sprite sprite-rating_img"></i></span>
                                @endif
                            </div>

                            <div class="sliding_div_title_p_div">
                                <p>
                                  @if ($responseDecoded)
                                    {!! $review_title['data']['translations'][$loop->index]['translatedText'] !!}
                                  @else
                                    {!! $review_title[$loop->index] !!}
                                  @endif
                                </p>
                            </div>
                            <div class="sliding_div_text_p_div" style="overflow:hidden;">
                                  @if ($responseDecoded)
                                    {!! $review_description['data']['translations'][$loop->index]['translatedText'] !!}
                                  @else
                                    {!! $review_description[$loop->index] !!}
                                  @endif
                                {{-- {!! Str::limit($review->description, 100) !!} --}}
                            </div>
                            <div class="sliding_div_customer_name_div">
                                <p>
                                  @if ($responseDecoded)
                                    {!! $review_name['data']['translations'][$loop->index]['translatedText'] !!}
                                  @else
                                    {!! $review_name[$loop->index] !!}
                                  @endif
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- What customer say div ends -->

  <!-- Our Process div Starts -->
  <div class="our_process_div">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="our_process_div_title_div text-center">
            <h1>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][23]['translatedText'] !!}
              @else
                {!! $text[23] !!}
              @endif
            </h1>
          </div>
        </div>
      </div>
      <div class="our_process_lower_div">
        <div class="row">
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              {{-- <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_calculator.png') }}" alt=""> --}}
              <i class="sprite sprite-homepage_our_process_calculator"></i>
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][24]['translatedText'] !!}
                @else
                  {!! $text[24] !!}
                @endif
              </p>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_passenger_with_bag.png') }}" alt="">
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][25]['translatedText'] !!}
                @else
                  {!! $text[25] !!}
                @endif
              </p>
            </div>
          </div>
          <div class="clearfix clearfix_display_none"></div>
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              {{-- <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_collaboration.png') }}" alt=""> --}}
              <i class="sprite sprite-homepage_our_process_collaboration"></i>
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][26]['translatedText'] !!}
                @else
                  {!! $text[26] !!}
                @endif
              </p>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              {{-- <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_cash_in_hand.png') }}" alt=""> --}}
              <i class="sprite sprite-homepage_our_process_cash_in_hand"></i>
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][27]['translatedText'] !!}
                @else
                  {!! $text[27] !!}
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Our Process div ends -->

  <!-- Free Process div Starts -->
  <div class="about_us_middle_content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12 col-12">
          <div class="about_us_middle_content_paragraph">
            <p>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][28]['translatedText'] !!}
              @else
                {!! $text[28] !!}
              @endif
            </p>
          </div>
        </div>
      </div>
        <a href="{{ url('/form-claim') }}">
          <div class="about_us_middle_content_button text-center">
            <button type="button" name="button">
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][29]['translatedText'] !!}
              @else
                {!! $text[29] !!}
              @endif
            </button>
          </div>
        </a>
    </div>
  </div>
  <!-- Free Process div ends -->




@endsection

@section('footer-script')
  <script type="text/javascript">
    $(document).ready(function(){
      if ($( window ).width() > 767) {
        $(".slider-area").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1
          });
      }else {
        $(".slider-area").slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1
          });
      }
      if ($( window ).width() < 360) {
        $('.clearfix_display_none').show();
      }else {
        $('.clearfix_display_none').hide();
      }
      $('.set_cache_claim').click(function(){
          window.location.href = "{{url('/form-claim')}}";
      });
    });
  </script>
@endsection
