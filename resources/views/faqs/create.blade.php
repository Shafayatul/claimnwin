@extends('layouts.admin_layout')
@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Create Faqs</h4>
        </div>
        <div class="form-body">
            <div class="card">
                <div class="card-body">

                    {!! Form::open(['url' => '/faqs', 'files' => true]) !!}

                    @include ('faqs.form', ['formMode' => 'create'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
