@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>List of Claims</h4>
            </div>

            <div class="form-body">
                    <div class="card">

                            <div class="card-body">

                              {!! Form::open(['method' => 'GET', 'url' => url('/manage-claim'), 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search']) !!}
                              <div class="row">
                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="claim_id" placeholder="Claim Id" value="{{ request('claim_id') }}">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ request('first_name') }}">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ request('last_name') }}">
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="email" placeholder="Email" value="{{ request('email') }}">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ request('phone') }}">
                                  </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="note" placeholder="Note" value="{{ request('note') }}">
                                    </div>
                                </div>

                              </div>
                              <div class="row">

                                <div class="col-md-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="airline_ref" placeholder="Airline Reference" value="{{ request('airline_ref') }}">
                                </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="caa_ref" placeholder="CAA Reference" value="{{ request('caa_ref') }}">
                                  </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="adr_ref" placeholder="ADR Reference" value="{{ request('adr_ref') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="court_no" placeholder="Court No" value="{{ request('court_no') }}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="s_airline" placeholder="Airline Name" value="{{ request('s_airline') }}">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="input-group">
                                    <select class="form-control" id="status" name="s_claim_status">
                                      <option value="">-- Please select --</option>
                                      @foreach($claim_status as $key=>$value)
                                        <option value="{{$key}}" @if(request('s_claim_status') == $key) selected @endif>{{$value}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="input-group">
                                        <label>Starting date:</label>
                                      <input type="date" class="form-control" name="s_starting_date" placeholder="" value="{{ request('s_starting_date') }}">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="input-group">
                                        <label>End date:</label>
                                      <input type="date" class="form-control" name="s_end_date" placeholder="" value="{{ request('s_end_date') }}">
                                  </div>
                                </div>

                                <div class="col-md-2">
                                    <span class="input-group-append">
                                        <br>
                                        <button class="btn btn-secondary" type="submit" name="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                              </div>
                              {!! Form::close() !!}

                              <br>
                              <br>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>

                                                <th>CLAIM ID</th>
                                                <th>User Email</th>
                                                <th>DEPATED/FINAL DESTINATION</th>
                                                <th>CLAIM TYPE</th>
                                                <th>AIRLINE/FLIGHT NO</th>
                                                <th>Affiliate</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($claims as $row)
                                            <tr>

                                                <td>
                                                    <a href="{{url('/claim-view/'.$row->id)}}">{{$row->id}}</a>
                                                </td>
                                                <td>
                                                    @if(isset($passenger[$row->id]['email']))
                                                        {{$passenger[$row->id]['email']}}
                                                    @endif
                                                    <br>
                                                    <a href="#"></a>
                                                </td>

                                                <td>
                                                    @if(isset($airport[$row->final_destination_id]))
                                                        {{$airport[$row->departed_from_id]}}
                                                    @endif
                                                    <br/>
                                                    @if(isset($airport[$row->final_destination_id]))
                                                        {{$airport[$row->final_destination_id]}}
                                                    @endif

                                                </td>


                                                <td>
                                                    {{str_replace('_', ' ', ucfirst($row->claim_table_type)) }}
                                                </td>
                                                 <td>

                                                    @if($row->airline_id !="")
                                                        {{$airline[$claim_and_airline_array[$row->id]['airline_id']]}}
                                                    @endif


                                                </td>
                                                <td>
                                                    @if($row->affiliate_user_id != "")
                                                        <i class="fa fa-flag" aria-hidden="true"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('/claim-view/'.$row->id)}}" class="btn btn-sm btn-primary">Details</a>
                                                    @if($row->is_deleted == 0)
                                                    <a href="{{URL::to('/claim-archive/'.$row->id)}}" class="btn btn-sm btn-danger">Close</a>
                                                    @else
                                                    <a href="{{URL::to('/claim-archive/'.$row->id)}}" class="btn btn-sm btn-success">Reopen</a>
                                                    @endif
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                <div class="pagination-wrapper"> {!! $claims->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>
                        </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
