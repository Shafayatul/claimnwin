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

                  {!! Form::open(['method' => 'GET', 'url' => url('/manage-affiliate'), 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search']) !!}
                  <div class="row">
                    <div class="col-md-2">
                      <div class="input-group">
                        <label>Claim Id</label>
                          <input type="text" class="form-control" name="s_claim_id" placeholder="Claim Id" value="{{ request('s_claim_id') }}">
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

                                    <th>Date</th>
                                    <th>CLAIM ID</th>
                                    <th>Client</th>
                                    <th>Referred By</th>
                                    <th>Claim Amount</th>
                                    <th>Admin Commission</th>
                                    <th>Affiliate Commission</th>
                                    <th>Claim Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($claims as $row)
                                <tr>
                                   <td>
                                      {{ Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}
                                  </td>

                                  <td>
                                      <a href="{{url('/claim-view/'.$row->id)}}">{{$row->id}}</a>
                                  </td>
                                  <td>
                                    {{$user_all[$row->user_id]}}
                                </td>

                                <td>
                                    {{$user_all[$row->affiliate_user_id]}}
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
                                    {{$claim_status[$row->claim_status_id]}}
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
