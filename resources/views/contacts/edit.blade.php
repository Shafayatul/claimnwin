@extends('layouts.front_layout')

@section('content')
  <div class="card">
      <div class="card-header">Edit Contact #{{ $contact->id }}</div>
      <div class="card-body">
          <a href="{{ url('/contacts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <br />
          <br />

          @if ($errors->any())
              <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif

          {!! Form::model($contact, [
              'method' => 'PATCH',
              'url' => ['/contacts', $contact->id],
              'class' => 'form-horizontal',
              'files' => true
          ]) !!}

          @include ('contacts.form', ['formMode' => 'edit'])

          {!! Form::close() !!}

      </div>
  </div>
@endsection
