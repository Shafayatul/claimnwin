@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/press_blog.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">Blog Page</h1>
  </div>
@endsection

@section('content')
<div class="container">
    <div class="first_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>About all things concerning aviation</h1>
                </div>
                <div class="first_row_p no_padding_bottom">
                    <p>
                        Every week we illustrate various subjects regarding our service, passenger rights and commercial aviation. Of course, as we have a lot of experience on the matter,
                        we also provide you with tips & tricks regarding air travel.
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
                                <img src="{{asset($row->image)}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="blog_title_row">
                                <h1>{{$row->title}}</h1>
                            </div>
                            <div class="blog_p">
                                <p>
                                    <strong>Posted at {{Carbon\Carbon::parse($row->created_at)->format('h:i A')}}</strong> in Lifestyle by phpyouth  |  3 Comments  |  0 Likes
                                </p>
                            </div>
                            <div class="blog_p no_bottom_padding">
                                <p>
                                    {!! str_limit(strip_tags($row->body), 100) !!}
                                </p>
                            </div>
                            <div class="blog_btn">
                                <a href="{{url('/single-blog/'.str_slug($row->title).'/'.$row->id)}}" class="btn btn-lg btn-primary">Read More</a>
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
                {{$blogs->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
