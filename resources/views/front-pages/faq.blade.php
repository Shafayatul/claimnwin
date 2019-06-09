@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/faq.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">FAQ's</h1>
  </div>
@endsection

@section('content')
  <div class="container">
    <div class="faq_main_content">
      <div class="row">
        <div class="col-md-12">
          <div class="content_title_div text-center">
            <h2>Frequently Asked Questions</h2>
          </div>
        </div>
      </div>
      <div class="panel_div">
        <div class="row">
          <div class="col-md-12">

            <div class="wrapper center-block">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @if(count($faqs) > 0)
            @foreach($faqs as $faq)
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        {{$faq->title}}
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                        {{$faq->content}}
                  </div>
                </div>
              </div>
            @endforeach
            @else
                <h3 class="text-center text-info">No Faqs Here Now!!!</h3>
            @endif
            </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer-script')
  <script type="text/javascript">
  $('.panel-collapse').on('show.bs.collapse', function () {
 $(this).siblings('.panel-heading').addClass('active');
});

$('.panel-collapse').on('hide.bs.collapse', function () {
 $(this).siblings('.panel-heading').removeClass('active');
});
  </script>
@endsection
