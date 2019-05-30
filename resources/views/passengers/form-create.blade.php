<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
    {!! Form::text('first_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    {!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
    {!! Form::text('last_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('post_code') ? 'has-error' : ''}}">
    {!! Form::label('post_code', 'Post Code', ['class' => 'control-label']) !!}
    {!! Form::text('post_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : ''}}">
    {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'control-label']) !!}
    {!! Form::text('date_of_birth', null, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required'] : ['class' => 'form-control datepicker']) !!}
    {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('is_booking_reference') ? 'has-error' : ''}}">
    {!! Form::label('is_booking_reference', 'Is Booking Reference', ['class' => 'control-label']) !!}
    {!! Form::select('is_booking_reference', ['1'=>'Yes', '0'=>'No'], null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('is_booking_reference', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('booking_refernece') ? 'has-error' : ''}}">
    {!! Form::label('booking_refernece', 'Booking Refernece', ['class' => 'control-label']) !!}
    {!! Form::text('booking_refernece', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('booking_refernece', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>

{!! Form::hidden('claim_id', $claim_id) !!}

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
