@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>{{$bankaccount->account_name}} Of Bank Account</h4>
        </div>
        <div class="form-body">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/bank-accounts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/bank-accounts/' . $bankaccount->id . '/edit') }}" title="Edit BankAccount"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['bankaccounts', $bankaccount->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete BankAccount',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th> Account Name </th>
                                        <td> {{ $bankaccount->account_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Bank Name </th>
                                        <td> {{ $bankaccount->bank_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> IBAN NO </th>
                                        <td> {{ $bankaccount->iban_no }} </td>
                                    </tr>
                                    <tr>
                                        <th> SWIFT/BIC CODE </th>
                                        <td> {{ $bankaccount->swift_bic_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> CURRENCY OF ACCOUNT </th>
                                        <td> {{ $bankaccount->code }} </td>
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
