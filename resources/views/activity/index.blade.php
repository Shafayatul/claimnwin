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
                                            <td>{{$row->description}}</td>
                                            <td>{{$row->subject_id}}</td>
                                            <td>{{$row->subject_type}}</td>
                                            <td>{{$row->causer_id}}</td>
                                            <td>{{$row->causer_type}}</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>{{$row->properties}}</td>
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