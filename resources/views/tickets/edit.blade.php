@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Edit Ticket #{{ $ticket->id }}</div>
      <div class="card-body">
          <a href="{{ url('/tickets') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <br />
          <br />

          @if ($errors->any())
              <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif

          {!! Form::model($ticket, [
              'method' => 'PATCH',
              'url' => ['/tickets', $ticket->id],
              'class' => 'form-horizontal',
              'files' => true
          ]) !!}

          @include ('tickets.form', ['formMode' => 'edit'])

          {!! Form::close() !!}

      </div>
  </div>
@endsection
