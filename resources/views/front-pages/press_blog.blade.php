@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/press_blog.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">
      @if ($responseDecoded)
        {!! $responseDecoded['data']['translations'][0]['translatedText'] !!}
      @else
        {!! $text[0] !!}
      @endif
    </h1>
  </div>
@endsection

@section('content')
<div class="container">
    <div class="first_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][1]['translatedText'] !!}
                      @else
                        {!! $text[1] !!}
                      @endif
                    </h1>
                </div>
                <div class="first_row_p no_padding_bottom">
                    <p>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                      @else
                        {!! $text[2] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="blog_row">
        <div class="row">
            <div class="col-md-12">
                @foreach($blogs as $row)
                <div class="single_common_row">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single_row_img">
                                <img src="{{asset($row['image'])}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="blog_title_row">

                                  @if ($row['title'] )
                                    <h1>{!! $row['title']['data']['translations'][0]['translatedText'] !!}</h1>
                                  @else
                                    <h1>{!! $row['main_title'] !!}</h1>
                                  @endif

                                
                            </div>
                            <div class="blog_p">
                                <p>
                                    <strong>
                                      @if ($responseDecoded)
                                        {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                                      @else
                                        {!! $text[3] !!}
                                      @endif

                                     {{Carbon\Carbon::parse($row['created_at'])->format('d-m-Y h:i A')}}</strong>
                                </p>
                            </div>
                            <div class="blog_p no_bottom_padding">
                                <p>

                                  @if ($row['body'] )
                                    {!! $row['body']['data']['translations'][0]['translatedText'] !!}
                                  @else
                                    {!! $row['main_body'] !!}
                                  @endif
                                </p>
                            </div>
                            <div class="blog_btn">
                                <a href="{{url($row['slug']) }}" class="btn btn-lg btn-primary">
                                      @if ($responseDecoded)
                                        {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                                      @else
                                        {!! $text[4] !!}
                                      @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="read_more">
        <div class="row">
            <div class="col-md-12">
                {{-- <div class="read_more_btn">
                    <a href="#" class="btn btn-lg">READ MORE</a>
                </div> --}}
                {{$all_blogs->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
