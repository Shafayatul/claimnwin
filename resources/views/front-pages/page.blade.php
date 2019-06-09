@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/privacy_policy.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">{{$singlePost->title}}</h1>
  </div>
@endsection

@section('content')
<div class="container">
    <div class="first_row">
        <div class="row">
            <div class="col-md-12">
                {!! $singlePost->body !!}
            </div>
        </div>
    </div>
</div>
@endsection
