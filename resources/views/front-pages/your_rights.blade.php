@extends('layouts.front_layout')

@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/your_rights.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">Your Rights</h1>
  </div>
@endsection


@section('content')
  <div class="container">
    <div class="your_rights_top_content">
      <div class="top_content_header">
        <h1 class="text-center">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h1>
      </div>
      <div class="top_content_paragraph">
        <p class="text-center">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
      </div>
      <a href="{{ url('/form-claim') }}">
        <div class="your_rights_compensation_button text-center">
          <button class="pull-center" type="button" name="button">START YOUR CLAIM</button>
        </div>
      </a>
    </div>
  </div>
@endsection
