@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">TicketNote {{ $ticketnote->id }}</div>
      <div class="card-body">

          <a href="{{ url('/ticket-notes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/ticket-notes/' . $ticketnote->id . '/edit') }}" title="Edit TicketNote"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['ticketnotes', $ticketnote->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete TicketNote',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th>ID</th><td>{{ $ticketnote->id }}</td>
                      </tr>
                      <tr><th> Ticket Id </th><td> {{ $ticketnote->ticket_id }} </td></tr><tr><th> Description </th><td> {{ $ticketnote->description }} </td></tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
@endsection
