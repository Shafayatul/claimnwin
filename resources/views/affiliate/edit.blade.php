@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Edit Affiliate</h4>
        </div>
        <div class="form-body">
                <div class="card">

                    <div class="card-body">
                        {{-- <a href="{{ url('/currency') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br /> --}}
                        {!! Form::model($affiliate, [
                            'method' => 'PATCH',
                            'url' => ['/affliate', $affiliate->id],
                            'files' => true
                        ]) !!}

                        @include ('affiliate.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
