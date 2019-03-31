@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Name: {{ $airline->name }}</h4>
            </div>

            <div class="form-body">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">

                        <a href="{{ url('/airlines') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/airlines/' . $airline->id . '/edit') }}" title="Edit airline"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['airlines', $airline->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete airline',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $airline->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Alias </th>
                                        <td> {{ $airline->alias }} </td>
                                    </tr>
                                    <tr>
                                        <th> Iata Code </th>
                                        <td> {{ $airline->iata_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td> {{ $airline->country }} </td>
                                    </tr>
                                    <tr>
                                        <th> Icao Code </th>
                                        <td> {{ $airline->icao_code }} </td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td> {{ $airline->phone }} </td>
                                    </tr>
                                    <tr>
                                        <th> Address 1 </th>
                                        <td> {{ $airline->address_line_1 }} </td>
                                    </tr>
                                    <tr>
                                        <th> Address 2 </th>
                                        <td> {{ $airline->address_line_2 }} </td>
                                    </tr>
                                    <tr>
                                        <th> Address 3 </th>
                                        <td> {{ $airline->address_line_3 }} </td>
                                    </tr>
                                    <tr>
                                        <th> Address 4 </th>
                                        <td> {{ $airline->address_line_4 }} </td>
                                    </tr>
                                    <tr>
                                        <th> Online Form Link </th>
                                        <td> {{ $airline->online_form_link }} </td>
                                    </tr>
                                    <tr>
                                        <th> Address 4 </th>
                                        <td>

                                            @if($airline->status == 1)
                                            Enabled
                                            @else
                                            Disabled
                                            @endif
                                        </td>
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







