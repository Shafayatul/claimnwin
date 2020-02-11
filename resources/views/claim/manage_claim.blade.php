
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
                              <input type="text" class="form-control auto_airport_complete common_input connection" name="s_airline" placeholder="East-West Paris Airport" value="{{ request('s_airline') }}" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="input-group">
                              <input type="text" class="form-control " name="flight_number" placeholder="flight_number" value="{{ request('flight_number') }}" autocomplete="off">
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
                            @if($is_paginate)
                              <div class="pagination-wrapper"> 
                                {!! $claims->appends(['search' => Request::get('search')])->render() !!} 
                              </div>
                            @endif
                        </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection


@section('footer-script')
<style type="text/css" href="{{asset('autocomplete/jquery.auto-complete.css')}}"></style>
<script src="{{asset('autocomplete/jquery.auto-complete.js')}}"></script>
<script type="text/javascript">
  // $(document).ready(function(){
      auto_airline_complete();
      function auto_airline_complete(){
        alert('00');
        $('.auto_airline_complete').autoComplete({
            minChars: 3,
            source: function(term, suggest){
              alert('22');
                term = term.toLowerCase();
                var choices = {!! $airline_object !!};
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            },
            renderItem: function (item, search){
              alert('33');
                search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                return '<div class="autocomplete-suggestion" data-langname="'+item[0]+'" data-lang="'+item[1]+'" data-val="'+search+'"> '+item[0].replace(re, "<b>$1</b>")+'</div>';
            },
            onSelect: function(e, term, item){
                $(':focus').val(item.data('langname')).attr('iata_code',item.data('lang'));
                // setting value
                var iata_code = $(':focus').attr('iata_code');
                var serial = $(':focus').attr('serial');
                console.log(iata_code);
                console.log(serial);
                console.log($(".flight_code_"+serial).val(iata_code));
                $(':focus').blur();
            }
        });
      }
  // });
</script>
@endsection