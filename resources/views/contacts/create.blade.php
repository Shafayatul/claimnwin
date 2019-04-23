@extends('layouts.front_layout')

@section('content')
    <div class="card">
        <div class="card-header">Create New Contact</div>
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

            {!! Form::open(['url' => '/contacts', 'class' => 'form-horizontal', 'files' => true]) !!}

            @include ('contacts.form', ['formMode' => 'create'])

            {!! Form::close() !!}

        </div>
    </div>
@endsection
