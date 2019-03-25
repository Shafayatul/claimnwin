@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Connection {{ $connection->id }}</div>
      <div class="card-body">

          <a href="{{ url('/connections') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/connections/' . $connection->id . '/edit') }}" title="Edit Connection"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['connections', $connection->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete Connection',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th>ID</th><td>{{ $connection->id }}</td>
                      </tr>
                      <tr><th> Claim Id </th><td> {{ $connection->claim_id }} </td></tr><tr><th> Airport Id </th><td> {{ $connection->airport_id }} </td></tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
@endsection
