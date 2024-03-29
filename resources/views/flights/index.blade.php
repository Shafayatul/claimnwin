@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>List of Flights</h4>
            </div>

            <div class="form-body">
                    <div class="card">

                            <div class="card-body">
          {{-- <a href="{{ url('/flights/create') }}" class="btn btn-success btn-sm" title="Add New Flight">
              <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a>

          {!! Form::open(['method' => 'GET', 'url' => '/flights', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
          <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
              <span class="input-group-append">
                  <button class="btn btn-secondary" type="submit">
                      <i class="fa fa-search"></i>
                  </button>
              </span>
          </div>
          {!! Form::close() !!}

          <br/>
          <br/> --}}
          <div class="table-responsive">
              <table class="table table-borderless">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Flight No</th>
                          <th>Airline</th>
                          <th>Date</th>
                          <th>Scheduled Departure Time</th>
                          <th>Scheduled Arrival Time And Date</th>
                          <th>Actual Departure Time And Date</th>
                          <th>Actual Arrival Time And Date</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($flights as $item)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->flight_no }}</td>
                          <td>{{ $airline[$item->airline_id] }}</td>
                          <td>{{ $item->date }}</td>
                          <td>{{ $item->scheduled_departure_time_and_date }}</td>
                          <td>{{ $item->scheduled_arrival_time_and_date }}</td>
                          <td>{{ $item->actual_departure_time_and_date }}</td>
                          <td>{{ $item->actual_arrival_time_and_date }}</td>
                          <td>
                              <a href="{{ url('/flights/' . $item->id) }}" title="View Flight"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                              <a href="{{ url('/flights/' . $item->id . '/edit') }}" title="Edit Flight"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                              {!! Form::open([
                                  'method'=>'DELETE',
                                  'url' => ['/flights', $item->id],
                                  'style' => 'display:inline'
                              ]) !!}
                                  {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                          'type' => 'submit',
                                          'class' => 'btn btn-danger btn-sm',
                                          'title' => 'Delete Flight',
                                          'onclick'=>'return confirm("Confirm delete?")'
                                  )) !!}
                              {!! Form::close() !!}
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
              <div class="pagination-wrapper"> {!! $flights->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

      </div>
  </div>
</div>

</div>
</div>
@endsection
