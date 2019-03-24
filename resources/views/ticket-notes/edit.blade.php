@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Edit TicketNote #{{ $ticketnote->id }}</div>
      <div class="card-body">
          <a href="{{ url('/ticket-notes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <br />
          <br />

          @if ($errors->any())
              <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif

          {!! Form::model($ticketnote, [
              'method' => 'PATCH',
              'url' => ['/ticket-notes', $ticketnote->id],
              'class' => 'form-horizontal',
              'files' => true
          ]) !!}

          @include ('ticket-notes.form', ['formMode' => 'edit'])

          {!! Form::close() !!}

      </div>
  </div>
@endsection
