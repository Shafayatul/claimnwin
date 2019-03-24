@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Edit Connection #{{ $connection->id }}</div>
      <div class="card-body">
          <a href="{{ url('/connections') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <br />
          <br />

          @if ($errors->any())
              <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif

          {!! Form::model($connection, [
              'method' => 'PATCH',
              'url' => ['/connections', $connection->id],
              'class' => 'form-horizontal',
              'files' => true
          ]) !!}

          @include ('connections.form', ['formMode' => 'edit'])

          {!! Form::close() !!}

      </div>
  </div>
@endsection
