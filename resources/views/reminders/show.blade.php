@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Reminder {{ $reminder->id }}</div>
      <div class="card-body">

          <a href="{{ url('/reminders') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/reminders/' . $reminder->id . '/edit') }}" title="Edit Reminder"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['reminders', $reminder->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete Reminder',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th>ID</th><td>{{ $reminder->id }}</td>
                      </tr>
                      <tr><th> User Id </th><td> {{ $reminder->user_id }} </td></tr><tr><th> Claim Id </th><td> {{ $reminder->claim_id }} </td></tr><tr><th> Callback Date </th><td> {{ $reminder->callback_date }} </td></tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
@endsection
