<div class="grids widget-shadow">
<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('account_name') ? 'has-error' : ''}}">
    {!! Form::label('account_name', 'Account Name', ['class' => 'control-label']) !!}
    {!! Form::text('account_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('account_name', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('bank_name') ? 'has-error' : ''}}">
    {!! Form::label('bank_name', 'Bank Name', ['class' => 'control-label']) !!}
    {!! Form::text('bank_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('bank_name', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('iban_no') ? 'has-error' : ''}}">
    {!! Form::label('iban_no', 'Iban No', ['class' => 'control-label']) !!}
    {!! Form::text('iban_no', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('iban_no', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('swift_bic_code') ? 'has-error' : ''}}">
    {!! Form::label('swift_bic_code', 'Swift Bic Code', ['class' => 'control-label']) !!}
    {!! Form::text('swift_bic_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('swift_bic_code', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('currency_of_account') ? 'has-error' : ''}}">
    {!! Form::label('currency_of_account', 'Currency Of Account', ['class' => 'control-label']) !!}
    {!! Form::select('currency_of_account',$currency, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('currency_of_account', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select('status', ['1'=> 'Enabled', '2'=> 'Disabled'], null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 grid-box1">
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>
