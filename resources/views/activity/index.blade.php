@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>System Activity Log</h4>
            </div>

            <div class="form-body">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['method' => 'GET', 'url' => url('/activity/index'), 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search']) !!}
                              <div class="row">
                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="id" placeholder="Id" value="{{ request('id') }}">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="log_name" placeholder="Log Name" value="{{ request('log_name') }}">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="model_name" placeholder="Model Name" value="{{ request('model_name') }}">
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="user_email" placeholder="User Email" value="{{ request('user_email') }}">
                                  </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit" name="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                              </div>
                              {!! Form::close() !!}

                              <br>
                              <br>


                        <div class=" table-responsive">
                            <table class="table table-borderless"  id="users-table">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Log Name</td>
                                        <td>Description</td>
                                        <td>Subject Id</td>
                                        <td>Subject Type</td>
                                        <td>Causer By</td>
                                        <td>Causer Type</td>
                                        <td>Created At</td>
                                        <td>Properties</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activities as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->log_name}}</td>
                                            <td>{{  $row->description }}</td>
                                            <td>{{$row->subject_id}}</td>
                                            <td>{{$row->subject_type}}</td>
                                            <td>
                                                @if(isset($user_name[$row->causer_id]))
                                                    {{$user_name[$row->causer_id]}}
                                                @endif
                                                <br>
                                                @if(isset($user_email[$row->causer_id]))
                                                    {{$user_email[$row->causer_id]}}
                                                @endif
                                            </td>
                                            <td>{{$row->causer_type}}</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>{{  htmlspecialchars_decode(str_replace(['{"attributes":{"','}','{','"', ',', ':'],['','','<br>', '', ', ', ' : '],$row->properties)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper">{{$activities->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
