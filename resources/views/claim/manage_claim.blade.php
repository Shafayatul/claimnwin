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

                                        {{-- {!! Form::open(['method' => 'GET', 'url' => '/', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                                        <div class="form-group mb-n">
                                        <div class="row">

                                            <div class="col-md-11 grid_box1">
                                            <label class="control-label">Claim Id</label>
                                            <input type="text" name="search" class="form-control1" value="">
                                            </div>
                                            <div class="col-md-1">
                                                    <label class="control-label"></label>
                                                    <input type="submit" class="btn btn-success" value="Search">
                                                </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>

                                        {!! Form::close() !!} --}}
                                <div class=" table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>

                                                <th>CLAIM ID</th>
                                                {{-- <th>NAME</th> --}}
                                                {{-- <th>DEPATED/FINAL DESTINATION</th> --}}
                                                <th>CLAIM TYPE</th>
                                                {{-- <th>AIRLINE/FLIGHT NO</th> --}}
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($claims as $row)
                                            <tr>

                                            <td><a href="{{url('/claim-view/'.$row->id)}}">{{$row->id}}</a></td>
                                                {{-- <td>
                                                        {{$passenger[$row->id]['first_name'].' '.$passenger[$row->id]['last_name']}}
                                                    <br>
                                                    <a href="#"></a>
                                                </td> --}}

                                                {{-- <td>
                                                        {{$airport[$row->departed_from_id]}}<br/>

                                                        {{$airport[$row->final_destination_id]}}
                                                </td> --}}

                                                <td>
                                                    {{$row->claim_table_type}}
                                                </td>
                                                {{-- <td>
                                                    {{$airline[$claim_and_airline_array[$row->id]['airline_id']]}}
                                                    {{$airline[$claim_and_airline_array[$row->id]['airline_id']]}}
                                                </td>--}}
                                                <td>
                                                    <a href="{{url('/claim-view/'.$row->id)}}" class="btn btn-sm btn-primary">Details</a>
                                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper">  </div>
                                </div>
                        </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
