<div class="grids widget-shadow">
<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('iata_code') ? 'has-error' : ''}}">
    {!! Form::label('iata_code', 'Iata Code', ['class' => 'control-label']) !!}
    {!! Form::text('iata_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('iata_code', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('3_digit_code') ? 'has-error' : ''}}">
    {!! Form::label('three_digit_code', '3 Digit Code', ['class' => 'control-label']) !!}
    {!! Form::text('three_digit_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('three_digit_code', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    {!! Form::label('country', 'Country', ['class' => 'control-label']) !!}
    {!! Form::select('country',$country, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('continent') ? 'has-error' : ''}}">
    {!! Form::label('continent', 'Continent', ['class' => 'control-label']) !!}
    {!! Form::text('continent', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('continent', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('sub_continent') ? 'has-error' : ''}}">
    {!! Form::label('sub_continent', 'Sub Continent', ['class' => 'control-label']) !!}
    {!! Form::text('sub_continent', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sub_continent', '<p class="help-block">:message</p>') !!}
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 grid-box1">
<div class="form-group {{ $errors->has('latitude') ? 'has-error' : ''}}">
    {!! Form::label('latitude', 'Latitude', ['class' => 'control-label']) !!}
    {!! Form::text('latitude', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('latitude', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="col-md-6">
<div class="form-group {{ $errors->has('longitude') ? 'has-error' : ''}}">
    {!! Form::label('longitude', 'Longitude', ['class' => 'control-label']) !!}
    {!! Form::text('longitude', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('longitude', '<p class="help-block">:message</p>') !!}
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
