@extends('layouts.user_front_layout')

@section('header-script')
  <style>
    .blockquote-footer {
      padding-top: 10px;
    }
  </style>
@endsection

@section('content')
<div class="user_panel_main_section">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="parent_div">
                    <div class="user_panel_h1">
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
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="parent_div text-center">
                    <span class="bold_span">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][1]['translatedText'] !!}
                      @else
                        {!! $text[1] !!}
                      @endif
                      :
                    </span> {{ $claims->id }}
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="parent_div text-center">
                    <span class="bold_span">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                      @else
                        {!! $text[2] !!}
                      @endif
                      :
                    </span> {{ $airline->name }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="parent_div text-center">
                    <span class="bold_span">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                      @else
                        {!! $text[3] !!}
                      @endif
                      :
                    </span>
                    {!! $claims->amount !!}
                    @if(($claims->converted_expection_amount != "") && ($claims->converted_expection_amount != null))
                        {!! '<br> ('.$claims->converted_expection_amount.')' !!}
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="parent_div text-center">
                    <span class="bold_span">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                      @else
                        {!! $text[4] !!}
                      @endif
                      :
                    </span>
                    {{$claim_staus->name}}
                </div>
            </div>
        </div>
        <div class="underline_row">

        </div>

        <div class="claim_options">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item claim_options_ul_li active">
                    <a class="nav-link active text-center" id="claim-status-tab" data-toggle="tab" href="#claim-status" role="tab" aria-controls="claim-status" aria-selected="true">
                      <i class="fas fa-signature"></i>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
                      @else
                        {!! $text[5] !!}
                      @endif
                    </a>
                </li>
                <li class="nav-item claim_options_ul_li">
                    <a class="nav-link text-center" id="ticket-tab" data-toggle="tab" href="#ticket" role="tab" aria-controls="ticket" aria-selected="false">
                      <i class="fas fa-ticket-alt"></i>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                      @else
                        {!! $text[6] !!}
                      @endif
                    </a>
                </li>
                <li class="nav-item claim_options_ul_li">
                    <a class="nav-link text-center" id="claim-details-tab" data-toggle="tab" href="#claim-details" role="tab" aria-controls="claim-details" aria-selected="false">
                      <i class="fas fa-bolt"></i>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][7]['translatedText'] !!}
                      @else
                        {!! $text[7] !!}
                      @endif
                    </a>
                </li>
                {{-- <li class="nav-item claim_options_ul_li">
                    <a class="nav-link text-center" id="message-tab" data-toggle="tab" href="#message" role="tab" aria-controls="message" aria-selected="false"><i class="far fa-comment-alt"></i> Message</a>
                </li> --}}
                <li class="nav-item claim_options_ul_li">
                    <a class="nav-link text-center" id="document-tab" data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false">
                      <i class="far fa-file-alt"></i>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][8]['translatedText'] !!}
                      @else
                        {!! $text[8] !!}
                      @endif
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" id="claim-status" role="tabpanel" aria-labelledby="claim-status-tab">


                    <div class="wrapper">
                        <div class="claim_status_refresh_icon text-center">
                            <i class="fas fa-sync" style="color: #EFF30B"></i>
                        </div>
                        <div class="claim_status_refresh_text text-center">
                        <p style="color: #EFF30B">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][9]['translatedText'] !!}
                          @else
                            {!! $text[9] !!}
                          @endif
                          {{$claim_staus->name}}
                        </p>
                        </div>
                        <div class="claim_status_message text-center">
                            <p>
                              @if ($responseDecoded)
                                {!! $responseDecoded['data']['translations'][10]['translatedText'] !!}
                              @else
                                {!! $text[10] !!}
                              @endif
                            </p>
                        </div>
                        {{-- <div class="claim_status_box_message text-center">
              <p>NO ACTION IS REQUIRED FROM YOU</p>
            </div> --}}
                    </div>




                </div>

                <div class="tab-pane fade" id="ticket" role="tabpanel" aria-labelledby="ticket-tab">
                    <div class="wrapper">
                        <blockquote class="blockquote text-right">
                          {{-- <p class="mb-0">Ticket ID: {{ $claims->ticket_id}}</p> --}}
                          <div class="blockquote-footer">
                            @if ($responseDecoded)
                              {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                            @else
                              {!! $text[4] !!}
                            @endif
                            :
                            @if ($claims->ticket_status == '1')
                              @if ($responseDecoded)
                                {!! $responseDecoded['data']['translations'][11]['translatedText'] !!}
                              @else
                                {!! $text[11] !!}
                              @endif
                            @elseif ($claims->ticket_status == '2')
                              @if ($responseDecoded)
                                {!! $responseDecoded['data']['translations'][12]['translatedText'] !!}
                              @else
                                {!! $text[12] !!}
                              @endif
                            @else
                              @if ($responseDecoded)
                                {!! $responseDecoded['data']['translations'][13]['translatedText'] !!}
                              @else
                                {!! $text[13] !!}
                              @endif
                            @endif
                          </div>
                        </blockquote>
                        @if ($claims->ticket_status != '3')
                        <div class="message_icon text-center">
                            <i class="far fa-comment-alt"></i>
                        </div>
                        <div class="message_text text-center">
                            <p>
                              @if ($responseDecoded)
                                {!! $responseDecoded['data']['translations'][14]['translatedText'] !!}
                              @else
                                {!! $text[14] !!}
                              @endif
                            </p>
                        </div>
                        <div class="message_underline_row">

                        </div>
                        <div class="user_message">
                            <form class="user_message_form single-submit" action="{{ route('user-ticket-message') }}" method="post">
                                @csrf
                                <i class="fas fa-pencil-alt prefix"></i>
                                <textarea id="" class="" name="description" placeholder="Write a message"></textarea>
                                <input type="hidden" name="ticket_id" value="{{ $claims->ticket_id }}">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" name="button" class="disable-after-first-click">
                                          @if ($responseDecoded)
                                            {!! $responseDecoded['data']['translations'][15]['translatedText'] !!}
                                          @else
                                            {!! $text[15] !!}
                                          @endif
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif

                        <div class="parent_div message_text">
                            <p class="text-center">
                              @if ($responseDecoded)
                                {!! $responseDecoded['data']['translations'][16]['translatedText'] !!}
                              @else
                                {!! $text[16] !!}
                              @endif
                            </p>
                        </div>


                        @foreach ($ticket_notes as $ticket_note)
                        @if ($ticket_note->user_id == $claims->user_id)
                        <div class="container_message">
                            {{-- <img src="{{ asset('/front_asset/user_panel/img/avatar-user.png') }}" alt="Avatar" style="width:100%;"> --}}
                            <div style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid black; float: left; position: relative; margin-right: 20px;"><p style="font-size: 12px;  font-weight: bold; position: absolute; top: 30%; left: 35%;">
                              @if ($responseDecoded)
                                {!! $responseDecoded['data']['translations'][17]['translatedText'] !!}
                              @else
                                {!! $text[17] !!}
                              @endif
                            </p></div>
                            <p>{{ $ticket_note->description }}</p>
                            <span class="time-right">{{ Carbon\Carbon::parse($ticket_note->created_at)->format('d-m-Y h:m A') }}</span>
                        </div>

                        @else
                        <div class="container_message darker">
                            {{-- <img src="{{ asset('/front_asset/user_panel/img/avatar-admin.png') }}" alt="Avatar" class="right" style="width:100%;"> --}}
                            <div style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid black; float: right; position: relative; margin-left: 20px;"><p style="font-size: 12px;  font-weight: bold; position: absolute; top: 30%; left: 14%;">
                              @if ($responseDecoded)
                                {!! $responseDecoded['data']['translations'][18]['translatedText'] !!}
                              @else
                                {!! $text[18] !!}
                              @endif
                            </p></div>
                            <p>{{ $ticket_note->description }}</p>
                            <span class="time-left">{{ Carbon\Carbon::parse($ticket_note->created_at)->format('d-m-Y h:m A') }}</span>
                        </div>

                        @endif
                        @endforeach

{{--                         <div class="parent_div">
                            <div class="ticket_table">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="col" class="text-center">Ticket ID:</th>
                                            <td class="text-center">{{ $claims->ticket_id}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">Ticket Subject:</th>
                                            <td class="text-center">{{ str_replace('_', ' ', ucfirst( $claims->subject)) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">Ticket Status:</th>
                                            <td class="text-center">
                                                @if ($claims->ticket_status == '1')
                                                Pending
                                                @elseif ($claims->ticket_status == '2')
                                                In progress
                                                @else
                                                Closed
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}




                    </div>
                </div>
                <div class="tab-pane fade" id="claim-details" role="tabpanel" aria-labelledby="claim-details-tab">
                    <div class="wrapper">
                        <div class="parent_div">
                            <div class="user_panel_h2">
                                <h2>Claim properties</h2>
                            </div>
                        </div>
                        <div class="parent_div">
                            <div class="compensation_table">
                                <table class="table">
                                    <thead>
                                        <tr class="compensation_table_background">
                                            <th scope="col">Head of damages</th>
                                            <th scope="col">Initial Claim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expenses as $expense)
                                            @if($expense->amount !="")
                                                <tr>
                                                    <td>{{ucwords($expense->name)}}</td>
                                                    <td>
                                                        <span class="text-right">
                                                            {{$expense->amount}} {{$expense->currency}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr class="compensation_table_result_row">
                                            <td>Your Compensation</td>
                                            <td>
                                                <span class="text-right">
                                                    {{$claims->amount.' ('.$claims->converted_expection_amount.')'}}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    </div>
</div>
{{-- <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
    <div class="wrapper">




    </div>
</div> --}}
<div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
    <div class="wrapper">
        <div class="parent_div">
            <form action="{{ url('/user-upload-file') }}" method="post" class="" enctype='multipart/form-data'>
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <input type="text" class="common_input change_placeholder" id="" name="user_upload_file_name" placeholder="File Name" required="required">
                    </div>

                    <div class="col-md-6">
                        <div class="document_submit_div text-center">
                            <div class="input-file-container">
                                <input type="hidden" name="claim_id" value="{{ $claims->id }}">
                                <input class="input-file" id="my-file" name="file_name" type="file" required="required">
                                <label tabindex="0" for="my-file" class="input-file-trigger">Choose Document</label>
                            </div>
                            <p class="file-return"></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-md-12">
                    <div class="center_div text-center">
                      <input type="submit" name="submit" class="submit_button" value="Upload file">
                    </div>
                  </div>
                </div>
            </form>
            <div class="row">
              <div class="col-md-12">
                <div class="center_div">
                  @foreach ($claim_files as $claim_file)
                  <div class="document_underline_row">

                  </div>
                  <div class="uploaded_documents text-center">
                      <a href="{{ url('/user-download-file/'.$claim_file->id) }}">{{ $claim_file->name }}</a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>










</div>
</div>
@endsection
