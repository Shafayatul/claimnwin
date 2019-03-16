@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>List of Currency</h4>
            </div>

            <div class="form-body">
  <div class="card">

      <div class="card-body">

          {!! Form::open(['method' => 'GET', 'url' => '/reminders', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                                        <div class="form-group mb-n">
                                        <div class="row">

                                            <div class="col-md-3 grid_box1">
                                            <label class="control-label">Claim Id</label>
                                            <input type="text" name="search" class="form-control1" value="{{ request('search') }}">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">Reminder Status</label>
                                                <input type="text" name="search" class="form-control1" value="{{ request('search') }}">
                                            </div>
                                            <div class="col-md-3 grid_box1">
                                                <label class="control-label">From Date</label>
                                                <input type="text" name="search" class="form-control1" value="{{ request('search') }}">
                                            </div>
                                            <div class="col-md-3 grid_box1">
                                                <label class="control-label">To Date</label>
                                                <input type="text" name="search" class="form-control1" value="{{ request('search') }}">
                                            </div>
                                            <div class="col-md-1">
                                                <label class="control-label"></label>
                                                <input type="submit" class="btn btn-success">
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>

                                        {!! Form::close() !!}

          <br/>
          <br/>
          <div class="table-responsive">
              <table class="table table-borderless">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Claim Id</th>
                          <th>Call Reminder</th>
                          <th>Snooz</th>
                          <th>Status</th>
                          <th>Notes</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($reminders as $item)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->claim_id }}</td>
                          <td>{{ $item->callback_date.''.$item->callback_time }}</td>
                          <td>{{ $item->snooz }}</td>
                          <td>{{ $item->status }}</td>
                          <td>{{ $item->note }}</td>
                          <td>
                              <a href="{{ url('/reminders/' . $item->id) }}" title="View Reminder"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                              <a href="{{ url('/reminders/' . $item->id . '/edit') }}" title="Edit Reminder"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                              {!! Form::open([
                                  'method'=>'DELETE',
                                  'url' => ['/reminders', $item->id],
                                  'style' => 'display:inline'
                              ]) !!}
                                  {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                          'type' => 'submit',
                                          'class' => 'btn btn-danger btn-sm',
                                          'title' => 'Delete Reminder',
                                          'onclick'=>'return confirm("Confirm delete?")'
                                  )) !!}
                              {!! Form::close() !!}
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
              <div class="pagination-wrapper"> {!! $reminders->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

      </div>
  </div>
</div>
</div>
</div>
@endsection
