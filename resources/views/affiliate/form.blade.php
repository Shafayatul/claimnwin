<div class="grids widget-shadow">
    <div class="row">
    <div class="col-md-6">
    <div class="form-group {{ $errors->has('commision_amount') ? 'has-error' : ''}}">
        {!! Form::label('commision_amount', 'Commision Amount', ['class' => 'control-label']) !!}
        {!! Form::text('commision_amount', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('commision_amount', '<p class="help-block">:message</p>') !!}
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group {{ $errors->has('percentage') ? 'has-error' : ''}}">
        {!! Form::label('percentage', 'Percentage', ['class' => 'control-label']) !!}
        {!! Form::text('percentage', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('percentage', '<p class="help-block">:message</p>') !!}
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-6">
    <div class="form-group {{ $errors->has('received_amount') ? 'has-error' : ''}}">
        {!! Form::label('received_amount', 'Received Amount', ['class' => 'control-label']) !!}
        {!! Form::text('received_amount', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('received_amount', '<p class="help-block">:message</p>') !!}
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group {{ $errors->has('payment_method') ? 'has-error' : ''}}">
        {!! Form::label('payment_method', 'Payment Method', ['class' => 'control-label']) !!}
        {!! Form::text('payment_method', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-6">
    <div class="form-group {{ $errors->has('addition_description') ? 'has-error' : ''}}">
        {!! Form::label('addition_description', 'Received Amount', ['class' => 'control-label']) !!}
        {!! Form::textarea('addition_description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('addition_description', '<p class="help-block">:message</p>') !!}
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group {{ $errors->has('approved') ? 'has-error' : ''}}">
        {!! Form::label('approved', 'Approved', ['class' => 'control-label']) !!}
        {!! Form::select('approved', ['0'=> 'No', '1'=> 'Yes'], null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('approved', '<p class="help-block">:message</p>') !!}
    </div>
    </div>
    </div>

    <div class="row">
        <div class="col-md-12">
    <div class="form-group">
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
    </div>
    </div>
    </div>
