@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
            <h4>Currency Name: {{$currency->title}}</h4>
            </div>

            <div class="form-body">
                <div class="card">

                    <div class="card-body">

                        <a href="{{ url('/currency') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/currency/' . $currency->id . '/edit') }}" title="Edit Currency"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['currency', $currency->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Currency',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                                <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th> Title </th>
                                        <td> {{ $currency->title }} </td>
                                    </tr>
                                    <tr>
                                        <th> Code </th>
                                        <td> {{ $currency->code }} </td>
                                    </tr>

                                    <tr>
                                        <th> Value </th>
                                        <td> {{ $currency->title }} </td>
                                    </tr>
                                    <tr>
                                        <th> Status </th>
                                        @if($currency->status == 1)
                                        <td><span style="color: green;">Enabled</span></td>
                                        @else
                                        <td><span style="color: red;">Disabled</span></td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
