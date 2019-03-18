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
