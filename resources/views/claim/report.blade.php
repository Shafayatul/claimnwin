@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Report</h4>
        </div>

        <div class="form-body">
            <div class="card">
                <div class="card-body">

                  {!! Form::open(['method' => 'GET', 'url' => url('/manage-report'), 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search']) !!}
                  <div class="row">
                    <div class="col-md-2">
                      <div class="input-group">
                        <label>Airline</label>
                          <input type="text" class="form-control" name="s_airline" placeholder="Name" value="{{ request('s_airline') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                        <label>Claim Status</label>
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
                        <br>
                      <span class="input-group-append">
                          <button class="btn btn-secondary" type="submit">
                              <i class="fa fa-search"></i>
                          </button>
                      </span>
                    </div>
                  </div>
                  {!! Form::close() !!}

                    <div class=" table-responsive">
                        <table class="table table-borderless">
                            <thead>
								<tr>
									<th>DATE</th>
									<th>CLAIM ID</th>
									<th>CLIENT</th>
									<th>AIRLINE</th>
									<th>CLAIM AMOUNT</th>
									<th>ADMIN COMMISSION</th>
									<th>AFFILIATE COMMISSION</th>
									<th>CLAIM STATUS</th>
								</tr>
                            </thead>
                            <tbody>
                                @foreach($claims as $row)
                                <tr>
                                	<td>
                                		{{ Carbon\Carbon::parse($row->created_at)->format('m-d-Y') }}
                                	</td>
                                	<td>
                                		<a href="{{url('/claim-view/'.$row->id)}}">{{$row->id}}</a>
                                	</td>
                                	<td>
	                                    @if(isset($user_all[$row->user_id]))
	                                    	{{$user_all[$row->user_id]}}
	                                    @endif
                                	</td>
	                                <td>
	                                    @if(isset($airlines[$row->airline_id]))
	                                    	{{$airlines[$row->airline_id]}}
	                                    @endif
	                                </td>
	                                <td>
	                                    {{$row->amount}}
	                                </td>
	                                <td>
	                                    {{$row->admin_commision}}%
	                                </td>
	                                <td>
	                                    {{$row->affiliate_commision}}%
	                                </td>
	                                <td>
	                                    @if(isset($claim_status[$row->claim_status_id]))
	                                    	{{$claim_status[$row->claim_status_id]}}
	                                    @endif
	                                    
	                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper">{{$claims->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
