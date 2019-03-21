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

                                        {!! Form::open(['method' => 'GET', 'url' => '/', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                                        <div class="form-group mb-n">
                                        <div class="row">

                                            <div class="col-md-2 grid_box1">
                                            <label class="control-label">Claim Id</label>
                                            <input type="text" name="search" class="form-control1" value="">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">First Name</label>
                                                <input type="text" name="search" class="form-control1" value="">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">Airline</label>
                                                <input type="text" name="search" class="form-control1" value="">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">Flight No</label>
                                                <input type="text" name="search" class="form-control1" value="">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">Claim Type</label>
                                                <input type="text" name="search" class="form-control1" value="">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">Phone</label>
                                                <input type="text" name="search" class="form-control1" value="">
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <div class="row">

                                                <div class="col-md-2 grid_box1">
                                                <label class="control-label">Email</label>
                                                <input type="text" name="search" class="form-control1" value="">
                                                </div>
                                                <div class="col-md-1 grid_box1">
                                                    <label class="control-label text-center">OR</label>
                                                </div>
                                                <div class="col-md-2 grid_box1">
                                                    <label class="control-label">Airline Reference</label>
                                                    <input type="text" name="search" class="form-control1" value="">
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="control-label"></label>
                                                    <input type="submit" class="btn btn-success" value="Search">
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>

                                    </div>

                                        {!! Form::close() !!}
                                <div class=" table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>CLAIM ID</th>
                                                <th>NAME</th>
                                                <th>DEPATED/FINAL DESTINATION</th>
                                                <th>CLAIM TYPE</th>
                                                <th>AIRLINE/FLIGHT NO</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                            <td><a href="{{url('/claim-view')}}">#000370</a></td>
                                                <td>
                                                    DIPTO
                                                    <br>
                                                    <a href="#">Ref By Claims Win</a>
                                                </td>
                                                <td>
                                                    John F Kennedy International Airport, New York (JFK)<br/>
                                                    London Heathrow Airport, London (LHR)
                                                </td>
                                                <td>
                                                    Missed connection
                                                </td>
                                                <td>
                                                    BA CityFlyer (CJ)<br/>
                                                    652
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-primary">Details</a>
                                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                                </td>

                                            </tr>
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
