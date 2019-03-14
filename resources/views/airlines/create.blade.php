@extends('layouts.admin_layout')

@section('main_content')
          <div class="forms">
    					<div class="form-grids row widget-shadow" data-example-id="basic-forms">
    						<div class="form-title">
    							<h4>Create Airline</h4>
    						</div>
    						<div class="form-body">
                  <div class="card">
                    <div class="card-body">


                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/airlines', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('airlines.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                    </div>
    						  </div>
    					</div>
            </div>

@endsection
