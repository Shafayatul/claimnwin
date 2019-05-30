@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/press_blog.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
  <h1 class="text-center">Blog Page <span style="color: green;">/</span> {{$post->title}}</h1>
  </div>
@endsection

@section('content')
<div class="container">
    <div class="first_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>{{asset($post->title)}}</h1>
                </div>
                <div class="first_row_p no_padding_bottom">
                    <p>
                        {!! $post->body !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

{{--     <div class="blog_row">
        <div class="row">
            <div class="col-md-12">

                <div class="single_common_row">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single_row_img">
                                <img src="{{asset($post->image)}}" alt="">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="single_common_row">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog_title_row">
                                <h1>{{$post->title}}</h1>
                            </div>
                            <div class="blog_p">
                                <p>
                                    {!! $post->body !!}
                                </p>
                            </div>
                            <div class="blog_p no_bottom_padding">
                                <p>
                                    <strong>Posted at {{Carbon\Carbon::parse($post->created_at)->format('h:i A')}}</strong> in Lifestyle by phpyouth  |  3 Comments  |  0 Likes
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
