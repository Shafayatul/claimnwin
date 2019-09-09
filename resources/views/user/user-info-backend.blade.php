@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>View/Edit User</h4>
        </div>
        <div class="form-body">
            <div class="card">

                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="grids widget-shadow">
                    <form action="{{route('update-user-info')}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 grid_box1">
                                    <div class="form-group">
                                        <label for="name" class="col-md-3 control-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name" required>
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="col-md-3 control-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}" id="email" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add_special_affiliate_offer" class="col-md-12 control-label">Add special affiliate offer(%)</label>
                                        <input type="add_special_affiliate_offer" class="form-control" name="add_special_affiliate_offer" value="{{$user->add_special_affiliate_offer}}" id="add_special_affiliate_offer">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add_special_affiliate_offer" class="col-md-12 control-label">Affiliate option</label>
                                        <div class="input-group">
                                            <select class="form-control" id="is_affiliate_first_time" name="is_affiliate_first_time">
                                              <option value="1" @if($user->is_affiliate_first_time ==1) selected @endif>Only First Time</option>
                                              <option value="0" @if($user->is_affiliate_first_time==0) selected @endif>All The Time</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
