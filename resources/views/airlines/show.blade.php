@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Airline {{ $airline->id }}</div>
      <div class="card-body">

          <a href="{{ url('/airlines') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/airlines/' . $airline->id . '/edit') }}" title="Edit Airline"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['airlines', $airline->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete Airline',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th>ID</th><td>{{ $airline->id }}</td>
                      </tr>
                      <tr><th> User Id </th><td> {{ $airline->user_id }} </td></tr><tr><th> Name </th><td> {{ $airline->name }} </td></tr><tr><th> Email </th><td> {{ $airline->email }} </td></tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
@endsection
