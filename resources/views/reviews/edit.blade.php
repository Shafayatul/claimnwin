@extends('layouts.admin_layout')

@section('main_content')
  <div class="card">
      <div class="card-header">Edit Review #{{ $review->id }}</div>
      <div class="card-body">
          <a href="{{ url('/reviews') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
          <br />
          <br />

          @if ($errors->any())
              <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif

          {!! Form::model($review, [
              'method' => 'PATCH',
              'url' => ['/reviews', $review->id],
              'class' => 'form-horizontal',
              'files' => true
          ]) !!}

          @include ('reviews.form', ['formMode' => 'edit'])

          {!! Form::close() !!}

      </div>
  </div>
@endsection
