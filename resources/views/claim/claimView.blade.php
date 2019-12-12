    @extends('layouts.admin_layout')
    @section('main_content')
    @section('header-css')
    <style>
    .modal.modal-wide .modal-dialog {
    width: 90%;
    }
    .modal-wide .modal-body {
    overflow-y: auto;
    }
    </style>
    @endsection
    @include('layouts.includes.partial.alert')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <div id="msgs"></div>
    <div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="panel bg-dark ">
                                    <div class="panel-heading cus_pan_heading">
                                        <p class="text-center p1">Claim Id</p>
                                        <h5 class="text-center p2">{{$claims->id}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel" style="background-color: #4894a5;">
                                    <div class="panel-heading cus_pan_heading">
                                        <p class="text-center p1">Passenger</p>
                                        @foreach($passengers as $passenger)
                                        @if($loop->first)
                                        <h5 class="text-center p2">{{$passenger->first_name.' '.$passenger->last_name}}</h5>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel" style="background-color: #006057;">
                                    <div class="panel-heading cus_pan_heading">
                                        <p class="text-center p1">Airline</p>
                                        <h5 class="text-center p2">{{$airline->name}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel" style="background-color: #d8a72b;">
                                    <div class="panel-heading cus_pan_heading">
                                        <p class="text-center p1">Claim Status</p>
                                        <h5 class="text-center p2">{{$claimStatusData->name}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel" style="background-color: #486f84;">
                                    <div class="panel-heading cus_pan_heading">
                                        <p class="text-center p1">Claim Category</p>
                                        <h5 class="text-center p2">{{str_replace('_', ' ', ucfirst($claims->claim_table_type)) }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-right">
                                <a href="{{url('claim-archive/'.$claims->id)}}" class="btn btn-md btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>  Close
                                </a>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12 widget-shadow">
                                <ul id="myTabs" class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#claim_overview" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false"><i class="fa fa-bookmark" aria-hidden="true"></i> Claim Overview</a></li>
                                    <li role="presentation"><a href="#messaging" role="tab" id="messaging-tab" data-toggle="tab" aria-controls="messaging" aria-expanded="true"><i class="fa fa-envelope" aria-hidden="true"></i> Messaging</a></li>
                                    <li role="presentation"><a href="#airline_response" role="tab" id="airline_response-tab" data-toggle="tab" aria-controls="airline_response" aria-expanded="true"><i class="fa fa-info-circle" aria-hidden="true"></i> Airline Response</a></li>
                                    <li role="presentation"><a href="#reminder" role="tab" id="reminder-tab" data-toggle="tab" aria-controls="reminder" aria-expanded="true"><i class="fa fa-bell" aria-hidden="true"></i> Reminders</a></li>
                                    <li role="presentation"><a href="#required-details" role="tab" id="required-details-tab" data-toggle="tab" aria-controls="required-details" aria-expanded="true"><i class="fa fa-bell" aria-hidden="true"></i> Required Details</a></li>
                                    <li role="presentation"><a href="#claim-status" role="tab" id="claim-status-tab" data-toggle="tab" aria-controls="claim-status" aria-expanded="true"><i class="fa fa-bell" aria-hidden="true"></i> Status</a></li>
                                    <li role="presentation"><a href="#affiliate-info" role="tab" id="affiliate-info-tab" data-toggle="tab" aria-controls="affiliate-info" aria-expanded="true"><i class="fa fa-bell" aria-hidden="true"></i> Affiliate Info</a></li>
                                    <li role="presentation"><a href="#ticket-info" role="tab" id="ticket-info-tab" data-toggle="tab" aria-controls="ticket-info" aria-expanded="true"><i class="fas fa-ticket-alt" aria-hidden="true"></i> Ticket Info</a></li>
                                    <li role="presentation"><a href="#note" role="tab" id="note-tab" data-toggle="tab" aria-controls="note" aria-expanded="true"><i class="fas fa-ticket-alt" aria-hidden="true"></i> Note Info</a></li>
                                    <li role="presentation"><a href="#affiliate-note" role="tab" id="affiliate-note-tab" data-toggle="tab" aria-controls="affiliate-note" aria-expanded="true"><i class="fas fa-ticket-alt" aria-hidden="true"></i> Affiliate Note Info</a></li>
                                    <li role="presentation"><a href="#expanse" role="tab" id="expanse-tab" data-toggle="tab" aria-controls="expanse" aria-expanded="true"><i class="fas fa-money-bill-alt" aria-hidden="true"></i> Expense Info</a></li>
                                    <li role="presentation"><a href="#airline" role="tab" id="airline-tab" data-toggle="tab" aria-controls="airline" aria-expanded="true"><i class="fas fa-plane" aria-hidden="true"></i> Airline Info</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="claim_overview" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-2" style="margin-top: 5px;">
                                                <ul class="nav nav-tabs left_row" id="myTab" role="tablist">
                                                    <li class="nav-item active">
                                                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="home">Claim Overview</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#flight_detail" role="tab" aria-controls="profile">Flight Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#claim_detail" role="tab" aria-controls="messages">Claim Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#add_claim_files" role="tab" aria-controls="settings">Add Claim Files</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#view_claim_files" role="tab" aria-controls="settings">View Claim Files</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#passengers" role="tab" aria-controls="settings">Passengers</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#claim_user_info" role="tab" aria-controls="claim_user_info">User Others Info</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#additional_info" role="tab" aria-controls="additional_info">Additional Info</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 5px;">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> Claims Overview
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                            <tbody>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim ID</th>
                                                                                    <td>{{$claims->id}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim Create Date</th>
                                                                                    <td>{{Carbon\Carbon::parse($claims->created_at)->format('d-m-Y')}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim Status</th>
                                                                                    <td>{{$claimStatusData->name}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim Type</th>
                                                                                    <td>{{str_replace('_', ' ', ucfirst($claims->claim_table_type)) }}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim Closed Date</th>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim Outcome</th>
                                                                                    <td>{{$claims->amount}}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="flight_detail" role="tabpanel">
                                                        @foreach($intinerary_details as $single_intinerary_detail)
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> Fligh Details
                                                                        @if(!array_key_exists($single_intinerary_detail->flight_number, $all_flights))
                                                                        
                                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#set-time">Set Time</button>

                    <div id="set-time" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Set Time</h4>
                          </div>
                          <div class="modal-body">
                            <div class="grids widget-shadow">
                                <div class="row">
                                    <div class="col-md-6 grid-box1">
                                        <div class="form-group {{ $errors->has('airline_id') ? 'has-error' : ''}}">
                                            {!! Form::label('airline_id', 'Airline', ['class' => 'control-label']) !!}
                                            {!! Form::select('airline_id', $airlines, null, ('' == 'required') ? ['class' => 'form-control airline_id', 'required' => 'required', 'id' => 'airline_id'] : ['class' => 'form-control airline_id', 'id' => 'airline_id']) !!}
                                            {!! $errors->first('airline_id', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 grid-box1">
                                        <div class="form-group {{ $errors->has('flight_no') ? 'has-error' : ''}}">
                                            {!! Form::label('flight_no', 'Flight No', ['class' => 'control-label']) !!}
                                            {!! Form::text('flight_no', null, ('' == 'required') ? ['class' => 'form-control flight_no', 'required' => 'required', 'id' => 'flight_no'] : ['class' => 'form-control flight_no', 'id' => 'flight_no']) !!}
                                            {!! $errors->first('flight_no', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                                            {!! Form::label('date', 'Date', ['class' => 'control-label']) !!}
                                            {!! Form::text('date', null, ('' == 'required') ? ['class' => 'form-control date', 'required' => 'required', 'id' => 'date'] : ['class' => 'form-control date','id' => 'date']) !!}
                                            {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 grid-box1">
                                        <div class="form-group {{ $errors->has('scheduled_departure_time_and_date') ? 'has-error' : ''}}">
                                            {!! Form::label('scheduled_departure_time_and_date', 'Scheduled Departure Time', ['class' => 'control-label']) !!}
                                            {!! Form::text('scheduled_departure_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker scheduled_departure_time', 'required' => 'required', 'id' => 'scheduled_departure_time_and_date'] : ['class' => 'form-control datepicker scheduled_departure_time', 'id' => 'scheduled_departure_time_and_date']) !!}
                                            {!! $errors->first('scheduled_departure_time_and_date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('actual_departure_time_and_date') ? 'has-error' : ''}}">
                                            {!! Form::label('actual_departure_time_and_date', 'Actual Departure Time And Date', ['class' => 'control-label']) !!}
                                            {!! Form::text('actual_departure_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required', 'id' => 'actual_departure_time_and_date'] : ['class' => 'form-control datepicker', 'id' => 'actual_departure_time_and_date']) !!}
                                            {!! $errors->first('actual_departure_time_and_date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 grid-box1">
                                        <div class="form-group {{ $errors->has('scheduled_arrival_time_and_date') ? 'has-error' : ''}}">
                                            {!! Form::label('scheduled_arrival_time_and_date', 'Scheduled Arrival Time And Date', ['class' => 'control-label']) !!}
                                            {!! Form::text('scheduled_arrival_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required', 'id' => 'scheduled_arrival_time_and_date'] : ['class' => 'form-control datepicker', 'id' => 'scheduled_arrival_time_and_date']) !!}
                                            {!! $errors->first('scheduled_arrival_time_and_date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('actual_arrival_time_and_date') ? 'has-error' : ''}}">
                                            {!! Form::label('actual_arrival_time_and_date', 'Actual Arrival Time And Date', ['class' => 'control-label']) !!}
                                            {!! Form::text('actual_arrival_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker time_date)', 'id'=>'actual_arrival_time_and_date', 'required' => 'required'] : ['class' => 'form-control datepicker time_date','id'=>'actual_arrival_time_and_date']) !!}
                                            {!! $errors->first('actual_arrival_time_and_date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>

                                <input id="hidden_claim_id" type="hidden" value="{{ $claims->id }}">
                                <input id="hidden_airline_id" type="hidden" value="{{ $single_intinerary_detail->airline_id }}">
                                <input id="hidden_flight_number" type="hidden" value="{{ $single_intinerary_detail->flight_number }}">
                                <input id="hidden_date" type="hidden" value="{{ str_replace('/','-',$single_intinerary_detail->departure_date) }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::button('Update', ['class' => 'btn btn-primary', 'id' => 'time-set-for-claim']) !!}
                                        </div>
                                    </div>
                                </div>

                                <input class="claim_id" type="hidden" value="" name="claim_id">

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>


                                                                        @else
                                                                        
                                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#update-time">Update Time</button>
<div id="update-time" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Time</h4>
                          </div>
                          <div class="modal-body">
                            <div class="grids widget-shadow">
                                <div class="row">
                                    <div class="col-md-6 grid-box1">
                                        <div class="form-group {{ $errors->has('airline_id') ? 'has-error' : ''}}">
                                            {!! Form::label('airline_id', 'Airline', ['class' => 'control-label']) !!}
                                            {!! Form::select('airline_id', $airlines, null, ('' == 'required') ? ['class' => 'form-control airline_id', 'required' => 'required', 'id' => 'airline_id'] : ['class' => 'form-control airline_id', 'id' => 'airline_id']) !!}
                                            {!! $errors->first('airline_id', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 grid-box1">
                                        <div class="form-group {{ $errors->has('flight_no') ? 'has-error' : ''}}">
                                            {!! Form::label('flight_no', 'Flight No', ['class' => 'control-label']) !!}
                                            {!! Form::text('flight_no', null, ('' == 'required') ? ['class' => 'form-control flight_no', 'required' => 'required', 'id' => 'flight_no'] : ['class' => 'form-control flight_no', 'id' => 'flight_no']) !!}
                                            {!! $errors->first('flight_no', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                                            {!! Form::label('date', 'Date', ['class' => 'control-label']) !!}
                                            {!! Form::text('date', null, ('' == 'required') ? ['class' => 'form-control date', 'required' => 'required', 'id' => 'date'] : ['class' => 'form-control date','id' => 'date']) !!}
                                            {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 grid-box1">
                                        <div class="form-group {{ $errors->has('scheduled_departure_time_and_date') ? 'has-error' : ''}}">
                                            {!! Form::label('scheduled_departure_time_and_date', 'Scheduled Departure Time', ['class' => 'control-label']) !!}
                                            {!! Form::text('scheduled_departure_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required', 'id' => 'scheduled_departure_time_and_date'] : ['class' => 'form-control datepicker', 'id' => 'scheduled_departure_time_and_date']) !!}
                                            {!! $errors->first('scheduled_departure_time_and_date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('actual_departure_time_and_date') ? 'has-error' : ''}}">
                                            {!! Form::label('actual_departure_time_and_date', 'Actual Departure Time And Date', ['class' => 'control-label']) !!}
                                            {!! Form::text('actual_departure_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required', 'id' => 'actual_departure_time_and_date'] : ['class' => 'form-control datepicker', 'id' => 'actual_departure_time_and_date']) !!}
                                            {!! $errors->first('actual_departure_time_and_date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 grid-box1">
                                        <div class="form-group {{ $errors->has('scheduled_arrival_time_and_date') ? 'has-error' : ''}}">
                                            {!! Form::label('scheduled_arrival_time_and_date', 'Scheduled Arrival Time And Date', ['class' => 'control-label']) !!}
                                            {!! Form::text('scheduled_arrival_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required', 'id' => 'scheduled_arrival_time_and_date'] : ['class' => 'form-control datepicker', 'id' => 'scheduled_arrival_time_and_date']) !!}
                                            {!! $errors->first('scheduled_arrival_time_and_date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('actual_arrival_time_and_date') ? 'has-error' : ''}}">
                                            {!! Form::label('actual_arrival_time_and_date', 'Actual Arrival Time And Date', ['class' => 'control-label']) !!}
                                            {!! Form::text('actual_arrival_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker time_date)', 'id'=>'actual_arrival_time_and_date', 'required' => 'required'] : ['class' => 'form-control datepicker time_date','id'=>'actual_arrival_time_and_date']) !!}
                                            {!! $errors->first('actual_arrival_time_and_date', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>

                                <input id="hidden_claim_id" type="hidden" value="{{ $claims->id }}">
                                <input id="hidden_airline_id" type="hidden" value="{{ $single_intinerary_detail->airline_id }}">
                                <input id="hidden_flight_number" type="hidden" value="{{ $single_intinerary_detail->flight_number }}">
                                <input id="hidden_date" type="hidden" value="{{ str_replace('/','-',$single_intinerary_detail->departure_date) }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::submit('Update', ['class' => 'btn btn-primary', 'id' => 'time-update-for-flight']) !!}
                                        </div>
                                    </div>
                                </div>

                                <input class="claim_id" type="hidden" value="" name="claim_id">

                            </div>


                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>

            @endif
        </div>
        <div class="panel-body">
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <tbody>
            <tr class="odd gradeX">
                <th>Date Of Disrupted</th>
                <td id="">{{$single_intinerary_detail->departure_date}}</td>
            </tr>
            <tr class="odd gradeX">
                <th>Airline</th>
                <td>
                    <a href="{{url('airlines/'.$single_intinerary_detail->airline_id)}}">
                        {{$itinerary_detail_airlines[$single_intinerary_detail->airline_id]}}
                    </a>
                </td>
            </tr>
            <tr class="odd gradeX">
                <th>Flight Number</th>
                <td>{{$single_intinerary_detail->flight_number}}</td>
            </tr>
            <tr class="odd gradeX">
                <th>Flight Segment</th>
                <td>{{$single_intinerary_detail->flight_segment}}</td>
            </tr>
            <tr class="odd gradeX">
                <th>Departure Date</th>
                <td>{{$single_intinerary_detail->departure_date}}</td>
            </tr>

            <input type="hidden" id="check_itter" value="{{ array_key_exists($single_intinerary_detail->flight_number, $all_flights) }}" />
            
            <div id="itter">
            <tr class="odd gradeX">
                <th>scheduled_departure_time_and_date</th>
                <td id="flight_one">{{ isset($all_flights[$single_intinerary_detail->flight_number]['scheduled_departure_time_and_date']) ? $all_flights[$single_intinerary_detail->flight_number]['scheduled_departure_time_and_date'] : ''}}</td>
            </tr>
            <tr class="odd gradeX">
                <th>actual_departure_time_and_date</th>
                <td id="flight_two">{{ isset($all_flights[$single_intinerary_detail->flight_number]['actual_departure_time_and_date']) ? $all_flights[$single_intinerary_detail->flight_number]['actual_departure_time_and_date'] : ''}}</td>
            </tr>
            <tr class="odd gradeX">
                <th>scheduled_arrival_time_and_date</th>
                <td id="flight_three">{{ isset($all_flights[$single_intinerary_detail->flight_number]['scheduled_arrival_time_and_date']) ? $all_flights[$single_intinerary_detail->flight_number]['scheduled_arrival_time_and_date'] : ''}}</td>
            </tr>
            <tr class="odd gradeX">
                <th>actual_arrival_time_and_date</th>
                <td id="flight_four">{{ isset($all_flights[$single_intinerary_detail->flight_number]['actual_arrival_time_and_date']) ? $all_flights[$single_intinerary_detail->flight_number]['actual_arrival_time_and_date'] : ''}}</td>
            </tr>
        </div>
        </tbody>
    </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="tab-pane" id="claim_detail" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> Claim Details
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                            <tbody>
                                                                                <tr class="odd gradeX">
                                                                                    <th>What reason was given for the delay</th>
                                                                                    <td>{{str_replace('_', ' ', ucfirst($claims->reason)) }}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Number of passengers:</th>
                                                                                    <td>{{$passCount}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>What Happened To The Flight?</th>
                                                                                    <td>{{str_replace('_', ' ', ucfirst($claims->what_happened_to_the_flight)) }}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>What was the total delay once you arrived?</th>
                                                                                    <td>{{str_replace('_', ' ', ucfirst($claims->total_delay)) }}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Did notify before 14 days?</th>
                                                                                    <td>
                                                                                        @if($claims->is_notify_before_forteen_days == 1)
                                                                                        No
                                                                                        @else
                                                                                        Yes
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>PIR</th>
                                                                                    <td>
                                                                                        {{$claims->pir}}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Received Luggage date</th>
                                                                                    <td>
                                                                                        {{$claims->received_luggage_date}}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Is luggage received?</th>
                                                                                    <td>
                                                                                        @if($claims->is_luggage_received == 1)
                                                                                        Yes
                                                                                        @else
                                                                                        No
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="add_claim_files" role="tabpanel">
                                                        <p>
                                                            Your file submission allowance has now passed and you are no longer able to upload any more files to your case.
                                                            We will now request the Defence from the airline.
                                                        </p>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="{{route('claim-file-upload')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="file_name" class="control-label"></label>
                                                                        <input type="text" class="form-control" name="file_name" id="file_name" placeholder="File Name..." required>
                                                                    </div>
                                                                    <label for="file-upload" class="custom-file-upload">
                                                                        <i class="fas fa-cloud-upload-alt"></i> Custom Upload
                                                                    </label>

                                                                    <input id="file-upload" name="file_upload" type="file" required/>

                                                                    <input type="hidden" name="claim_id" value="{{$claims->id}}" id="claim_id_for_file_uploads">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <button type="button" class="mybtn" id="file-upload-btn"><i class="fa fa-save"></i> Save</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="view_claim_files" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <p>
                                                                    You have successfully uploaded your files.On this screen you can organise your files to enable other parties to understand the significance of the file to the case.
                                                                    Please give the file description and a time line date to show the chronological ordering of your files.
                                                                </p>
                                                                <button>Save Changes</button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                @if($is_all_flight_time_exists)
                                                                <a  href="{{URL::to('/letter-before-action/'.$claims->id)}}" class="btn btn-success btn-sm" >Download Pdf</a>
                                                                @else
                                                                <a class="btn btn-success btn-sm time-input-required" >Download Pdf</a>
                                                                @endif
                                                                @foreach($passengers as $single_passenger)
                                                                <a href="{{URL::to('/poa-pdf/'.$claims->id.'/'.$single_passenger->id)}}" class="btn btn-primary btn-sm">Download POA Pdf-{{ $single_passenger->first_name.' '.$single_passenger->last_name }}</a>
                                                                @endforeach
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <div class="table-responsive">
                                                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>File Name</th>
                                                                                        <th>Upload Date</th>
                                                                                        <th>Uploaded By</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
            <tbody id="claim-file-tbody">
                @foreach($claimFiles as $claimFile)
                <tr id="claim-file-{{ $claimFile->id }}">
                    <td>{{$claimFile->name}}</td>
                    <td>{{Carbon\Carbon::parse($claimFile->created_at)->format('d-m-Y')}}</td>
                    <td>{{$claimFile->user_id}}</td>
                    <td>
                        <a href="{{URL::to('/claim-file/'.$claimFile->id)}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-download"></i> Download
                        </a>
                        <a id="{{ $claimFile->id }}" type="button" class="btn btn-sm btn-danger claim-file-delete">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        @php
                        $file_name = $claimFile->file_name;
                        $ext = explode('.',$file_name);
                        @endphp
                        @if($ext[1] == 'pdf')
                        <a href="{{URL::to('uploads/'.$claimFile->claim_id.'/'.$claimFile->file_name)}}" target="_blank" class="btn btn-sm btn-primary">
                            <i class="fa fa-pdf"></i> PDF
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="claim_eligib" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> Claim Eligibility
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                            <tbody>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim ID</th>
                                                                                    <td>{{$claims->id}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Have you complained direct to the airline writing?</th>
                                                                                    <td>
                                                                                        @if($claims->is_already_written_airline == 0)
                                                                                        NO
                                                                                        @else
                                                                                        Yes
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="passengers" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> Passengers
                                                                         {{-- <a href="{{url('/passengers/create-from-claim/'.$claims->id)}}" class="btn btn-success btn-xs pull-right" target="_blank">
                                                                            Add New
                                                                        </a> --}}
                                                                        <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#passenger-add">Add Passengers</button>

                <div id="passenger-add" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Passenger Add</h4>
                          </div>
                          <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                                    {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('post_code', 'Post Code', ['class' => 'control-label']) !!}
                                    {!! Form::text('post_code', null, ['class' => 'form-control', 'id' => 'post_code']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'control-label']) !!}
                                    {!! Form::text('date_of_birth', null, ['class' => 'form-control datepicker', 'id' => 'date_of_birth']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                                    {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('is_booking_reference', 'Is Booking Reference', ['class' => 'control-label']) !!}
                                    {!! Form::select('is_booking_reference', ['1'=>'Yes', '0'=>'No'], null, ['class' => 'form-control', 'id' => 'is_booking_reference']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('booking_refernece', 'Booking Refernece', ['class' => 'control-label']) !!}
                                    {!! Form::text('booking_refernece', null, ['class' => 'form-control', 'id' => 'booking_refernece']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
                                    {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
                                </div>

                                {!! Form::hidden('claim_id', $claims->id, ['class' => 'claim_id', 'id' => 'claim_id']) !!}

                                <div class="form-group">
                                    {!! Form::button('Create', ['class' => 'btn btn-primary', 'id' => 'passenger-add-btn']) !!}
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                    </div>
                </div>


                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <div class="table-responsive">
                                                                            @if($passengers)
                                                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                                <thead>
                                                                                    <th>Name</th>
                                                                                    <th>Address</th>
                                                                                    <th>Post Code</th>
                                                                                    <th>Date Of Birth</th>
                                                                                    <th>Email</th>
                                                                                    <th>Phone</th>
                                                                                    <th>Is Booking Referance?</th>
                                                                                    <th>Booking Referance</th>
                                                                                </thead>
                    <tbody id="passenger-table">
                        @foreach($passengers as $all_passenger)
                        <tr id="current-passenger-{{ $all_passenger->id }}">
                            <td>
                                <a type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#passenger-edit-{{ $all_passenger->id }}" >
                                {{$all_passenger->first_name}} {{$all_passenger->last_name}}
                                </a>
                                <div id="passenger-edit-{{ $all_passenger->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Passenger</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
                                                    <input type="text" class="form-control" name="first_name" id="first_name_{{ $all_passenger->id }}" value="{{ $all_passenger->first_name }}">
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
                                                    <input type="text" class="form-control" name="last_name" id="last_name_{{ $all_passenger->id }}" value="{{ $all_passenger->last_name }}">
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                                                    <input type="text" class="form-control" name="address" id="address_{{ $all_passenger->id }}" value="{{ $all_passenger->address }}">
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('post_code', 'Post Code', ['class' => 'control-label']) !!}
                                                    <input type="text" class="form-control" name="post_code" id="post_code_{{ $all_passenger->id }}" value="{{ $all_passenger->post_code }}">
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'control-label']) !!}
                                                    <input type="text" class="form-control datepicker" name="date_of_birth" id="date_of_birth_{{ $all_passenger->id }}" value="{{ $all_passenger->date_of_birth }}">
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                                                    <input type="text" class="form-control" name="email" id="email_{{ $all_passenger->id }}" value="{{ $all_passenger->email }}">
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('is_booking_reference', 'Is Booking Reference', ['class' => 'control-label']) !!}
                                                    
                                                    <select class="form-control" id="is_booking_reference_{{ $all_passenger->id }}" name="is_booking_reference">
                                                        <option value="1" @if($all_passenger->is_booking_reference == 1) selected @endif>Yes</option>
                                                        <option value="0" @if($all_passenger->is_booking_reference == 0) selected @endif>No</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('booking_refernece', 'Booking Refernece', ['class' => 'control-label']) !!}
                                                    <input type="text" class="form-control" name="booking_refernece" id="booking_refernece_{{ $all_passenger->id }}" value="{{ $all_passenger->booking_refernece }}">
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
                                                    <input type="text" class="form-control" name="phone" id="phone_{{ $all_passenger->id }}" value="{{ $all_passenger->phone }}">
                                                </div>

                                                {!! Form::hidden('claim_id', $claims->id, ['class' => 'claim_id', 'id' => 'claim_id']) !!}

                                                <div class="form-group">
                                                    <button type="button" class="btn btn-sm btn-primary passenger-update-btn" id="{{ $all_passenger->id }}">
                                                        Update
                                                    </button>
                                                </div>
                                            </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td>{{$all_passenger->address}}</td>
                            <td>{{$all_passenger->post_code}}</td>
                            <td>{{$all_passenger->date_of_birth}}</td>
                            <td>{{$all_passenger->email}}</td>
                            <td>{{$all_passenger->phone}}</td>
                            <td>
                                @if($all_passenger->is_booking_reference == 0)
                                    <span style="color: red;">No</span>
                                @else
                                    <span style="color: green;">Yes</span>
                                @endif
                            </td>
                            <td>
                                {{$all_passenger->booking_refernece}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                                                                            </table>
                                                                            @else
                                                                            <h3 class="text-center">No Passengers Found.</h3>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="claim_user_info" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> User Others Info
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                            <tbody>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Claim ID</th>
                                                                                    <td>{{$claims->id}}</td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Ip Address</th>
                                                                                    <td>
                                                                                        @if($claims->ip == null)
                                                                                        @else
                                                                                        {{$claims->ip}}
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Browser</th>
                                                                                    <td>
                                                                                        @if($claims->browser == null)
                                                                                        @else
                                                                                        {{$claims->browser}}
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Language</th>
                                                                                    <td>
                                                                                        @if($claims->language == null)
                                                                                        @else
                                                                                        {{$claims->language}}
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Cpanel Email</th>
                                                                                    <td>
                                                                                        @if($claims->cpanel_email == null)
                                                                                        @else
                                                                                        {{$claims->cpanel_email}}
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Cpanel Password</th>
                                                                                    <td>
                                                                                        @if($claims->cpanel_email == null)
                                                                                        @else
                                                                                        {{$claims->cpanel_password}}
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="odd gradeX">
                                                                                    <th>Signature</th>
                                                                                    <td>
                                                                                        <img src="{{asset('uploads/sig/'.$claims->id.'.png')}}" alt="">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="additional_info" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <i class="fa fa-comments"></i> Additional Info
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <div class="table-responsive">
                                                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>Where did you hear about Claim’N Win?</th>
                                                                                        <td>{{$claims->here_from_where}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Have you contacted the airline regarding the claim?</th>
                                                                                        <td>
                                                                                            @if($claims->is_already_written_airline == 1)
                                                                                            Yes 
                                                                                            @else
                                                                                            No
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>What Happened?</th>
                                                                                        <td>{{$claims->what_happened}}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
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
                                    <div role="tabpanel" class="tab-pane " id="messaging" aria-labelledby="messaging-tab">
                                        <div class="row">
                                            <div class="col-md-2" style="margin-top: 5px;">
                                                <ul class="nav nav-tabs message" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link btn btn-block btn-primary" data-toggle="tab" href="#compose"role="tab" aria-controls="compose">Compose</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#conversation" role="tab" aria-controls="home">Conversation</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#inbox" role="tab" aria-controls="profile">Inbox</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#sent" role="tab" aria-controls="messages">Sent</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#case_history" role="tab" aria-controls="settings">Case History</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#note_&_phone_calls" role="tab" aria-controls="settings">Note & Phone Calls</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 5px;">
                                                
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="compose" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="{{url('/claim-ajax-compose-customer-data')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="from_name" id="from_name" value="Claim'N Win" class="form-control" placeholder="From Name" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="from_email" value="{{$claims->cpanel_email}}" id="from_email" class="form-control" placeholder="From Email" required/>
                                                                        </div>
                                                                    </div>
                                                                    @php
                                                                    $userData=DB::table('users')->where('id',$claims->user_id)->first();
                                                                    @endphp
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="to_email" id="to_email" value="{{$userData->email}}" class="form-control" placeholder="To Email"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="sub" id="sub" class="form-control" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <select id="template" class="form-control select-template">
                                                                                <option value="0">Email template</option>
                                                                                @foreach($EmailTemplate as $key=>$val)
                                                                                <option value="{{$key}}">{{$val}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <textarea name="compose_text" class="form-control tinymce-editor composes_text" id="my_editor" cols="30" rows="10"></textarea>
                                                                            <input type="hidden" name="claim_id" id="claim_id" value="{{$claims->id}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="file" name="compose_files[]" id="compose_files" class="form-control compose_file" multiple/>
                                                                        </div>
                                                                        <style type="text/css">
                                                                            #preview img{
                                                                               margin: 5px;
                                                                            }
                                                                            </style>
                                                                            <div id='preview'></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <button type="button" class="btn btn-sm btn-success" id="compose-customer-data">Send</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="conversation" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <th>From</th>
                                                                            <th>Subject</th>
                                                                            <th>Message</th>
                                                                            <th>Date</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $inbox_from_user = [];
                                                                            foreach($sents as $cutomSent){
                                                                            $time_stamps  = Carbon\Carbon::parse($cutomSent->created_at)->timestamp;
                                                                            $inbox_from_user[$time_stamps]['sub']   = $cutomSent->sub;
                                                                            $inbox_from_user[$time_stamps]['date']  = Carbon\Carbon::parse($cutomSent->created_at)->format('d-m-Y h:i:s');
                                                                            $inbox_from_user[$time_stamps]['from']  = $cutomSent->from_email;
                                                                            $inbox_from_user[$time_stamps]['msg']   = $cutomSent->compose_text;
                                                                            }
                                                                            $userInfo=DB::table('users')->where('id',$claims->user_id)->first();
                                                                            $userEmail=$userInfo->email;
                                                                            if($aFolder) {
                                                                            foreach($aFolder as $oFolder) {
                                                                            $aMessage = $oFolder->messages()->from($userEmail)->get();
                                                                            foreach($aMessage as $oMessage){
                                                                            $time_stamps =  Carbon\Carbon::parse($oMessage->date)->timestamp;
                                                                            $sub=$oMessage->getSubject();
                                                                            $date = $oMessage->getDate();
                                                                            $from = $oMessage->getFrom()[0]->mail;
                                                                            // $body = $oMessage->getBodies();
                                                                            $msg = $oMessage->getHtmlBody();
                                                                            $longMsg=$oMessage->getBodies()['text']->content;
                                                                            $lines=explode("\n", $longMsg);
                                                                            $inbox_from_user[$time_stamps]['sub']   = $sub;
                                                                            $inbox_from_user[$time_stamps]['date']  = $date;
                                                                            $inbox_from_user[$time_stamps]['from']  = $from;
                                                                            $inbox_from_user[$time_stamps]['msg']   = $lines["0"];
                                                                            }
                                                                            }
                                                                            krsort($inbox_from_user,1);
                                                                            foreach ($inbox_from_user as $inbox_from_user_single) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>{{$inbox_from_user_single['from']}}</td>
                                                                                <td>{{$inbox_from_user_single['sub']}}</td>
                                                                                <td>{!! $inbox_from_user_single['msg'] !!}</td>
                                                                                <td>{{Carbon\Carbon::parse($inbox_from_user_single['date'])->format('d-m-Y')}}</td>
                                                                            </tr>
                                                                            <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="inbox" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <th>From</th>
                                                                            <th>Subject</th>
                                                                            <th>Message</th>
                                                                            <th>Date</th>
                                                                            <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            if($inbox) {
                                                                            $userInfo=DB::table('users')->where('id',$claims->user_id)->first();
                                                                            $userEmail=$userInfo->email;
                                                                            foreach($inbox as $oFolder) {
                                                                            $aMessage = $oFolder->messages()->from($userEmail)->get();
                                                                            foreach($aMessage as $oMessage){
                                                                            // dd($oMessage);
                                                                            $sub=$oMessage->getSubject();
                                                                            $date = $oMessage->getDate();
                                                                            $from = $oMessage->getFrom()[0]->mail;
                                                                            $id = $oMessage->getMessageNo();
                                                                            // $body = $oMessage->getBodies();
                                                                            $msg = $oMessage->getHtmlBody();
                                                                            $longMsg=$oMessage->getBodies()['text']->content;
                                                                            $lines=explode("\n", $longMsg);
                                                                            $attachFile = $oMessage->getAttachments();
                                                                            ?>
                                                                            <tr>
                                                                                <td>{{$from}}</td>
                                                                                <td>{{$sub}}</td>
                                                                                <td>{{$lines['0']}}</td>
                                                                                <td>{{Carbon\Carbon::parse($date)->format('d-m-Y')}}</td>
                                                                                <td>
                                                                                    <a class="btn btn-info btn-sm" title="inbox-{{$id}}" data-toggle="modal" data-target="#inbox{{$id}}">View</a>
                                                                                    <a class="btn btn-info btn-sm" title="inbox-{{$id}}" data-toggle="modal" data-target="#inbox_reply{{$id}}">Reply</a>
                                                                                </td>
                                                                            </tr>
                                                                            <div id="inbox{{$id}}" class="modal fade" role="dialog" style="width: 100%;">
                                                                                <div class="modal-dialog modal-wide modal-lg">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                            <button type="button" onclick="printDiv('print_div')" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>
                                                                                        </div>
                                                                                        <div class="modal-body" id="print_div">
                                                                                            <h4 class="text-center">Sub: {{$sub}}</h4> <br>
                                                                                            <p>
                                                                                                {!! $msg !!}
                                                                                            </p>

                                                                                            @foreach($attachFile as $attachment)
                                                                                                <a class="btn btn-success btn-xs" href='{{ 'data:'.$attachment->content_type.';base64,'.base64_encode($attachment->content) }}' download='{{$attachment->name}}'>
                                                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                                                    <b>Attachment - {{$loop->iteration}}</b>
                                                                                                </a>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="inbox_reply{{$id}}" class="modal fade" role="dialog">
                                                                                <div class="modal-dialog modal-wide">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                            <h4 class="modal-title">{{$sub}}</h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="{{route('reply-customer-data')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                                                @csrf
                                                                                                <div class="form-group">
                                                                                                    <div class="col-md-12">
                                                                                                        <input type="text" name="from_name" id="from_name" value="Claim'N Win" class="form-control" placeholder="From Name" required/>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <div class="col-md-12">
                                                                                                        <input type="text" name="from_email" value="{{$claims->cpanel_email}}" id="from_email" class="form-control" placeholder="From Email" required/>
                                                                                                    </div>
                                                                                                </div>
                                                                                                @php
                                                                                                $userData=DB::table('users')->where('id',$claims->user_id)->first();
                                                                                                @endphp
                                                                                                <div class="form-group">
                                                                                                    <div class="col-md-12">
                                                                                                        <input type="text" name="to_email" id="to_email" value="{{$userData->email}}" class="form-control" placeholder="To Email"/>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <div class="col-md-12">
                                                                                                        <input type="text" name="sub" id="sub" class="form-control" required/>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <div class="col-md-12">
                                                                                                        <textarea name="compose_text"  class="form-control Compose" cols="30" rows="10"></textarea>
                                                                                                        <input type="hidden" name="claim_id" value="{{$claims->id}}">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <div class="col-md-12">
                                                                                                        <input type="file" name="compose_file[]" id="" class="form-control" multiple/>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <div class="col-md-12">
                                                                                                        <button type="submit" class="btn btn-sm btn-success">Send</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            }
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="sent" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <th>From</th>
                                                                            <th>Subject</th>
                                                                            <th>Message</th>
                                                                            <th>Date</th>
                                                                            <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            if($sents) {
                                                                            ?>
                                                                            @foreach($sents as $cutomSent)
                                                                            @php
                                                                            $inbox_from_user[$time_stamps]['sub']   = $cutomSent->sub;
                                                                            $inbox_from_user[$time_stamps]['date']  = Carbon\Carbon::parse($cutomSent->created_at)->timestamp;
                                                                            $inbox_from_user[$time_stamps]['from']  = $cutomSent->from_email;
                                                                            $inbox_from_user[$time_stamps]['msg']   = $cutomSent->compose_text;
                                                                            @endphp
                                                                            <tr>
                                                                                <td>{{$cutomSent->from_email}}</td>
                                                                                <td>{{$cutomSent->sub}}</td>
                                                                                <td>{!!$cutomSent->compose_text!!}</td>
                                                                                <td>{{Carbon\Carbon::parse($cutomSent->created_at)->format('d-m-Y')}}</td>
                                                                                <td>
                                                                                    <a class="btn btn-info btn-sm" title="sent-{{$cutomSent->id}}" data-toggle="modal" data-target="#sent{{$cutomSent->id}}">View</a>
                                                                                    <div id="sent{{$cutomSent->id}}" class="modal fade" role="dialog">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" onclick="printDiv('sent_msgs')" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>
                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <div class="row" id="sent_msgs">
                                                                                                        <h4 class="text-center">Sent Message Details</h4> <br>
                                                                                                        <div class="col-md-12">
                                                                                                            <p>
                                                                                                                <h5><b>From:</b> {{ $cutomSent->from_name }}<{{ $cutomSent->from_email }}></h5>
                                                                                                                <h5><b>To:</b> {{ $cutomSent->to_email }}</h5>
                                                                                                                <h5><b>Date:</b> {{ $cutomSent->created_at }}</h5>
                                                                                                                <h5><b>Subject:</b> {{ $cutomSent->sub }}</h5>
                                                                                                                <br>
                                                                                                                <br>
                                                                                                            </p>
                                                                                                            {!!$cutomSent->compose_text!!}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12">
                                                                                                            @php
                                                                                                            $custome_single_files=explode("|",$cutomSent->compose_file);
                                                                                                            @endphp
                                                                                                            @foreach($custome_single_files as $key=>$value)
                                                                                                            @if($value != "")
                                                                                                            <a href="{{URL::to($value)}}" download class="btn btn-sm btn-info">Download File-{{$loop->iteration}}</a>
                                                                                                            &nbsp; &nbsp; &nbsp;
                                                                                                            @endif
                                                                                                            @endforeach
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="case_history" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <th>Date</th>
                                                                            <th>Subject</th>
                                                                            <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>
                                                                                    <div id="SentEmailShow" class="modal modal-wide fade" role="dialog">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                    <h4 class="modal-title"></h4>
                                                                                                </div>
                                                                                                <div class="modal-body" style="display: block; overflow:scroll;">
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="note_&_phone_calls" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <th>Date</th>
                                                                            <th>Subject</th>
                                                                            <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>
                                                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#SentEmailShow">View Email</button>
                                                                                    <div id="SentEmailShow" class="modal modal-wide fade" role="dialog">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                    <h4 class="modal-title"></h4>
                                                                                                </div>
                                                                                                <div class="modal-body" style="display: block; overflow:scroll;">
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="airline_response" aria-labelledby="airline_response-tab">
                                        <div class="row">
                                            <div class="col-md-2" style="margin-top: 5px;">
                                                <ul class="nav nav-tabs message" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link btn btn-block btn-primary" data-toggle="tab" href="#airline_compose"role="tab" aria-controls="airline_compose">Compose</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#airline_conversation" role="tab" aria-controls="home">Conversation</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#airline_inbox" role="tab" aria-controls="profile">Inbox</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#airline_sent" role="tab" aria-controls="messages">Sent</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#airline_case_history" role="tab" aria-controls="settings">Case History</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#airline_note_&_phone_calls" role="tab" aria-controls="settings">Note & Phone Calls</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-10" style="margin-top: 5px;">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="airline_compose" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="{{url('/claim-ajax-airline-compose-data')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="from_name" id="from_name" value="Claim'N Win" class="form-control" placeholder="From Name" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="from_email" value="{{$claims->cpanel_email}}" id="from_email" class="form-control" placeholder="From Email" required/>
                                                                        </div>
                                                                    </div>
                                                                    @php
                                                                    $airlineData=DB::table('airlines')->where('id',$claims->airline_id)->first();
                                                                    @endphp
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="to_email" id="to_email" value="{{$airlineData->email}}" class="form-control" placeholder="To Email"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="text" name="sub" id="airline_sub" class="form-control" placeholder="Subject" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <select id="airline-template" class="form-control select-template">
                                                                                <option value="0">Email template</option>
                                                                                @foreach($EmailTemplate as $key=>$val)
                                                                                <option value="{{$key}}">{{$val}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <textarea name="airline_compose_text" class="form-control tinymce-editor" id="airline_editor" rows="5" cols="50"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="file" name="airline_compose_files[]" id="airline_compose_files" class="form-control" multiple/>
                                                                            <input type="hidden" name="claim_id" value="{{$claims->id}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <button type="button" class="btn btn-sm btn-success" id="airline-compose-data">Send</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="airline_conversation" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <th>From</th>
                                                                            <th>Subject</th>
                                                                            <th>Message</th>
                                                                            <th>Date</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $inbox_from_user = [];
                                                                            foreach($airlineSents as $airlineSent){
                                                                            $time_stamps  = Carbon\Carbon::parse($airlineSent->created_at)->timestamp;
                                                                            $inbox_from_user[$time_stamps]['sub']   = $airlineSent->sub;
                                                                            $inbox_from_user[$time_stamps]['date']  = Carbon\Carbon::parse($airlineSent->created_at)->format('d-m-Y h:i:s');
                                                                            $inbox_from_user[$time_stamps]['from']  = $airlineSent->from_email;
                                                                            $inbox_from_user[$time_stamps]['msg']   = $airlineSent->airline_compose_text;
                                                                            }
                                                                            $airlineDataInfo=DB::table('airlines')->where('id',$claims->airline_id)->first();
                                                                            $airEmail=$airlineDataInfo->email;
                                                                            if($aFolder) {
                                                                            foreach($aFolder as $oFolder) {
                                                                            $aMessage = $oFolder->messages()->from($airEmail)->get();
                                                                            foreach($aMessage as $oMessage){
                                                                            $time_stamps =  Carbon\Carbon::parse($oMessage->date)->timestamp;
                                                                            $sub=$oMessage->getSubject();
                                                                            $date = $oMessage->getDate();
                                                                            $from = $oMessage->getFrom()[0]->mail;
                                                                            // $body = $oMessage->getBodies();
                                                                            $msg = $oMessage->getHtmlBody();
                                                                            $longMsg=$oMessage->getBodies()['text']->content;
                                                                            $lines=explode("\n", $longMsg);
                                                                            $inbox_from_user[$time_stamps]['sub']   = $sub;
                                                                            $inbox_from_user[$time_stamps]['date']  = $date;
                                                                            $inbox_from_user[$time_stamps]['from']  = $from;
                                                                            $inbox_from_user[$time_stamps]['msg']   = $lines["0"];
                                                                            }
                                                                            }
                                                                            krsort($inbox_from_user,1);
                                                                            foreach ($inbox_from_user as $inbox_from_user_single) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>{{$inbox_from_user_single['from']}}</td>
                                                                                <td>{{$inbox_from_user_single['sub']}}</td>
                                                                                <td>{!! $inbox_from_user_single['msg'] !!}</td>
                                                                                <td>{{Carbon\Carbon::parse($inbox_from_user_single['date'])->format('d-m-Y')}}</td>
                                                                            </tr>
                                                                            <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    <div class="tab-pane" id="airline_inbox" role="tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                        $airlineInfo=DB::table('airlines')->where('id',$claims->airline_id)->first();
                        $airlineEmail=$airlineInfo->email;
                        if($aFolder) {
                            foreach($aFolder as $oFolder) {
                                $aMessage = $oFolder->messages()->from($airlineEmail)->get();
                                foreach($aMessage as $oMessage){
                                    // dd($oMessage);
                                $sub=$oMessage->getSubject();
                                $date = $oMessage->getDate();
                                $from = $oMessage->getFrom()[0]->mail;
                                $id = $oMessage->getMessageNo();
                                // $body = $oMessage->getBodies();
                                $msg = $oMessage->getHtmlBody();
                                $longMsg=$oMessage->getBodies()['text']->content;
                                $lines=explode("\n", $longMsg);
                                $attachFiles = $oMessage->getAttachments();
                        ?>
        <tr>
            <td>{{$from}}</td>
            <td>{{$sub}}</td>
            <td>{{$lines['0']}}</td>
            <td>{{Carbon\Carbon::parse($date)->format('d-m-Y')}}</td>
            <td>
                <a class="btn btn-info btn-sm" title="airline_inbox-{{$id}}" data-toggle="modal" data-target="#airline_inbox{{$id}}">View</a>
                <a class="btn btn-info btn-sm" title="airline_inbox-{{$id}}" data-toggle="modal" data-target="#airline_reply{{$id}}">Reply</a>
                <div id="airline_inbox{{$id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-wide">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" onclick="printDiv('airlineInbox')" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row" id="airlineInbox">
                                    <h4 class="text-center">Sub: {{$sub}}</h4> <br>
                                    <p>
                                        {!! $msg !!}
                                    </p>
                                </div>
                                <div class="row">
                                    @foreach($attachFiles as $attachment)
                                        <a class="btn btn-success btn-xs" href='{{ 'data:'.$attachment->content_type.';base64,'.base64_encode($attachment->content) }}' download='{{$attachment->name}}'>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                            <b>Attachment - {{$loop->iteration}}</b>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="airline_reply{{$id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-wide">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{$sub}}</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('claim-ajax-airline-reply-data')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" name="from_name" id="from_name" value="Claim'N Win" class="form-control" placeholder="From Name" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" name="from_email" value="{{$claims->cpanel_email}}" id="from_email" class="form-control" placeholder="From Email" required/>
                                    </div>
                                </div>
                                @php
                                $airlineData=DB::table('airlines')->where('id',$claims->airline_id)->first();
                                @endphp
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" name="to_email" id="to_email" value="{{$airlineData->email}}" class="form-control" placeholder="To Email" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" name="sub" id="airline_reply_sub" class="form-control" placeholder="Subject" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea name="airline_compose_text"  class="form-control airline_compose_text" id="airline_reply_compose_text" rows="5" cols="50"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="file" name="airline_reply_compose_files[]" id="airline_reply_compose_files" class="form-control" multiple/>
                                        <input type="hidden" name="claim_id" value="{{$claims->id}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-sm btn-success" id="airline-reply-data">Send</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <?php
        }
        }
        }
        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
                                                    <div class="tab-pane" id="airline_sent" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <th>From</th>
                                                                            <th>Subject</th>
                                                                            <th>Message</th>
                                                                            <th>Date</th>
                                                                            <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            if($airlineSents) {
                                                                            ?>
                                                                            @foreach($airlineSents as $airlineSent)
                                                                            <tr>
                                                                                <td>{{$airlineSent->from_email}}</td>
                                                                                <td>{{$airlineSent->sub}}</td>
                                                                                <td>{!! $airlineSent->airline_compose_text !!}</td>
                                                                                <td>{{Carbon\Carbon::parse($airlineSent->created_at)->format('d-m-Y')}}</td>
                                                                                <td>
                                                                                    <a class="btn btn-info btn-sm" title="airline_sent-{{$airlineSent->id}}" data-toggle="modal" data-target="#airline_sent{{$airlineSent->id}}">View</a>
                                                                                    <div id="airline_sent{{$airlineSent->id}}" class="modal fade" role="dialog">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" onclick="printDiv('airline_sent_msgs')" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>
                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <div class="row" id="airline_sent_msgs">
                                                                                                        <h4 class="text-center">Sub: {{$airlineSent->sub}}</h4> <br>
                                                                                                        <div class="col-md-12">
                                                                                                            <p>
                                                                                                                <h5><b>From:</b> {{ $airlineSent->from_name }}<{{ $airlineSent->from_email }}></h5>
                                                                                                                <h5><b>To:</b> {{ $airlineSent->to_email }}</h5>
                                                                                                                <h5><b>Date:</b> {{ $airlineSent->created_at }}</h5>
                                                                                                                <h5><b>Subject:</b> {{ $airlineSent->sub }}</h5>
                                                                                                                <br>
                                                                                                                <br>
                                                                                                            </p>
                                                                                                            {!! $airlineSent->airline_compose_text !!}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12">
                                                                                                            @php
                                                                                                            $airline_single_files=explode("|",$airlineSent->airline_compose_file);
                                                                                                            @endphp
                                                                                                            @foreach($airline_single_files as $key=>$value)
                                                                                                            @if($value != "")
                                                                                                            <a href="{{URL::to($value)}}" download class="btn btn-sm btn-info">Download File-{{$loop->iteration}}</a>
                                                                                                            &nbsp; &nbsp; &nbsp;
                                                                                                            @endif
                                                                                                            @endforeach
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="airline_case_history" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <th>Date</th>
                                                                            <th>Subject</th>
                                                                            <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>
                                                                                    <div id="SentEmailShow" class="modal modal-wide fade" role="dialog">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                    <h4 class="modal-title"></h4>
                                                                                                </div>
                                                                                                <div class="modal-body" style="display: block; overflow:scroll;">
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="airline_note_&_phone_calls" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-hover">
                                                                        <thead>
                                                                            <th>Date</th>
                                                                            <th>Subject</th>
                                                                            <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>
                                                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#SentEmailShow">View Email</button>
                                                                                    <div id="SentEmailShow" class="modal modal-wide fade" role="dialog">
                                                                                        <div class="modal-dialog">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                    <h4 class="modal-title"></h4>
                                                                                                </div>
                                                                                                <div class="modal-body" style="display: block; overflow:scroll;">
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="customer_final_comm" aria-labelledby="customer_final_comm-tab">
                                    </div>
<div role="tabpanel" class="tab-pane" id="reminder" aria-labelledby="reminder-tab" onload="users();">
    <div class="row">
        <div class="col-md-12">
            <br>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">Reminder</button>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Set Reminder</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('/claim-ajax-reminder-create')}}" method="post" id="add_details">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Reminder Date</label>
                                            <input type="date" name="callback_date" class="form-control" id="callback_date"  placeholder="Enter email">
                                            <input type="hidden" id="claim_id" name="claim_id" value="{{$claims->id}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Reminder Time</label>
                                            <input type="time" name="callback_time" class="form-control" id="callback_time"  placeholder="Enter email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="control-label">Note</label>
                                            <textarea name="note" class="form-control" id="note" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success" id="reminder-1">Reminder</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover ">
                    <thead>
                        <th>CLAIM ID</th>
                        <th>CLAIM STATUS</th>
                        <th>CALL REMINDER</th>
                        <th>SNOOZE</th>
                        <th>NOTES</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="reminder-data">
                        @foreach($reminders as $item)
                        <tr id="reminder-update-{{ $item->id }}">
                            <td>{{ $item->claim_id }}</td>
                            <td id="reminder-status-{{ $item->id }}">{{$item->status}}</td>
                            <td>{{$item->callback_date.' '.$item->callback_time}}</td>
                            <td>{{$item->snooze}}</td>
                            <td>{{$item->note}}</td>
                            <td>
                                <a type="button" data-toggle="modal" class="btn btn-sm btn-primary" title="View Reminder" data-target="#reminder-model-{{$item->id}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                <div id="reminder-model-{{$item->id}}" class="modal fade" role="dialog">
                                <?php
                                $reminder_claims=DB::table('claims')->where('id',$item->claim_id)->first();
                                $flightDetails = DB::table('itinerary_details')->where('claim_id',$reminder_claims->id)->where('is_selected','1')->first();
                                $airline = DB::table('airlines')->where('id',$flightDetails->airline_id)->first();
                                $passengers = DB::table('passengers')->where('claim_id',$reminder_claims->id)->get();
                                $reminderDeparted = DB::table('airports')->where('id',$reminder_claims->departed_from_id)->first();
                                $reminderfinalDestination = DB::table('airports')->where('id',$reminder_claims->final_destination_id)->first();
                                ?>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <a type="button" id="{{ $item->id }}" class="btn btn-sm btn-success dismiss">Dismiss</a>
                                            <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModalSchedule-{{$item->id}}" data-dismiss="modal">Reschedule</a>
                                            <a href="#" class="btn btn-sm btn-success">Snooze</a>
                                            <a type="button" id="{{ $item->id }}" class="btn btn-sm btn-success mark-as-done">Mark as done</a>
                                            <a href="{{URL::to('/claim-view/'.$item->claim_id)}}" class="btn btn-sm btn-primary">View Claim</a>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p style="font-weight:bold;">DEPARTED FROM: <span style="font-weight:normal;">{{$reminderDeparted->name}}</span></p>
                                                    <p style="font-weight:bold;">FINAL DESTINATION: <span style="font-weight:normal;">{{$reminderfinalDestination->name}}</span></p>
                                                    <p style="font-weight:bold;">Did you have any connecting flights?: <span style="font-weight:normal;">{{$reminder_claims->is_direct_flight == 0 ? 'No' : 'Yes'}}</span></p>
                                                    <p style="font-weight:bold;">What happened to the flight?:  <span style="font-weight:normal;">{{$reminder_claims->what_happened_to_the_flight}}</span></p>
                                                    <p style="font-weight:bold;">Date of {{$reminder_claims->claim_table_type}}:  <span style="font-weight:normal;">{{Carbon\Carbon::parse($reminder_claims->created_at)->format('d-m-Y')}}</span></p>
                                                    <p style="font-weight:bold;">Airline:  <span style="font-weight:normal;">{{$airline->name}}</span></p>
                                                    <p style="font-weight:bold;">Flight no:  <span style="font-weight:normal;">{{$flightDetails->flight_number}}</span></p>
                                                    <p style="font-weight:bold;">Departure date:  <span style="font-weight:normal;">{{$flightDetails->departure_date}}</span></p>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 style="font-weight:bold;">Passenger List</h4>
                                                            <table class="table table-borderless table-hover">
                                                                <thead>                             
                                                                    <th style="font-weight:bold;">First Name</th>
                                                                    <th style="font-weight:bold;">Last Name</th>
                                                                    <th style="font-weight:bold;">Ticket No</th>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($passengers as $pass)
                                                                        <tr>
                                                                            <td>{{$pass->first_name}}</td>
                                                                            <td>{{$pass->last_name}}</td>
                                                                            <td></td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <p style="font-weight:bold;">Status:  <span style="font-weight:normal;">{{$item->status}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a  type="button" data-toggle="modal" title="Edit Reminder" class="btn btn-sm btn-dark reminder-edit-view" data-target="#reminder-edit-model-{{$item->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            <div id="reminder-edit-model-{{$item->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Set Reminder</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('/claim-ajax-update-reminder')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Reminder Date</label>
                                                            <input type="date" name="callback_date" class="form-control" id="callback_date_{{$item->id}}" value="{{$item->callback_date}}"  placeholder="Enter email">
                                                            <input type="hidden" id="reminder_id_{{$item->id}}" name="id" value="{{$item->id}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Reminder Time</label>
                                                            <input type="time" name="callback_time" class="form-control" value="{{$item->callback_time}}" id="callback_time_{{$item->id}}"  placeholder="Enter email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="control-label">Note</label>
                                                            <textarea name="note" class="form-control" id="note_{{$item->id}}" cols="30" rows="3">{{$item->note}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-success update-reminder" id="{{$item->id}}">Reminder</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="myModalSchedule-{{$item->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Set Reminder</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('/claim-ajax-update-reminder')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Reminder Date</label>
                                                            <input type="date" name="callback_date" class="form-control" id="reschedule_callback_date_{{$item->id}}"  placeholder="Enter email">
                                                            <input type="hidden" name="id" id="reschedule_reminder_id_{{$item->id}}" value="{{$item->id}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Reminder Time</label>
                                                            <input type="time" name="callback_time" class="form-control" id="reschedule_callback_time_{{$item->id}}"  placeholder="Enter email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="control-label">Note</label>
                                                            <textarea name="note" class="form-control" id="reschedule_note_{{$item->id}}" cols="30" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-success reschedule-reminder" id="{{$item->id}}">Reminder</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/claim-ajax-delete-reminder', $item->id],
                                'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                'type' => 'button',
                                'class' => 'btn btn-danger btn-sm delete-reminder',
                                'id' => $item->id,
                                'title' => 'Delete Reminder'
                                )) !!}
                            {!! Form::close() !!}                                                                    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div role="tabpanel" class="tab-pane" id="required-details" aria-labelledby="required-details-tab">
    <form action="{{route('required-details')}}" method="post" name="required_details">
        @csrf
        <div class="row" style="margin-top:1%;">
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Bank Details </label>
                    <select class="form-control" id="bank_details_id" name="bank_details_id">
                        <option value="">Select Status</option>
                        @foreach($banks as $bank)
                        <option value="{{$bank->id}}" @if($claims->bank_details_id == $bank->id) selected @endif>{{$bank->account_name.' '.'('.$bank->title.')'}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Affiliate Commision </label>
                    <input type="text" class="form-control" name="affiliate_commision" id="affiliate_commision" value="{{$claims->affiliate_commision}}">
                    <input type="hidden" name="claim_id" id="claim_id_required" value="{{$claims->id}}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Admin Commision </label>
                    <input type="text" class="form-control" name="admin_commision" id="admin_commision" value="{{$claims->admin_commision}}">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="margin-top:1%;">
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Additional Details For LBA </label>
                    <textarea name="additional_details_for_lba" class="form-control" id="additional_details_for_lba" cols="30" rows="3">{{$claims->additional_details_for_lba}}</textarea>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Expected Compensation Amount </label>
                    <input type="text" class="form-control" name="amount" id="amount" value="{{$claims->amount}}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Received Amount </label>
                    <input type="text" class="form-control" name="received_amount" id="received_amount" value="{{$claims->received_amount}}">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="margin-top:1%;">
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Expected  Compensation Converted Amount </label>
                    <input type="text" class="form-control" name="converted_expection_amount" id="converted_expection_amount" value="{{$claims->converted_expection_amount}}" readonly>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label> CAA Ref</label>
                    <input type="text" class="form-control" name="caa_ref" id="caa_ref" value="{{$claims->caa_ref}}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label> ADR Ref </label>
                    <input type="text" class="form-control" name="adr_ref" id="adr_ref" value="{{$claims->adr_ref}}">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row" style="margin-top:1%;">
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Airline Referance </label>
                    <input type="text" class="form-control" name="airline_ref" id="airline_ref" value="{{$claims->airline_ref}}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Court No</label>
                    <input type="text" class="form-control" name="court_no" id="court_no" value="{{$claims->court_no}}">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" id="required-details-submit">Submit</button>
            </div>
        </div>
    </form>
</div>




<div role="tabpanel" class="tab-pane" id="claim-status" aria-labelledby="claim-status-tab">
    <div class="row" style="margin-top:1%;">
        <a type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add-status">Add New Status</a>

        <div id="add-status" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Status Add</h4>
              </div>
              <div class="modal-body">
                <form>
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'status_name']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', null,  ['class' => 'form-control','rows'=>3, 'id' => 'status_description']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group">
                        <button type="button" id="claim-status-submit">Create</button>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>


        <hr/>
        <form action="{{route('claim-nextstep-status-change')}}" method="post" name="clam_nextstep_status">
            @csrf
            <div class="col-sm-6">
                <div class="form-group">
                    <label> Status  </label>
                    <select class="form-control" id="claim_status" name="claim_status">
                        <option value="">Select Status</option>
                        @foreach($claimsStatus as $claims_status)
                        <option value="{{$claims_status->id}}" id="claim-status-list">{{$claims_status->name}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="claim_id" id="claim_id_for_status" value="{{$claims->id}}">
                </div>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-success" id="status_btn">Submit</button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="affiliate-info" aria-labelledby="affiliate-info-tab">
    <div class="row" style="margin-top:1%;">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-info-circle"></i> Affiliate Info Form
                </div>
                <div class="panel-body">
                    @if($claims->affiliate_user_id !="")
                        <input type="hidden" name="" id="cehck_affiliate_user_id" value="{{ $claims->affiliate_user_id }}">
                    @else
                        <input type="hidden" name="" id="cehck_affiliate_user_id" value="">
                    @endif
                    <div id="affiliate_infos-delete-form">
                        <form action="{{route('delete-affilite')}}" method="post" class="form-horizontal" name="affiliate_infos">
                            @csrf
                            <input type="hidden" id="affiliate_id" name="affiliate_id" value="{{ isset($affilaite_info->id) ? $affilaite_info->id : ''}}">
                            <input type="hidden" id="claim_id_for_affiliate" name="claim_id" value="{{ isset($claims->id) ? $claims->id : ''}}">
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="button" class="btn btn-md btn-danger" id="delete-affiliate">Delete Affiliate For This Claim</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="affiliate_infos-update-form-1">
                        <form action="{{route('update-affilite-info-data')}}" method="post" class="form-horizontal" name="affiliate_infos">
                            @csrf
                            <div class="form-group">
                                <label for="commision-info" class="control-label col-md-3">Commision Amount</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="commision_amount" id="commision-info-1" value="{{ isset($affilaite_info->commision_amount) ? $affilaite_info->commision_amount : ''}}">
                                    <input type="hidden" name="affiliate_id" id="affiliate_id_for_update_1" value="{{ isset($affilaite_info->id) ? $affilaite_info->id : ''}}">
                                    <input type="hidden" name="claim_id" id="claim_id_for_update_1" value="{{ isset($claims->id) ? $claims->id : ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="percentage" class="control-label col-md-3">Percentage</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="percentage" id="percentage-1" value="{{ isset($affilaite_info->percentage) ? $affilaite_info->percentage : ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="received-amount" class="control-label col-md-3">Received Amount</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="received_amount" id="received-amount-1" value="{{ isset($affilaite_info->received_amount) ? $affilaite_info->received_amount : ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="payment-method" class="control-label col-md-3">Payment Method</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="payment_method" id="payment-method-1" value="{{ isset($affilaite_info->payment_method) ? $affilaite_info->payment_method : ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="addition-description" class="control-label col-md-3">Additional Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="addition_description" id="addition-description-1" rows="3" cols="30">{{ isset($affilaite_info->addition_description) ? $affilaite_info->addition_description : ''}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="approved" class="control-label col-md-3">Approved Status</label>
                                <div class="col-md-9">
                                    <select name="approved" id="approved-1" class="form-control">
                                        <option value="0" @if(isset($affilaite_info->approved) == "0") selected @endif>No</option>
                                        <option value="1" @if(isset($affilaite_info->approved) == "1") selected @endif>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_payment_done" class="control-label col-md-3">Payment Status</label>
                                <div class="col-md-9">
                                    <select name="is_payment_done" id="is-payment-done-1" class="form-control">
                                        <option value="0" @if(isset($affilaite_info->is_payment_done) == "0") selected @endif>Not done</option>
                                        <option value="1" @if(isset($affilaite_info->is_payment_done) == "1") selected @endif>Complete</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="button" class="btn btn-sm btn-success" id="affiliate_info_update_1">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="affiliate_infos-update-form-2">
                    <form action="{{route('update-affilite-info-data')}}" method="post" class="form-horizontal" name="affiliate_infos">
                        @csrf
                        <div class="form-group">
                            <label for="affi_user_owner" class="control-label col-md-3">Affiliate User Owner Email</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="affi_user_owner" id="affi_user_owner_2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="commision-info" class="control-label col-md-3">Commision Amount</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="commision_amount" id="commision-info-2" value="">
                                <input type="hidden" name="claim_id" id="claim_id_for_update_2" value="{{isset($claims->id) ? $claims->id : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="percentage" class="control-label col-md-3">Percentage</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="percentage" id="percentage-2" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="received-amount" class="control-label col-md-3">Received Amount</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="received_amount" id="received-amount-2" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="payment-method" class="control-label col-md-3">Payment Method</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="payment_method" id="payment-method-2" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="addition-description" class="control-label col-md-3">Additional Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="addition_description" id="addition-description-2" rows="3" cols="30"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="approved" class="control-label col-md-3">Approved Status</label>
                            <div class="col-md-9">
                                <select name="approved" id="approved-2" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_payment_done" class="control-label col-md-3">Payment Status</label>
                            <div class="col-md-9">
                                <select name="is_payment_done" id="is-payment-done-2" class="form-control">
                                    <option value="0">Not done</option>
                                    <option value="1">Complete</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="button" class="btn btn-sm btn-success" id="affiliate_info_update_2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comments"></i> Affiliate Info
                </div>
                <div class="panel-body">
                    @if($affiliate_user)
                        <input type="hidden" name="" id="is_affiliate_user" value="{{ $affiliate_user->id }}">
                    @else
                        <input type="hidden" name="" id="is_affiliate_user" value="">
                    @endif
                    <div id="no-notification">
                        <h2>No affiliation in this claim</h2>
                    </div>
                    <div id="remove-after-delete-affiliate">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <tbody>
                                <tr class="odd gradeX">
                                    <th>User ID</th>
                                    <td id="affiliate_user_id">{{isset($affiliate_user->id) ? $affiliate_user->id : ''}}</td>
                                </tr>
                                <tr class="odd gradeX">
                                    <th>name</th>
                                    <td id="affiliate_user_name">{{ isset($affiliate_user->name) ? $affiliate_user->name : ''}}</td>
                                </tr>
                                <tr class="odd gradeX">
                                    <th>email</th>
                                    <td id="affiliate_user_email">{{isset($affiliate_user->email) ? $affiliate_user->email : '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="ticket-info" aria-labelledby="ticket-info-tab">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comments"></i> Ticket Info
                </div>
                <div class="panel-body">
                    <style>
                    .timeline {
                    position: relative;
                    padding: 21px 0px 10px;
                    margin-top: 4px;
                    margin-bottom: 30px;
                    }
                    .timeline .line {
                    position: absolute;
                    width: 4px;
                    display: block;
                    background: currentColor;
                    top: 0px;
                    bottom: 0px;
                    margin-left: 30px;
                    }
                    .timeline .separator {
                    border-top: 1px solid currentColor;
                    padding: 5px;
                    padding-left: 40px;
                    font-style: italic;
                    font-size: .9em;
                    margin-left: 30px;
                    }
                    .timeline .line::before { top: -4px; }
                    .timeline .line::after { bottom: -4px; }
                    .timeline .line::before,
                    .timeline .line::after {
                    content: '';
                    position: absolute;
                    left: -4px;
                    width: 12px;
                    height: 12px;
                    display: block;
                    border-radius: 50%;
                    background: currentColor;
                    }
                    .timeline .panel {
                    position: relative;
                    margin: 10px 0px 21px 70px;
                    clear: both;
                    }
                    .timeline .panel::before {
                    position: absolute;
                    display: block;
                    top: 8px;
                    left: -24px;
                    content: '';
                    width: 0px;
                    height: 0px;
                    border: inherit;
                    border-width: 12px;
                    border-top-color: transparent;
                    border-bottom-color: transparent;
                    border-left-color: transparent;
                    }
                    .timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
                    .timeline .panel .panel-heading.icon {
                    position: absolute;
                    left: -59px;
                    display: block;
                    width: 40px;
                    height: 40px;
                    padding: 0px;
                    border-radius: 50%;
                    text-align: center;
                    float: left;
                    }
                    .timeline .panel-outline {
                    border-color: transparent;
                    background: transparent;
                    box-shadow: none;
                    }
                    .timeline .panel-outline .panel-body {
                    padding: 10px 0px;
                    }
                    .timeline .panel-outline .panel-heading:not(.icon),
                    .timeline .panel-outline .panel-footer {
                    display: none;
                    }
                    </style>
                    @include('layouts.includes.partial.alert')
                    <div class="forms">
                        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                            <div class="form-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if(count($ticket_notes) > 0)
                                                <div id="timeline-all">
                                                    <div class="timeline">
                                                        @foreach($ticket_notes as $row)
                                                        <article class="panel panel-primary">
                                                            <div class="panel-heading icon">
                                                                <i class="fa fa-comment"></i>
                                                            </div>
                                                            <div class="panel-heading">
                                                                <h2 class="panel-title pull-left">
                                                                @if($row->user_id == $claims->user_id)
                                                                User
                                                                @else
                                                                Admin
                                                                @endif
                                                                </h2>
                                                                <h2 class="panel-title pull-right">{{Carbon\Carbon::parse($row->created_at)->format('d-m-Y')}} at {{Carbon\Carbon::parse($row->created_at)->format('H:i A')}}</h2>
                                                            </div>
                                                            <div class="panel-body">
                                                                {!! $row->description !!}
                                                            </div>
                                                        </article>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                      
                                        @if($ticket)
                                            <input type="hidden" name="ticket_status" id="ticket_status" value="{{ isset($ticket->status) ? $ticket->status : '' }}">
                                        @endif

                                        <div class="row" id="description-design">
                                            <div class="col-md-12">
                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading bg-dark">
                                                            <h4 style="color: white;">Respond</h4>
                                                        </div>
                                                        <div class="panel-body">
                                                            <form action="{{route('ticket-description')}}" method="post" class="form-horizontal">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <textarea name="description" id="ticket_description" cols="30" rows="5" class="form-control"></textarea>
                                                                        <input type="hidden" name="ticket_id" id="ticket_id" value="{{ isset($ticket->id) ? $ticket->id : ''}}">
                                                                        <input type="hidden" name="" id="claim_user_id_for_ticket">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <button type="button" class="btn btn-lg btn-success" id="ticket-submit-btn">Respond To Ticket</button>
                                                                        <a type="button" id="{{ isset($ticket->id) ? $ticket->id : ''}}" class="btn btn-lg btn-danger pull-right close-ticket">Close Ticket</a>
                                                                    </div>
                                                                </div>
                                                            </form>
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
                </div>
            </div>
        </div>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="note" aria-labelledby="note-tab" style="margin-top: 15px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-tasks"></i> Note Info
                </div>
                <div class="panel-body">
                    <form action="{{url('/save-note')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea name="note"  cols="30" rows="5" class="form-control tinymce-editor"></textarea>
                                <input type="hidden" name="claim_id" value="{{$claims->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="note_files[]" id="note_file" multiple>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                    @if($notes)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <th>#</th>
                                        <th>Note</th>
                                        <th>Created by</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach($notes as $note)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{!! $note->note !!}</td>
                                            <td>{{ $user_who_created_note[$note->user_id] }}</td>
                                            <td>{{ $note->created_at }}</td>
                                            <td>
                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/notes', $note->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                                <input type="hidden" name="claim_id" value="{{$note->claim_id}}" />
                                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'title' => 'Delete Ticket',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                                {!! Form::close() !!}
                                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewNote-{{$note->id}}"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#editNote-{{$note->id}}"><i class="fa fa-edit"></i></a>
                                                
                                                @php
                                                if($note->note_files != null){
                                                $noteFiles = explode("|",$note->note_files);
                                                @endphp
                                                @foreach($noteFiles as $key=>$value)
                                                @if(strpos(strtolower($value), 'pdf') !== false)
                                                <a href="{{URL::to($value)}}" target="_blank" class="btn btn-success btn-sm">
                                                    PDF
                                                </a>
                                                @endif
                                                @endforeach
                                                @php
                                                }
                                                @endphp
                                            </td>
                                        </tr>
                                        @php
                                        $i++;
                                        @endphp
                                        <div class="modal fade" id="editNote-{{$note->id}}" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form action="{{route('update-note')}}" method="post" class="form-horizontal">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Edit Note Data</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <textarea name="note" cols="30" rows="5" class="form-control edit-note tinymce-editor">{{$note->note}}</textarea>
                                                                <input type="hidden" name="note_id" value="{{$note->id}}">
                                                                <input type="hidden" name="claim_id" value="{{$note->claim_id}}" />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Update</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="viewNote-{{$note->id}}" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h3 class="text-center">Note Data</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4>User Name: {{Auth::user()->name}}</h4> <br>
                                                                    <h4>Claim Id: {{$note->claim_id}}</h4> <br>
                                                                    <p>
                                                                        {!! $note->note !!}
                                                                    </p><br>
                                                                    <?php
                                                                    if($note->note_files != null){
                                                                    $noteFiles = explode("|",$note->note_files);
                                                                    ?>
                                                                    @foreach($noteFiles as $key=>$value)
                                                                   
                                                                    <a href="{{URL::to($value)}}" download class="btn btn-success btn-sm">Download File-{{$loop->iteration}}</a>
                                                                    &nbsp; &nbsp; &nbsp;
                                                                    @endforeach
                                                                    @php
                                                                    }
                                                                    @endphp
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="affiliate-note" aria-labelledby="affiliate-note-tab" style="margin-top: 15px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-tasks"></i> Affiliate Note Info
                </div>
                <div class="panel-body">
                    <form action="{{route('affiliate-note-add')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea name="affiliate_note" id="affiliate-note-des" cols="30" rows="5" class="form-control"></textarea>
                                <input type="hidden" name="claim_id" id="claim_id_for_affiliate_note" value="{{$claims->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-sm btn-success" id="affiliate-note-submit-btn"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>#</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="affliate-note-info-table">
                                        
                                        @foreach($affiliateNotes as $affiliateNote)
                                        <tr id="affiliate-note-update-{{ $affiliateNote->id }}">
                                            <td>{{ $affiliateNote->id }}</td>
                                            <td>{{$affiliateNote->affiliate_note}}</td>
                                            <td>

                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/claim-ajax-affiliate-note-delete', $affiliateNote->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                                <input type="hidden" name="claim_id" value="{{$affiliateNote->claim_id}}" id="claim_id_for_affiliate_note_delete" />
                                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                                'type' => 'button',
                                                'class' => 'btn btn-danger btn-sm delete-affiliate-note',
                                                'title' => 'Delete Affiliate Note',
                                                'id' => $affiliateNote->id
                                                )) !!}
                                                {!! Form::close() !!}

                                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#editAffiliateNote-{{ $affiliateNote->id }}"><i class="fa fa-edit"></i></a>
                                                <div class="modal fade" id="editAffiliateNote-{{ $affiliateNote->id }}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{route('update-affiliate-note')}}" method="post" class="form-horizontal">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Edit Note Data</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <textarea name="affiliate_note" id="affiliate-update-note-{{ $affiliateNote->id }}" cols="30" rows="5" class="form-control">{{$affiliateNote->affiliate_note}}</textarea>
                                                                    <input type="hidden" id="new_descript_{{ $affiliateNote->id }}">

                                                                    <input type="hidden" name="affiliate_note_id" value="{{$affiliateNote->id}}" id="affiliate_note_id_{{ $affiliateNote->id }}">
                                                                    <input type="hidden" name="claim_id" value="{{$affiliateNote->claim_id}}" id="claim_id_update_affiliate_note_{{ $affiliateNote->id }}" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info affiliate-note-update-btn" id="{{ $affiliateNote->id }}"><i class="fa fa-save"></i> Update</button>
                                                                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </td>
                                            

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="expanse" aria-labelledby="expanse-tab">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comments"></i> Expense Info
                </div>
                <div class="panel-body">
                    @if(!$expanses)
                    <h2>No expanse in this claim</h2>
                    @else
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <th>Claim Id</th>
                            <th>Expense Name</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Receipt</th>
                        </thead>
                        <tbody>
                            @foreach($expanses as $expense)
                            <tr class="odd gradeX">
                                <td>{{$expense->claim_id}}</td>
                                <td>{{$expense->name}}</td>
                                <td>
                                    @if($expense->amount == null)
                                    <span style="color: red;">0</span>
                                    @else
                                    {{$expense->amount}}
                                    @endif
                                </td>
                                <td>{{$expense->currency}}</td>
                                <td>
                                    @if($expense->is_receipt == 0)
                                    <span style="color: red;">No</span>
                                    @else
                                    <span style="color: green;">Yes</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div role="tabpanel" class="tab-pane" id="airline" aria-labelledby="airline-tab" style="margin-top: 15px;">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Airline Info</h3><br>
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tbody>
                        <tr>
                            <th>Airline Id</th>
                            <td>{{$airlineInfo->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$airlineInfo->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$airlineInfo->email}}</td>
                        </tr>
                        <tr>
                            <th>Iata Code</th>
                            <td>{{$airlineInfo->iata_code}}</td>
                        </tr>
                        <tr>
                            <th>Icao Code</th>
                            <td>{{$airlineInfo->icao_code}}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{$airlineInfo->country}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$airlineInfo->phone}}</td>
                        </tr>
                        <tr>
                            <th>Alias</th>
                            <td>{{$airlineInfo->alias}}</td>
                        </tr>
                        <tr>
                            <th>Address Line 1</th>
                            <td>{{$airlineInfo->address_line_1}}</td>
                        </tr>
                        <tr>
                            <th>Address Line 2</th>
                            <td>{{$airlineInfo->address_line_2}}</td>
                        </tr>
                        <tr>
                            <th>Address Line 3</th>
                            <td>{{$airlineInfo->address_line_3}}</td>
                        </tr>
                        <tr>
                            <th>Address Line 4</th>
                            <td>{{$airlineInfo->address_line_4}}</td>
                        </tr>
                        <tr>
                            <th>Online Form Link</th>
                            <td>{{$airlineInfo->online_form_link}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($airlineInfo->status == 1)
                                <span style="color: green;">Enabled</span>
                                @else
                                <span style="color: red;">Disabled</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<div class="clearfix"> </div>
</div>
</div>
</div>
</div>
</div>
</div>
    <script>
    document.forms['clam_nextstep_status'].elements['claim_status'].value="{{$claimStatusData->id}}";
    document.forms['required_details'].elements['bank_details_id'].value="{{$claims->bank_details_id}}";
    </script>
    @endsection
    @section('footer-script')
    <script>
    $(".modal-wide").on("show.bs.modal", function() {
    var height = $(window).height() - 200;
    $(this).find(".modal-body").css("max-height", height);
    });
    </script>
    <script>
    $(function() {

    $(".sidebar-menu a").css('color','#b8c7ce');
    $(".sidebar-menu a").hover(function() {
      $(this).css("color",'#b8c7ce')
    });

    $('.time-input-required').click(function(){
    alert("You have to input all flights time.");
    });
    $('.select-template').change(function(){
    var current_option_value = $(this).val();
    if (current_option_value != 0) {
    $.ajax({
    type:'POST',
    url:'{{ url("/ajax/get-email-template") }}',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data:{
    'id'          : current_option_value
    },
    success:function(data){
    tinyMCE.get('my_editor').setContent(data);
    tinyMCE.get('airline_editor').setContent(data);
    }
    });
    }
    });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
    } );
    function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    setTimeout(function() {
    location.reload();
    }, 1000);
    }
    </script>
    <style type="text/css">
    a, a:link, a:visited, a:hover, a:active
    {
      /*color: #b8c7ce !important;*/
      text-decoration: none !important;
    }
    </style>
    <script type="text/javascript">

    $('.datepicker').on(
        'dp.show',
        function(e) {
        $(".bootstrap-datetimepicker-widget").css(
        "background-color", "#3c3e43");
        });


    $('.datepicker').datetimepicker({
        format: 'DD/MM/YYYY HH:mm A',
    });

    $('#date').datepicker();

    $('.scheduled_departure_time').datetimepicker({
        format: 'HH:mm A',
    });



    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        var hidden_claim_id = $("#hidden_claim_id").val();
        var hidden_airline_id = $("#hidden_airline_id").val();
        var hidden_flight_number = $("#hidden_flight_number").val();
        var hidden_date = $("#hidden_date").val().replace(/-/gi, "/");
        $(".airline_id").val(hidden_airline_id);
        $(".flight_no").val(hidden_flight_number);
        $(".date").val(hidden_date);
        $(".claim_id").val(hidden_claim_id);
    });
</script>


    <script src="{{ asset('admin_asset/js/ajax-file.js') }}"></script>
    @endsection