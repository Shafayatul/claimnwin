@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Ticket {{ $ticket->id }}</div>
      <div class="card-body">

          <a href="{{ url('/tickets') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/tickets/' . $ticket->id . '/edit') }}" title="Edit Ticket"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['tickets', $ticket->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete Ticket',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th>ID</th><td>{{ $ticket->id }}</td>
                      </tr>
                      <tr><th> Subject </th><td> {{ $ticket->subject }} </td></tr><tr><th> Status </th><td> {{ $ticket->status }} </td></tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
@endsection
