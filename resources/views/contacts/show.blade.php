@extends('layouts.front_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Contact {{ $contact->id }}</div>
      <div class="card-body">

          <a href="{{ url('/contacts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <a href="{{ url('/contacts/' . $contact->id . '/edit') }}" title="Edit Contact"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
          {!! Form::open([
              'method'=>'DELETE',
              'url' => ['contacts', $contact->id],
              'style' => 'display:inline'
          ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete Contact',
                      'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
          {!! Form::close() !!}
          <br/>
          <br/>

          <div class="table-responsive">
              <table class="table table-borderless">
                  <tbody>
                      <tr>
                          <th>ID</th><td>{{ $contact->id }}</td>
                      </tr>
                      <tr><th> Name </th><td> {{ $contact->name }} </td></tr><tr><th> Email </th><td> {{ $contact->email }} </td></tr><tr><th> Subject </th><td> {{ $contact->subject }} </td></tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
@endsection
